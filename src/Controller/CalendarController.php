<?php

namespace App\Controller;

use App\Entity\Calendar;
use App\Form\Calendar1Type;
use App\Form\Calendar2Type;
use App\Entity\Sensor;
use App\Form\SensorType;
use App\Repository\SensorRepository;
use App\Repository\CalendarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use App\Entity\User;

/**
 * @Route("/calendar")
 */
class CalendarController extends AbstractController
{
    private $security;

    public function __construct(\Symfony\Component\Security\Core\Security $security)
    {
        $this->security = $security;
    }
    /**
     * @Route("/", name="calendar_index", methods={"GET"})
     */
    public function index(CalendarRepository $calendarRepository): Response
    {
        $calendar_user=$this->security->getUser();

        return $this->render('calendar/index.html.twig', [
            'calendars' => $calendarRepository->findBy(array('calendar_user' => $calendar_user)),
        ]);
    }




    /**
     * @Route("calendarappcheked", name="calendarappcheked", methods={"GET"})
     */
    public function calendar(CalendarRepository $calendarRepository): Response
    {
        $calendar_user=$this->security->getUser();

        return $this->render('calendar/checked.html.twig', [
            'calendars' => $calendarRepository->findBy(array('calendar_user' => $calendar_user,'state' => 'checked')),
        ]);
    }

    /**
     * @Route("calendarappfree", name="calendarappfree", methods={"GET"})
     */
    public function calend(CalendarRepository $calendarRepository): Response
    {
        $calendar_user=$this->security->getUser();

        return $this->render('calendar/free.html.twig', [
            'calendars' => $calendarRepository->findBy(array('calendar_user' => $calendar_user,'state' => 'free')),
        ]);
    }





    /**
     * @Route("/new", name="calendar_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        //$user = $this->container->get('security.token_storage')->getToken()->getUser();
        $calendar = new Calendar();
        $form = $this->createForm(Calendar1Type::class, $calendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($calendar);
            $entityManager->flush();

            return $this->redirectToRoute('calendar_index');
        }

        return $this->render('calendar/new.html.twig', [
            'calendar' => $calendar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/app", name="calendar_app", methods={"GET","POST"})
     */
    public function app(Request $request, Calendar $calendar): Response
    {
        $form = $this->createForm(Calendar2Type::class, $calendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('calendar_index');
        }

        return $this->render('calendar/app.html.twig', [
            'calendar' => $calendar,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{id}", name="calendar_show", methods={"GET"})
     */
    public function show(Calendar $calendar): Response
    {
        return $this->render('calendar/show.html.twig', [
            'calendar' => $calendar,
        ]);
    }

    /**
     * @Route("/{id}/paiement", name="paiement", methods={"GET"})

     */

    public function paiement(Calendar $calendar): Response
    {
        return $this->render('calendar_state/paiement.html.twig', [
            'calendar' => $calendar,
        ]);
    }

    /**
     * @Route("/{id}/Consultation", name="Consultation", methods={"GET"})
     */
    public function Consultation(Calendar $calendar): Response
    {
        return $this->render('calendar_state/Consultation.html.twig', [
            'calendar' => $calendar,
        ]);

    }


    /**
     * @Route("{examinationSensor", name="examinationSensor", methods={"GET"})

     */
    public function examinationSensor(SensorRepository $sensorRepository): Response
    {
        /*return $this->render('calendar_state/examinationSensor.html.twig', [
            'calendar' => $calendar,
        ]);*/


        return $this->render('sensor/sensorrealLoad.html.twig', [
            'sensors' => $sensorRepository->findBy([],['id'=>'desc'],3),
        ]);



    }


    /**
     * @Route("{id}/examination", name="examination", methods={"GET"})

     */
    public function examination(Calendar $calendar): Response
    {
        return $this->render('calendar_state/examination.html.twig', [
            'calendar' => $calendar,
        ]);



    }



    /**
     * @Route("/{id}", name="TeleConsultation", methods={"GET"})
     */
    public function sho(Calendar $calendar): Response
    {
        return $this->render('calendar_state/examination.html.twig', [
            'calendar' => $calendar,
        ]);
    }


    /**
     * @Route("/{id}", name="TeleConsultationDoctor", methods={"GET"})
     */
    public function shoe(Calendar $calendar): Response
    {
        return $this->render('calendar_state/examination.html.twig', [
            'calendar' => $calendar,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="calendar_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Calendar $calendar): Response
    {
        $form = $this->createForm(Calendar1Type::class, $calendar);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('calendar_index');
        }

        return $this->render('calendar/edit.html.twig', [
            'calendar' => $calendar,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="calendar_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Calendar $calendar): Response
    {
        if ($this->isCsrfTokenValid('delete'.$calendar->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($calendar);
            $entityManager->flush();
        }

        return $this->redirectToRoute('calendar_index');
    }




}
