<?php

namespace App\Controller;

use App\Entity\Calendar;
use App\Repository\CalendarRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use App\Entity\User;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
class CalendarStateController extends AbstractController
{

    private $security;

    public function __construct(\Symfony\Component\Security\Core\Security $security)
    {
        $this->security = $security;
    }
    /**
     * @Route("/appointment", name="appointment", methods={"GET"})
     */
    public function index(CalendarRepository $calendarRepository): Response
    {
        $calendar_user=$this->security->getUser();
        return $this->render('calendar_state/futureconsultation.html.twig', [
            'calendars' => $calendarRepository->findBy(array('user_patient' => $calendar_user),array('start' => 'DESC')
           
        ),
        ]);
    }


    /**
     * @Route("/event", name="event")
     */
    public function reservation(CalendarRepository $calendarRepository): Response
    {

        $date =new \DateTime('now +2 hours');
        $calendar_user=$this->security->getUser();
        return $this->render('calendar_state/index.html.twig', [
          /*  'calendars' => $calendarRepository->findBy(array('state' => 'Future Consultation'),array('start' => 'DESC')*/
            'calendars' => $calendarRepository->findBy(array('state' => 'free'),array('start' => 'DESC')

        ),
        ]);
    }



    /**
     * @Route("/TeleConsultation", name="TeleConsultation", methods={"GET"})
     */
    public function TeleConsultation(): Response
    {
        return $this->render('calendar_state/TeleConsultation.html.twig', []);
    }

    /**
     * @Route("/TeleConsultationDoctor", name="TeleConsultationDoctor")
     */
    public function TeleConsultationDoctor(): Response
    {
        return $this->render('calendar_state/TeleConsultationDoctor.html.twig', []);
    }




}
