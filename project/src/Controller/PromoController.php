<?php
namespace App\Controller;

use App\Entity\Promo;
use App\Form\PromoFormType;
use App\Repository\PromoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PromoController extends AbstractController
{
    #[Route("/promo", name: "promo_list")]
    public function list(PromoRepository $promoRepository): Response
    {
        return $this->render("promo/index.html.twig", [
            "promoList" => $promoRepository->findAll(),
        ]);
    }
}
