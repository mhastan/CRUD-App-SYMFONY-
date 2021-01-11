<?php

namespace App\Controller;

use App\Entity\MedicijnController;
use App\Form\MedicijnenFormType;
use App\Repository\MedicijnControllerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="medicijnen")
     */
    // Read
    public function Medicijnen(MedicijnControllerRepository $medicijnControllerRepository): Response
    {
        return $this->render('main/Medicijnen.html.twig', [
            'medicijnen' => $medicijnControllerRepository->findAll()
        ]);
    }


    /**
     * @Route("/medicijnen", name="main")
     */
    // Create
    public function index(Request $request): Response
    {

        $medicijnen = new MedicijnController();

        $form = $this->createForm(MedicijnenFormType::class, $medicijnen);

        $form->add('Save', SubmitType::class, [
            'attr' => ['class' => 'btn btn-dark float-right']
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
            $em->persist($data);
            $em->flush();
            return $this->redirect($this->generateUrl('medicijnen'));
        }


        return $this->render('main/index.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id?}", name="delete")
     */
    // Delete
    public function delete(Request $request, MedicijnControllerRepository $medicijnControllerRepository): Response
    {
        $id = $request->get('id');

        if (empty(trim($id))) {
            return new Response('Geen ID meegegeven!');
        } else {

            $em = $this->getDoctrine()->getManager();
            $medicijn = $medicijnControllerRepository->find($id);

            $em->remove($medicijn);
            $em->flush();

            return $this->redirect($this->generateUrl('medicijnen'));

        }
    }

    /**
     * @Route("/update/{id?}", name="update", methods={"GET","POST"}))
     */
    // Update
    public function update(Request $request, MedicijnController $medicijnController): Response
    {

        $form = $this->createForm(MedicijnenFormType::class, $medicijnController);

        $form->add('Update', SubmitType::class, [
            'attr' => ['class' => 'btn btn-dark float-right']
        ]);


        $form->handleRequest($request);

        if($form->isSubmitted()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirect($this->generateUrl('medicijnen'));
        }


        return $this->render('main/update.html.twig', [
            'medicijnen' => $medicijnController,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/show/{id?}", name="show")
     */
    // Read
    public function show(MedicijnController $medicijnController): Response
    {
        return $this->render('main/watch.html.twig', [
            'medicijnen' => $medicijnController
        ]);
    }

}
