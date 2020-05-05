<?php

namespace App\Controller;

use App\Entity\Ceramic;
use App\Form\CeramicType;
use App\Repository\CeramicRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ceramic")
 */
class CeramicController extends AbstractController
{
    /**
     * @Route("/", name="ceramic_index", methods={"GET"})
     */
    public function index(CeramicRepository $ceramicRepository): Response
    {
        return $this->render('ceramic/index.html.twig', [
            'ceramics' => $ceramicRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ceramic_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ceramic = new Ceramic();
        $form = $this->createForm(CeramicType::class, $ceramic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ceramic);
            $entityManager->flush();

            return $this->redirectToRoute('ceramic_index');
        }

        return $this->render('ceramic/new.html.twig', [
            'ceramic' => $ceramic,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ceramic_show", methods={"GET"})
     */
    public function show(Ceramic $ceramic): Response
    {
        return $this->render('ceramic/show.html.twig', [
            'ceramic' => $ceramic,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ceramic_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Ceramic $ceramic): Response
    {
        $form = $this->createForm(CeramicType::class, $ceramic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ceramic_index');
        }

        return $this->render('ceramic/edit.html.twig', [
            'ceramic' => $ceramic,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ceramic_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Ceramic $ceramic): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ceramic->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ceramic);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ceramic_index');
    }
}
