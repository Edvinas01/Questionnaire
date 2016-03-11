<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{

    /**
     * @Route("/profile", name="user_profile")
     */
    public function profileAction(Request $request)
    {
        $id = $this->get('security.token_storage')->getToken()->getUser()->getId();

        // Query user details.
        $repository = $this->getDoctrine()->getRepository('AppBundle:User');
        $user = $repository->find($id);
        $user->setPassword(null);

        // Build the edit form.
        $editForm = $this->createForm('AppBundle\Form\UserEditType', $user);
        $editForm->handleRequest($request);

        // If the action is post, handle registering.
        if ($editForm->isSubmitted() && $editForm->isValid()) {

            // Encode password.
            if ($user->getPassword() != null) {
                $password = $this->get('security.password_encoder')
                    ->encodePassword($user, $user->getPassword());

                $user->setPassword($password);
            }

            // Save created user.
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
        }

        return $this->render(
            'profile/profile.html.twig',
            array(
                'editForm' => $editForm->createView(),
                'editFormErrors' => (string)$editForm->getErrors(true)->count(),
                'username' => $user->getUsername(),
                'email' => $user->getEmail(),
                'role' => $user->getRole(),
                'avatar' => $user->getAvatar(),
                'questionnaires' => $this->getQuestionnaires()
            )
        );
    }

    private function getQuestionnaires()
    {
        // Get the current user id to lookup for questionnaires which belong to this user.
        $userId = $this->get('security.token_storage')->getToken()->getUser()->getId();

        // Query the questionnaires
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $qb->select('q')
            ->from('AppBundle:Questionnaire', 'q')
            ->join('q.user', 'u')
            ->andWhere('u.id = ?1')
            ->setParameter(1, $userId);

        return $qb->getQuery()->getArrayResult();
    }
}