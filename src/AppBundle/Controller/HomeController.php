<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function homeAction()
    {
        return $this->render('home/home.html.twig', array(
            'questionnaires' => $this->getQuestionnaires(),
        ));
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction()
    {
        // replace this example code with whatever you need
        return $this->render('home/about.html.twig');
    }

    /**
     * @Method("DELETE")
     * @Route("/moderate/questionnaire/{id}", name="delete_questionnaire_mod")
     */
    public function deleteQuestionnaireAction($id)
    {
        $this->denyAccessUnlessGranted('ROLE_MODERATOR');

        $questionnaire = $this->getDoctrine()
            ->getRepository('AppBundle:Questionnaire')
            ->find($id);

        $em = $this->getDoctrine()->getManager();
        $em->remove($questionnaire);
        $em->flush();

        return new Response();
    }

    private function getQuestionnaires()
    {
        $qb = $this->getDoctrine()->getEntityManager()->createQueryBuilder();
        $qb->select('q, u')
            ->from('AppBundle:Questionnaire', 'q')
            ->join('q.user', 'u')
            ->where('q.visible = true')
            ->andWhere('LENGTH(q.name) > 0')
            ->andWhere('LENGTH(q.description) > 0')
            ->andWhere('q.expires > ?1')
            ->setParameter(1, new \DateTime());

        return $qb->getQuery()->getArrayResult();
    }
}
