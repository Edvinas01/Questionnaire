<?php

namespace AppBundle\Controller;

use Doctrine\DBAL\Exception\ServerException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionnairesFillController extends Controller
{
    /**
     * @Method("GET")
     * @Route("/questionnaires-view/{id}", name="questionnaires_view")
     */
    public function questionnairesHomeAction($id)
    {
        $questionnaire = $this->getQuestionnaire($id);
        if ($questionnaire == null) {
            return new Response("Questionnaire cannot be accessed", 401);
        }

        return $this->render('questionnaires/view.html.twig', array(
            'questionnaire' => $questionnaire
        ));
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