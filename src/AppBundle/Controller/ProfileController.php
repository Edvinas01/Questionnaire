<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProfileController extends Controller
{

    /**
     * @Method("GET")
     * @Route("/profile", name="user_profile")
     */
    public function profileAction()
    {
        $id = $this->get('security.token_storage')->getToken()->getUser()->getId();

        $repository = $this->getDoctrine()->getRepository('AppBundle:User');
        $user = $repository->find($id);

        return $this->render(
            'profile/profile.html.twig',
            array(
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'role' => $user->getRole()
            )
        );
    }
}