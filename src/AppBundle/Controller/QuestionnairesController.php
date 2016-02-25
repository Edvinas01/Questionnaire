<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class QuestionnairesController extends Controller
{
    /**
     * @Method("GET")
     * @Route("/questionnaires", name="questionnaires_home")
     */
    public function questionnairesHomeAction(Request $request)
    {
        return $this->render('questionnaires/home.html.twig', array(
            'visibility' => $request->query->get('visibility', null),
            'name' => $request->query->get('name', null)
        ));
    }

    /**
     * @Method("POST")
     * @Route("/questionnaires", name="questionnaires_create")
     */
    public function questionnairesCreateAction(Request $request)
    {
        return $this->render('questionnaires/home.html.twig');
    }
}