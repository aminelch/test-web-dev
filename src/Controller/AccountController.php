<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AccountController
 * @IsGranted("ROLE_USER")
 * @package App\Controller
 */
class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="app_account")
     */
    public function index(): Response
    {
        return $this->render('account/account.html.twig');
    }
}
