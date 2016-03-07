<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Participant;
use AppBundle\Entity\ParticipantAnswer;
use AppBundle\Entity\Questionnaire;
use AppBundle\Stats\StatHelper;
use Doctrine\DBAL\Exception\ServerException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class QuestionnairesStatsController extends Controller
{
    /**
     * @Method("GET")
     * @Route("/questionnaires-stats/{id}", name="questionnaires_stats")
     */
    public function questionnaireViewStatsActions($id)
    {
        $questionnaire = $this->getQuestionnaire($id);
        $stats = new StatHelper($questionnaire);

        return $this->render('questionnaires/stats.html.twig', array(
            'questionnaire' => $questionnaire,
            'stats' => $stats
        ));
    }

    public function getQuestionnaire($id)
    {
        $userId = $this->get('security.token_storage')->getToken()->getUser()->getId();

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $qb->select('q')
            ->from('AppBundle:Questionnaire', 'q')
            ->join('q.user', 'u')
            ->where('q.visible = true')
            ->andWhere('q.id = ?1')
            ->andWhere('q.expires > ?2')
            ->andWhere('u.id = ?3')
            ->setParameter(1, $id)
            ->setParameter(2, new \DateTime())
            ->setParameter(3, $userId);

        $result = $qb->getQuery()->getSingleResult();

        if ($result == null) {
            throw new NotFoundHttpException("No such questionnaire found under the current user");
        }
        return $result;
    }
}