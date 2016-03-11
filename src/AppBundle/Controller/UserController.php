<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @Method("GET")
     * @Route("/users/{id}", name="user")
     */
    public function getUserAction($id)
    {
        $user = $this->fetchUser($id);
        $user = array(
            'id' => $user->getId(),
            'username' => $user->getUsername(),
            'email' => $user->getEmail(),
            'role' => $user->getRole()
        );

        $serializer = $this->container->get('serializer');
        $questions = $serializer->serialize($user, 'json');

        return new JsonResponse($questions);
    }

    /**
     * @Method("POST")
     * @Route("/users/{id}", name="user_save")
     */
    public function saveChangesAction(Request $request, $id)
    {
        $user = $this->fetchUser($id);
        $data = json_decode($request->getContent(), true);

        $user->setUsername($data['username']);
        $user->setEmail($data['email']);
        $role = $data['role'];

        // Check if roles match.
        if ($role == 'ROLE_MODERATOR' || $role == 'ROLE_USER') {
            $user->setRole($role);
        }

        $em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return new Response();
    }

    /**
     * @Method("DELETE")
     * @Route("/users/{id}", name="user_delete")
     */
    public function deleteAction($id)
    {
        $user = $this->fetchUser($id);

        // Clear user questionnaires.
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $questionnaires = $qb->select('q')
            ->from('AppBundle:Questionnaire', 'q')
            ->join('q.user', 'u')
            ->where('u.id = ?1')
            ->setParameter(1, $id)
            ->getQuery()
            ->getResult();

        // Remove the user and his questionnaires.
        $em = $this->getDoctrine()->getManager();

        foreach ($questionnaires as $questionnaire) {
            $em->remove($questionnaire);
        }
        $em->remove($user);
        $em->flush();

        return new Response();
    }

    public function fetchUser($id)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();

        $qb->select('u')
            ->from('AppBundle:User', 'u')
            ->where('u.id = ?1')
            ->andWhere('u.role <> ?2')
            ->setParameter(1, $id)
            ->setParameter(2, 'ROLE_ADMIN');

        return $qb->getQuery()->getSingleResult();
    }

    public function getUsers()
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();

        $qb->select('u')
            ->from('AppBundle:User', 'u')
            ->where('u.role <> ?1')
            ->setParameter(1, 'ROLE_ADMIN');

        return $qb->getQuery()->getResult();
    }
}