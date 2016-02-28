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

        // User to assign the questionnaire to.
        $user = $this->get('security.token_storage')->getToken()->getUser();

        // Create a new questionnaire using name.
        $questionnaire = new Questionnaire(
            $request->request->get('name'),
            new \DateTime('2016-01-01'),        // todo proper date
            $user
        );

        // Persist data.
        $em = $this->getDoctrine()->getManager();
        $em->persist($questionnaire);
        $em->flush();

        return $this->redirectToEdit($questionnaire->getId());
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
     * @Method("POST")
     * @Route("/questionnaires/{id}/add-question", name="add_question")
     */
    public function addQuestionAction(Request $request, $id)
    {
        $questionnaire = $this->getQuestionnaire($id);
        $this->createEmptyQuestion($questionnaire);

        return new Response();
    }

    /**
     * @Method("POST")
     * @Route("/questions/{id}/remove", name="remove_question")
     */
    public function removeQuestionAction($id)
    {
        // Find and remove the question from database.
        $question = $this->getQuestion($id);

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($question);
        $em->flush();

        return new Response();
    }

    /**
     * @Method("POST")
     * @Route("/questions/{id}/add-answer", name="add_answer")
     */
    public function addAnswerAction($id)
    {
        // Find the question.
        $question = $this->getQuestion($id);

        // Create the answer and persist it.
        $answer = new Answer();
        $answer->setQuestion($question);

        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($answer);
        $em->flush();

        return new Response();
    }

    /**
     * @Method("POST")
     * @Route("/answers/{id}/remove", name="remove_answer")
     */
    public function removeAnswerAction($id)
    {
        // Find the answer and remove it.
        $answer = $this->getAnswer($id);

        $em = $this->getDoctrine()->getEntityManager();
        $em->remove($answer);
        $em->flush();

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
        $qb = $this->getDoctrine()->getEntityManager()->createQueryBuilder();
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
}