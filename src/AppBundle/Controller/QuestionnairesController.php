<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

class QuestionnairesController extends Controller
{
    /**
     * @Method("POST")
     * @Route("/questionnaires", name="questionnaires_home")
     */
    public function questionnairesHomeAction(Request $request)
    {
        return $this->render('questionnaires/home.html.twig', array(
            'visibility' => $request->request->get('visibility'),
            'name' => $request->request->get('name')
        ));
    }
}