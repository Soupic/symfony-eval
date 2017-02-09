<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Publication;
use AppBundle\Form\PublicationType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class AppController
 * @package AppBundle\Controller
 */
class AppController extends Controller
{
    /**
     * Home page action.
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $publications = $em->getRepository('AppBundle:Publication')->findPublication();

        return $this->render('AppBundle:App:home.html.twig', [
            "publications" => $publications,
        ]);
    }

    public function detailAction()
    {
        $em = $this->getDoctrine()->getManager();
        $sciences = $em->getRepository("AppBundle:Science")->findAll();
        $publications = $em->getRepository("AppBundle:Publication")->findAll();

        return $this->render("AppBundle:App:detail_science.html.twig", [
            "sciences" => $sciences,
            "publications" => $publications,
        ]);
    }
}
