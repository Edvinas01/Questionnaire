<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Answer;
use AppBundle\Entity\Question;
use AppBundle\Entity\Questionnaire;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

class QuestionnairesController extends Controller
{
    private $MAX_QUESTIONNAIRE_COUNT = 10;

    /**
     * @Method("GET")
     * @Route("/questionnaires", name="questionnaires_home")
     */
    public function questionnairesHomeAction(Request $request)
    {
        return $this->render('questionnaires/home.html.twig', array(
            'visibility' => $request->query->get('visibility', null),
            'name' => $request->query->get('name', null)
        ));
    }

    /**
     * @Method("POST")
     * @Route("/questionnaires", name="questionnaires_create")
     */
    public function questionnairesCreateAction(Request $request)
    {
        // 10 questionnaires max per user.
        if (count($this->getQuestionnaires()) + 1 > $this->MAX_QUESTIONNAIRE_COUNT) {

            $response = new Response();
            $response->setContent('You can have at most ' . $this->MAX_QUESTIONNAIRE_COUNT . ' questionnaires');
            $response->setStatusCode(400);
            return $response;
        }

        $expires = $request->request->get('expires');

        // Max questionnaire duration is one week.
        if (!$this->isValidExpiry($expires)) {
            $response = new Response();
            $response->setContent('Invalid expiry date');
            $response->setStatusCode(400);
            return $response;
        }

        $date = new \DateTime();
        $date->add(new \DateInterval('P' . $expires . 'D'));

        // User to assign the questionnaire to.
        $user = $this->get('security.token_storage')->getToken()->getUser();

        // Create a new questionnaire using name.
        $questionnaire = new Questionnaire(
            $request->request->get('name'),
            $user,
            $date
        );

        // Persist data.
        $em = $this->getDoctrine()->getManager();
        $em->persist($questionnaire);
        $em->flush();

        $this->createEmptyQuestion($questionnaire);
        return $this->redirectToEdit($questionnaire->getId());
    }


    /**
     * @Method("POST")
     * @Route("/questionnaires/{id}", name="questionnaires_save")
     */
    public function saveChanges(Request $request, $id)
    {
        $this->saveQuestionnaire($request, $this->getQuestionnaire($id));
        return new Response();
    }

    /**
     * @Method("POST")
     * @Route("/questionnaires/{id}/visibility", name="questionnaires_visibility")
     */
    public function setVisibilityAction(Request $request, $id)
    {
        $questionnaire = $this->getQuestionnaire($id);
        $questionnaire->setVisible($request->query->get('visible'));

        // Persist data.
        $em = $this->getDoctrine()->getManager();
        $em->persist($questionnaire);
        $em->flush();

        return new Response();
    }

    /**
     * @Method("GET")
     * @Route("/questionnaires/{id}", name="questionnaires_edit_show")
     */
    public function questionnairesEditShowAction($id)
    {
        $questionnaire = $this->getQuestionnaire($id);
        $questionnaire->getQuestions();

        return $this->render('questionnaires/home.html.twig', array(
            "questionnaire" => $questionnaire
        ));
    }

    /**
     * @Method("DELETE")
     * @Route("/questionnaires/{id}", name="questionnaires_delete")
     */
    public function questionnairesDeleteAction($id)
    {
        $questionnaire = $this->getQuestionnaire($id);

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($questionnaire);
        $em->flush();

        return new Response();
    }

    /**
     * @Method("POST")
     * @Route("/questionnaires/{id}/add-question", name="add_question")
     */
    public function addQuestionAction(Request $request, $id)
    {
        $questionnaire = $this->getQuestionnaire($id);

        $this->createEmptyQuestion($questionnaire);
        $this->saveQuestionnaire($request, $questionnaire);

        return $this->render(':questionnaires:questions.html.twig', array(
            'questionnaire' => $questionnaire
        ));
    }

    /**
     * @Method("POST")
     * @Route("/questions/{id}/remove", name="remove_question")
     */
    public function removeQuestionAction(Request $request, $id)
    {
        // Find and remove the question from database.
        $question = $this->getQuestion($id);
        $questionnaire = $question->getQuestionnaire();
        $this->saveQuestionnaire($request, $questionnaire);

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($question);
        $em->flush();

        return $this->render(':questionnaires:questions.html.twig', array(
            'questionnaire' => $questionnaire
        ));
    }

    /**
     * @Method("POST")
     * @Route("/questions/{id}/add-answer", name="add_answer")
     */
    public function addAnswerAction(Request $request, $id)
    {
        // Find the question.
        $question = $this->getQuestion($id);

        // Create the answer and persist it.
        $answer = new Answer();
        $answer->setQuestion($question);

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($answer);
        $em->flush();

        $this->saveQuestionnaire($request, $question->getQuestionnaire());
        return $this->render(':questionnaires:answers.html.twig', array(
            'question' => $question
        ));
    }

    /**
     * @Method("POST")
     * @Route("/answers/{id}/remove", name="remove_answer")
     */
    public function removeAnswerAction(Request $request, $id)
    {
        // Find the answer and remove it.
        $answer = $this->getAnswer($id);
        $question = $answer->getQuestion();
        $this->saveQuestionnaire($request, $question->getQuestionnaire());

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($answer);
        $em->flush();

        return $this->render(':questionnaires:answers.html.twig', array(
            'question' => $question
        ));
    }

    /**
     * @Method("POST")
     * @Route("/questionnaires/{id}/publish", name="questionnaire_publish")
     */
    public function publishAction(Request $request, $id)
    {
        $questionnaire = $this->getQuestionnaire($id);

        $show = $request->query->get('show');
        if ($show == 'show') {
            $questionnaire->setVisible(true);
        } else {
            $questionnaire->setVisible(false);
        }

        $this->saveQuestionnaire($request, $questionnaire);
        return new Response();
    }

    /**
     * Create an empty question object and persist it.
     *
     * @param $questionnaire - questionnaire to which to add the question to.
     * @return Question newly created and persisted question.
     */
    private function createEmptyQuestion($questionnaire)
    {
        // Create a new question.
        $question = new Question();
        $question->setType('SINGLE');
        $question->setQuestionnaire($questionnaire);

        // Get the entity manager.
        $em = $this->getDoctrine()->getManager();

        // Create a empty answer and persist it.
        $answer = new Answer();
        $answer->setQuestion($question);
        $em->persist($answer);

        // Assign the empty answer.
        $question->addAnswer($answer);

        // Persist the question.
        $em->persist($question);
        $em->flush();

        return $question;
    }

    /**
     * Redirect to questionnaire id page.
     */
    private function redirectToEdit($id)
    {
        return $this->redirect($this->generateUrl(
            'questionnaires_edit_show',
            array('id' => $id))
        );
    }

    /**
     * Get questionnaire by id by also checking if the questionnaire belongs to the authenticated user.
     */
    private function getQuestionnaire($id)
    {
        // Get the current user id to lookup for questionnaires which belong to this user.
        $userId = $this->get('security.token_storage')->getToken()->getUser()->getId();

        // Query the questionnaire.
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $qb->select('q')
            ->from('AppBundle:Questionnaire', 'q')
            ->join('q.user', 'u')
            ->where('q.id = ?1')
            ->andWhere('u.id = ?2')
            ->setParameter(1, $id)
            ->setParameter(2, $userId);

        $questionnaire = $qb->getQuery()->getSingleResult();

        if ($questionnaire == null) {
            throw $this->createNotFoundException(
                'No questionnaire found with id ' . $id
            );
        }

        return $questionnaire;
    }

    /**
     * Get question by id by also checking if the question belongs to the authenticated user.
     */
    private function getQuestion($id)
    {
        // Get the current user id to lookup for questions which belong to this user.
        $userId = $this->get('security.token_storage')->getToken()->getUser()->getId();

        // Query the question.
        $qb = $this->getDoctrine()->getEntityManager()->createQueryBuilder();
        $qb->select('qu')
            ->from('AppBundle:Question', 'qu')
            ->join('qu.questionnaire', 'q')
            ->join('q.user', 'u')
            ->where('qu.id = ?1')
            ->andWhere('u.id = ?2')
            ->setParameter(1, $id)
            ->setParameter(2, $userId);

        $question = $qb->getQuery()->getSingleResult();

        if ($question == null) {
            throw $this->createNotFoundException(
                'No question found with id ' . $id
            );
        }

        return $question;
    }

    /**
     * Get the question answer.
     */
    private function getAnswer($id)
    {
        // Get the current user id to lookup for answers which belong to this user.
        $userId = $this->get('security.token_storage')->getToken()->getUser()->getId();

        // Query the question.
        $qb = $this->getDoctrine()->getEntityManager()->createQueryBuilder();
        $qb->select('a')
            ->from('AppBundle:Answer', 'a')
            ->join('a.question', 'qu')
            ->join('qu.questionnaire', 'q')
            ->join('q.user', 'u')
            ->where('a.id = ?1')
            ->andWhere('u.id = ?2')
            ->setParameter(1, $id)
            ->setParameter(2, $userId);

        $answer = $qb->getQuery()->getSingleResult();

        if ($answer == null) {
            throw $this->createNotFoundException(
                'No answer found with id ' . $id
            );
        }

        return $answer;
    }

    /**
     * Save the current questionnaire state to database.
     */
    private function saveQuestionnaire(Request $request, $questionnaire)
    {
        // Parse json.
        $data = json_decode($request->getContent(), true);

        $questionnaire->setName($data['name']);
        $questionnaire->setDescription($data['description']);
        $expires = $data['expires'];

        // Max questionnaire duration is one week.
        if ($this->isValidExpiry($expires)) {
            $date = new \DateTime();
            $date->add(new \DateInterval('P' . $expires . 'D'));
            $questionnaire->setExpires($date);
        }

        if (isset($data['questions'])) {
            foreach ($data['questions'] as $questionData) {

                // Update each question data.
                foreach ($questionnaire->getQuestions() as $question) {
                    if ($question->getId() == $questionData['id']) {
                        $question->setType($questionData['type']);
                        $question->setContent($questionData['content']);
                    }

                    // Update each answer data.
                    foreach ($questionData['answers'] as $answerData) {
                        foreach ($question->getAnswers() as $answer) {
                            if ($answer->getId() == $answerData['id']) {
                                $answer->setContent($answerData['content']);
                            }
                        }
                    }
                }
            }
        }


        // Persist questionnaire.
        $em = $this->getDoctrine()->getManager();
        $em->persist($questionnaire);
        $em->flush();
    }

    private function getQuestionnaires()
    {
        // Get the current user id to lookup for questionnaires which belong to this user.
        $userId = $this->get('security.token_storage')->getToken()->getUser()->getId();

        // Query the questionnaires
        $qb = $this->getDoctrine()->getEntityManager()->createQueryBuilder();
        $qb->select('q')
            ->from('AppBundle:Questionnaire', 'q')
            ->join('q.user', 'u')
            ->andWhere('u.id = ?1')
            ->setParameter(1, $userId);

        return $qb->getQuery()->getArrayResult();
    }

    private function isValidExpiry($expires)
    {
        if ($expires <= 0 || $expires > 7) {
            return false;
        }
        return true;
    }
}