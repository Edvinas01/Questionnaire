<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\UserType;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;

class AuthenticationController extends Controller
{

    /**
     * @Route("/logout", name="user_logout")
     */
    public function logoutAction()
    {
    }

    /**
     * @Route("/login", name="user_login")
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'authentication/login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error' => $error,
            )
        );
    }

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {
        // this controller will not be executed,
        // as the route is handled by the Security system
    }

    /**
     * @Route("/register", name="user_registration")
     */
    public function registerAction(Request $request)
    {
        // Build the form.
        $user = new User();
        $form = $this->createForm('AppBundle\Form\UserType', $user);

        $form->handleRequest($request);

        // If the action is post, handle registering.
        if ($form->isSubmitted() && $form->isValid()) {

            // Encode password.
            $password = $this->get('security.password_encoder')
                ->encodePassword($user, $user->getPassword());

            $user->setPassword($password);
            $user->setRole('ROLE_USER');

            // Save created user.
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            // Redirect to home.
            return $this->redirectToRoute('home');

        }

        return $this->render(
            'authentication/register.html.twig',
            array(
                'form' => $form->createView()
            )
        );
    }
}