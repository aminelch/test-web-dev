<?php

namespace App\Controller;

use App\Repository\SoftwareRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_home")
     */
    public function index(SoftwareRepository $repository): Response
    {
        $items = $repository->findBy([], ["id"=>"DESC"]);
        dump($items);
        return $this->render('home/index.html.twig', [
         "softwareList"=>$items
        ]);
    }
}
