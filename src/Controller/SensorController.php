<?php

namespace App\Controller;

use App\Entity\Sensor;
use App\Form\SensorType;
use App\Repository\SensorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sensor")
 */
class SensorController extends AbstractController
{
    /**
     * @Route("/", name="sensor_index", methods={"GET"})
     */
    public function index(SensorRepository $sensorRepository): Response
    {
        return $this->render('sensor/index.html.twig', [
            'sensors' => $sensorRepository->findAll(),
        ]);
       
    }

    /**
     * @Route("/sensorreal", name="sensorreal", methods={"GET"})
     */
    public function sensor(SensorRepository $sensorRepository): Response
    {
       
       return $this->render('sensor/sensorreal.html.twig', [
            'sensors' => $sensorRepository->findBy([], ['id' => 'desc'],1,0),
        ]);
    }


    /**
     * @Route("/sensore", name="sensore", methods={"GET"})
     */
    public function sensore(SensorRepository $sensorRepository): Response
    {
        return $this->render('sensor/sensore.html.twig', [
            'sensors' => $sensorRepository->findBy([],['id'=>'desc'],3),
        ]);
    }



    /**
     * @Route("/new", name="sensor_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sensor = new Sensor();
        $form = $this->createForm(SensorType::class, $sensor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sensor);
            $entityManager->flush();

            return $this->redirectToRoute('sensor_index');
        }

        return $this->render('sensor/new.html.twig', [
            'sensor' => $sensor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sensor_show", methods={"GET"})
     */
    public function show(Sensor $sensor): Response
    {
        return $this->render('sensor/show.html.twig', [
            'sensor' => $sensor,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sensor_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sensor $sensor): Response
    {
        $form = $this->createForm(SensorType::class, $sensor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sensor_index');
        }

        return $this->render('sensor/edit.html.twig', [
            'sensor' => $sensor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sensor_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Sensor $sensor): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sensor->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sensor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sensor_index');
    }
}
