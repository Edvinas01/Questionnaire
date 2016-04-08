<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Participant;
use AppBundle\Entity\ParticipantAnswer;
use AppBundle\Entity\Questionnaire;
use Doctrine\DBAL\Exception\ServerException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionnairesFillController extends Controller
{
    /**
     * @Method("GET")
     * @Route("/questionnaires-view/{id}", name="questionnaires_view")
     */
    public function questionnaireViewAction($id)
    {
        $questionnaire = $this->getQuestionnaire($id);
        if ($questionnaire == null) {
            return new Response("Questionnaire cannot be accessed", 401);
        }

        return $this->render('questionnaires/view.html.twig', array(
            'questionnaire' => $questionnaire
        ));
    }

    /**
     * @Method("GET")
     * @Route("/thanks", name="thanks")
     */
    public function thanksViewAction()
    {
        return $this->render('questionnaires/thanks.html.twig');
    }

    /**
     * @Method("POST")
     * @Route("/questionnaires-view/{id}", name="questionnaires_submit")
     */
    public function questionnaireSubmitAction(Request $request, $id)
    {
        $questionnaire = $this->getQuestionnaire($id);
        if ($questionnaire == null) {
            return new Response("Questionnaire cannot be accessed", 401);
        }
        $this->fillQuestionnaire($questionnaire, $request);
        return new Response();
    }

    public function fillQuestionnaire($questionnaire, Request $request)
    {
        $data = json_decode($request->getContent(), true);
        $ip = $request->getClientIp();

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $qb->select('count(p.id)')
            ->from('AppBundle:Participant', 'p')
            ->join('p.questionnaire', 'q')
            ->where('q.id = ?1')
            ->andWhere('p.ip = ?2')
            ->setParameter(1, $questionnaire->getId())
            ->setParameter(2, $ip);

        $count = $qb->getQuery()->getSingleScalarResult();

        // Do not save repeating ip's
        if ($count >= 1) {
            return null;
        }

        if (isset($data['answers'])) {
            $fullAnswers = array();

            // Construct participant.
            $participant = new Participant(new \DateTime());

            // Iterate over the questionnaire data.
            foreach ($questionnaire->getQuestions() as $question) {

                $other = false;
                foreach ($question->getAnswers() as $answer) {
                    if ($other) {
                        break;
                    }

                    $constructed = new ParticipantAnswer(
                        $participant,
                        $answer,
                        $question);

                    foreach ($data['answers'] as $participantAnswer) {

                        if (isset($participantAnswer['other']) &&

                            // Opinion for question (other field).
                            $question->getId() == $participantAnswer['questionId']) {
                            $constructed->setOpinion($participantAnswer['other']);
                            $other = true;
                            break;

                        } else if (isset($participantAnswer['questionId']) &&

                            // Open question type.
                            $question->getType() == 'OPEN' &&
                            $question->getId() == $participantAnswer['questionId']) {
                            $constructed->setTextAnswer($participantAnswer['textAnswer']);
                            break;

                        } else if (isset($participantAnswer['id']) &&

                            // All other types.
                            $answer->getId() == $participantAnswer['id']) {
                            $constructed->setChecked($participantAnswer['checked']);
                            break;
                        }
                    }
                    array_push($fullAnswers, $constructed);
                }
            }

            $participant->setQuestionnaire($questionnaire);
            $participant->setIp($ip);
            $participant->setAnswers($fullAnswers);

            // Persist participant.
            $em = $this->getDoctrine()->getManager();
            $em->persist($participant);
            $em->flush();
        }
        return null;
    }

    public function getQuestionnaire($id)
    {
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $qb->select('q')
            ->from('AppBundle:Questionnaire', 'q')
            ->where('q.visible = true')
            ->andWhere('q.id = ?1')
            ->andWhere('q.expires > ?2')
            ->setParameter(1, $id)
            ->setParameter(2, new \DateTime());

        return $qb->getQuery()->getSingleResult();
    }
}