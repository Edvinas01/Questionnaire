<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class UserController extends Controller
{
    /**
     * @Method("GET")
     * @Route("/users", name="users")
     */
    public function questionnaireViewStatsActions()
    {
        return $this->render('users/home.html.twig', array(
            'users' => $this->getUsers()
        ));
    }

    public function getUsers()
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();

        $qb->select('u')
            ->from('AppBundle:User', 'u')
            ->where('u.role <> ?1')
            ->setParameter(1, 'ROLE_ADMIN');

        return $qb->getQuery()->getResult();
    }
}