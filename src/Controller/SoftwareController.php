<?php

namespace App\Controller;

use App\Entity\Software;
use App\Form\SoftwareType;
use App\Repository\SoftwareRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/software")
 *  @IsGranted("ROLE_USER")
 */
class SoftwareController extends AbstractController
{
    /**
     * @Route("/", name="software_index", methods={"GET"})
     * @param SoftwareRepository $softwareRepository
     * @return Response
     */
    public function index(SoftwareRepository $softwareRepository): Response
    {
        return $this->render('software/index.html.twig', [
            'software' => $softwareRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="software_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $software = new Software();
        $form = $this->createForm(SoftwareType::class, $software);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($software);
            $entityManager->flush();
            $this->addFlash('success', 'Item added with success');
            return $this->redirectToRoute('software_index');
        }

        return $this->render('software/new.html.twig', [
            'software' => $software,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="software_show", methods={"GET"})
     * @param Software $software
     * @return Response
     */
    public function show(Software $software): Response
    {
        return $this->render('software/show.html.twig', [
            'software' => $software,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="software_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Software $software): Response
    {
        $form = $this->createForm(SoftwareType::class, $software);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Item updated with success');
            return $this->redirectToRoute('software_index');
        }

        return $this->render('software/edit.html.twig', [
            'software' => $software,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="software_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Software $software): Response
    {
        if ($this->isCsrfTokenValid('delete'.$software->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($software);
            $entityManager->flush();
        }
        $this->addFlash('success', 'Item deleted with success');
        return $this->redirectToRoute('software_index');
    }
}
