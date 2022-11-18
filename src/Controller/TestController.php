<?php
namespace App\Controller;
use App\Entity\Calendar;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index()
    {
        return $this->render('index.html.twig');
    }

    /**
     * @Route("/events", name="events")
     */
    public function events()
    {
        $events = $this->getDoctrine()
            ->getRepository(Event::class)
            ->findAll();

        $eventsArray = array();

        foreach($events as $event) {
            $start = $event->getStart()->format('Y-m-d H:i:s');
            $end = $event->getEnd()->format('Y-m-d H:i:s');
            $eventsArray[] = array(
                'id' => $event->getId(),
                'title' => $event->getTitle(),
                'start' => $start,
                'end' => $end,
                "textColor" => "white"
            );
        }

        return $this->json($eventsArray);
    }

    /**
     * @Route("/event/show/{title}", name="show_event")
     */
    public function show($title){

        $repository = $this->getDoctrine()->getRepository(Event::class);
        $event = $repository->findOneBy(['title' => $title]);

        return $this->render('show.html.twig',[
            'event' =>  $event
        ]);
    }


    /**
     * @Route("/add/event", name="add_event")
     */
    public function add(Request $request){
        $event = new Event();
        $start = new \DateTime($request->request->get('start'));
        $end = new \DateTime($request->request->get('end'));
        $event->setTitle($request->request->get('title'));
        $event->setStart($start);
        $event->setEnd($end);

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($event);
        $entityManager->flush();

        return $this->json([
            'message' =>  'added'
        ]);
    }

    /**
     * @Route("/event/edit/{title}", name="update_event")
     */
    public function update(Request $request,$title){

        $repository = $this->getDoctrine()->getRepository(Event::class);
        $event = $repository->findOneBy(['title' => $title]);
        $start = new \DateTime($request->request->get('start'));
        $end = new \DateTime($request->request->get('end'));
        $event->setTitle($request->request->get('title'));
        $event->setStart($start);
        $event->setEnd($end);

        $entityManager = $this->getDoctrine()->getManager();

        $entityManager->persist($event);
        $entityManager->flush();

        return $this->json([
            'message' =>  'updated'
        ]);
    }

    /**
     * @Route("/event/delete/{title}", name="delete_event")
     */
    public function delete($title){

        $repository = $this->getDoctrine()->getRepository(Event::class);
        $event = $repository->findOneBy(['title' => $title]);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($event);
        $entityManager->flush();

        return $this->json([
            'message' =>  'deleted'
        ]);
    }
}
