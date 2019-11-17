<?php

namespace App\Controller;

use App\Entity\Aplications;
use App\Form\AplicationsType;
use App\Repository\AplicationsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/aplications")
 */
class AplicationsController extends AbstractController
{
    /**
     * @Route("/", name="aplications_index", methods={"GET"})
     */
    public function index(AplicationsRepository $aplicationsRepository): Response
    {
        return $this->render('aplications/index.html.twig', [
            'aplications' => $aplicationsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="aplications_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $aplication = new Aplications();
        $form = $this->createForm(AplicationsType::class, $aplication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($aplication);
            $entityManager->flush();

            return $this->redirectToRoute('aplications_index');
        }

        return $this->render('aplications/new.html.twig', [
            'aplication' => $aplication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="aplications_show", methods={"GET"})
     */
    public function show(Aplications $aplication): Response
    {
        return $this->render('aplications/show.html.twig', [
            'aplication' => $aplication,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="aplications_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Aplications $aplication): Response
    {
        $form = $this->createForm(AplicationsType::class, $aplication);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('aplications_index');
        }

        return $this->render('aplications/edit.html.twig', [
            'aplication' => $aplication,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="aplications_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Aplications $aplication): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aplication->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($aplication);
            $entityManager->flush();
        }

        return $this->redirectToRoute('aplications_index');
    }
}
