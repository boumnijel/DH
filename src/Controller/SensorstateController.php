<?php

namespace App\Controller;

use App\Entity\Sensorstate;
use App\Form\SensorstateType;
use App\Repository\SensorstateRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sensorstate")
 */
class SensorstateController extends AbstractController
{
    /**
     * @Route("/", name="sensorstate_index", methods={"GET"})
     */
    public function index(SensorstateRepository $sensorstateRepository): Response
    {
        return $this->render('sensorstate/index.html.twig', [
            'sensorstates' => $sensorstateRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="sensorstate_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sensorstate = new Sensorstate();
        $form = $this->createForm(SensorstateType::class, $sensorstate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sensorstate);
            $entityManager->flush();

            return $this->redirectToRoute('sensorstate_index');
        }

        return $this->render('sensorstate/new.html.twig', [
            'sensorstate' => $sensorstate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sensorstate_show", methods={"GET"})
     */
    public function show(Sensorstate $sensorstate): Response
    {
        return $this->render('sensorstate/show.html.twig', [
            'sensorstate' => $sensorstate,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sensorstate_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sensorstate $sensorstate): Response
    {
        $form = $this->createForm(SensorstateType::class, $sensorstate);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sensorstate_index');
        }

        return $this->render('sensorstate/edit.html.twig', [
            'sensorstate' => $sensorstate,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sensorstate_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Sensorstate $sensorstate): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sensorstate->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sensorstate);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sensorstate_index');
    }
}
