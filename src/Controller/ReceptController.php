<?php

namespace App\Controller;

use App\Entity\Recept;
use App\Form\ReceptFormType;
use Symfony\Component\Form\Forms;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReceptController extends AbstractController
{
    /**
     * @Route("/recept", name="recept")
     */
    public function index(Request $request): Response
    {

        $recepten = new Recept();
        $form = $this->createForm(ReceptFormType::class,$recepten);

        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($recepten);
            $em->flush();
        }



        return $this->render('recept/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
