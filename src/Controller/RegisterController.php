<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register", name="app_register")
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        $user = new User;
        $form= $this->createForm(RegisterType::class,$user );
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            dd("processing");
        }
        return $this->render('register/register.html.twig', [
            'form'=> $form->createView()
        ]);
    }
}