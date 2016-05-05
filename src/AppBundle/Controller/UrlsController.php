<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Url;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class UrlsController extends Controller
{
    /**
     * @Method("GET")
     * @Route("/urls/{id}")
     */
    public function getUrl($id)
    {
        $url = $this->getUrlWithCheck($id);

        return new JsonResponse(array(
            'id' => $url->getId(),
            'username' => $url->getUsername()
        ));
    }

    /**
     * @Method("POST")
     * @Route("/urls")
     */
    public function addUrl(Request $request)
    {
        $url = json_decode($request->getContent(), true);
        $questionnaire = $this->getQuestionnaire($url['questionnaireId']);

        $em = $this->getDoctrine()->getManager();

        foreach ($url['usernames'] as $username) {
            $em->persist(new Url($username, $questionnaire));
        }
        $em->flush();

        return new Response();
    }

    /**
     * @Method("DELETE")
     * @Route("/urls/{id}")
     */
    public function removeUrl($id)
    {
        $url = $this->getUrlWithCheck($id);

        $em = $this->getDoctrine()->getManager();
        $participant = $url->getParticipant();

        if ($participant) {
            $participant->setUrl(null);
            $em->persist($participant);
        }
        $em->remove($url);
        $em->flush();

        return new Response();
    }

    /**
     * @Method("POST")
     * @Route("/urls/{id}")
     */
    public function updateUrl(Request $request, $id)
    {
        $urlData = json_decode($request->getContent(), true);
        $url = $this->getUrlWithCheck($id);

        $url->setUsername($urlData['username']);

        $em = $this->getDoctrine()->getManager();
        $em->persist($url);
        $em->flush();

        return new Response();
    }

    private function getUrlWithCheck($id)
    {
        $userId = $this->get('security.token_storage')->getToken()->getUser()->getId();

        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
        $qb->select('url')
            ->from('AppBundle:Url', 'url')
            ->join('url.questionnaire', 'q')
            ->join('q.user', 'u')
            ->where('url.id = ?1')
            ->andWhere('u.id = ?2')
            ->setParameter(1, $id)
            ->setParameter(2, $userId);

        return $qb->getQuery()->getSingleResult();
    }

    private function getQuestionnaire($id)
    {
        // Get the current user id to lookup for questionnaires which belong to this user.
        $userId = $this->get('security.token_storage')->getToken()->getUser()->getId();

        // Query the questionnaire.
        $qb = $this->getDoctrine()->getManager()->createQueryBuilder();
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
}