<?php

namespace App\Controller;

use App\Entity\Sourcedoc;
use App\Form\SourcedocType;
use App\Repository\SourcedocRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sourcedoc")
 */
class SourcedocController extends AbstractController
{
    /**
     * @Route("/", name="sourcedoc_index", methods={"GET"})
     */
    public function index(SourcedocRepository $sourcedocRepository): Response
    {
        return $this->render('sourcedoc/index.html.twig', [
            'sourcedocs' => $sourcedocRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sourcedoc_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sourcedoc = new Sourcedoc();
        $form = $this->createForm(SourcedocType::class, $sourcedoc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sourcedoc);
            $entityManager->flush();

            return $this->redirectToRoute('sourcedoc_index');
        }

        return $this->render('sourcedoc/new.html.twig', [
            'sourcedoc' => $sourcedoc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sourcedoc_show", methods={"GET"})
     */
    public function show(Sourcedoc $sourcedoc): Response
    {
        return $this->render('sourcedoc/show.html.twig', [
            'sourcedoc' => $sourcedoc,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sourcedoc_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sourcedoc $sourcedoc): Response
    {
        $form = $this->createForm(SourcedocType::class, $sourcedoc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sourcedoc_index');
        }

        return $this->render('sourcedoc/edit.html.twig', [
            'sourcedoc' => $sourcedoc,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sourcedoc_delete", methods={"POST"})
     */
    public function delete(Request $request, Sourcedoc $sourcedoc): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sourcedoc->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sourcedoc);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sourcedoc_index');
    }
}
