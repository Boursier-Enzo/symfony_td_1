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
    #[Route("/promo/new", name: "promo_new")]
    public function new(
        Request $request,
        EntityManagerInterface $entityManager,
    ): Response {
        $promo = new Promo();
        $form = $this->createForm(PromoFormType::class, $promo);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($promo);
            $entityManager->flush();
            return $this->redirectToRoute("promo_list"); // redirige vers la liste après ajout
        }
        return $this->render("promo/new.html.twig", [
            "form" => $form,
        ]);
    }

    #[Route("/promo", name: "promo_list")]
    public function list(PromoRepository $promoRepository): Response
    {
        return $this->render("promo/index.html.twig", [
            "promoList" => $promoRepository->findAll(),
        ]);
    }
}
