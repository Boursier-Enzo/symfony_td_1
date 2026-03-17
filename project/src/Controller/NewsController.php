<?php
namespace App\Controller;

use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NewsController extends AbstractController
{
    #[Route("/news", name: "news_list")]
    public function list(EntityManagerInterface $em): Response
    {
        $news = $em->getRepository(News::class)->findAll();
        return $this->render("news/index.html.twig", [
            "newsList" => $news,
        ]);
    }
}
