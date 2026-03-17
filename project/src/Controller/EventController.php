<?php
namespace App\Controller;

use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class EventController extends AbstractController
{
    #[Route("/event", name: "event_list")]
    public function list(EntityManagerInterface $em): Response
    {
        $event = $em->getRepository(Event::class)->findAll();
        return $this->render("event/index.html.twig", [
            "eventList" => $event,
        ]);
    }
}
