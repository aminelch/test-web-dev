<?php

    namespace App\Controller;

    use App\Entity\User;
    use App\Form\RegisterType;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\Form\Exception\LogicException;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

    class RegisterController extends AbstractController
    {
        /**
         * @Route("/register", name="app_register")
         * @param Request                      $request
         * @param EntityManagerInterface       $em
         * @param UserPasswordEncoderInterface $passwordEncoder
         * @return Response
         * @throws LogicException
         * @throws \Symfony\Component\Security\Core\Exception\BadCredentialsException
         */
        public function index(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $passwordEncoder): Response
        {
            $user = new User;
            $form = $this->createForm(RegisterType::class, $user);
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {

                $user->setPassword(
                    $passwordEncoder->encodePassword(
                        $user,
                        $form['password']->getData()
                    ));


                $em->persist($user);
                $em->flush();

                $this->addFlash("success", "your account is created with success, you can log in now");
                return $this->redirectToRoute("app_home");
            }
            return $this->render('register/register.html.twig', [
                'form' => $form->createView()
            ]);
        }
    }
