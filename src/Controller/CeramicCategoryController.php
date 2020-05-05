<?php

namespace App\Controller;

use App\Entity\CeramicCategory;
use App\Form\CeramicCategoryType;
use App\Repository\CeramicCategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ceramic/category")
 */
class CeramicCategoryController extends AbstractController
{
    /**
     * @Route("/", name="ceramic_category_index", methods={"GET"})
     */
    public function index(CeramicCategoryRepository $ceramicCategoryRepository): Response
    {
        return $this->render('ceramic_category/index.html.twig', [
            'ceramic_categories' => $ceramicCategoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ceramic_category_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ceramicCategory = new CeramicCategory();
        $form = $this->createForm(CeramicCategoryType::class, $ceramicCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ceramicCategory);
            $entityManager->flush();

            return $this->redirectToRoute('ceramic_category_index');
        }

        return $this->render('ceramic_category/new.html.twig', [
            'ceramic_category' => $ceramicCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ceramic_category_show", methods={"GET"})
     */
    public function show(CeramicCategory $ceramicCategory): Response
    {
        return $this->render('ceramic_category/show.html.twig', [
            'ceramic_category' => $ceramicCategory,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ceramic_category_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CeramicCategory $ceramicCategory): Response
    {
        $form = $this->createForm(CeramicCategoryType::class, $ceramicCategory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ceramic_category_index');
        }

        return $this->render('ceramic_category/edit.html.twig', [
            'ceramic_category' => $ceramicCategory,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ceramic_category_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CeramicCategory $ceramicCategory): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ceramicCategory->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ceramicCategory);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ceramic_category_index');
    }
}
