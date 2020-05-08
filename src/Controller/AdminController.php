<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Ceramic;
use App\Form\CeramicType;
use App\Controller\CeramicController;
use App\Repository\CeramicRepository;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/adminpage", name="admin")
 */
class AdminController extends AbstractController
{
    /**
     * @Route("/", name="farfor_index", methods={"GET"})
     */
    public function index(CeramicRepository $ceramicRepository): Response
    {
        return $this->render('admin/index.html.twig', [

        ]);
    }



    /**
     * @Route("/ceramic", name="adminceramic")
     */
    public function seeceramic(CeramicRepository $ceramicRepository): Response
    {
        return $this->render('admin/indexceramic.html.twig', [
            'controller_name' => 'AdminController',
            'ceramics' => $ceramicRepository->findAll(),
        ]);
    }

}