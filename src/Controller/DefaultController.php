<?php

namespace App\Controller;

use App\Repository\BeerRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="default")
     * @param BeerRepository $beerRepository
     * @return response
     */
    public function index(BeerRepository $beerRepository): Response
    {
        return $this->render('default/index.html.twig', [
            'beers' => $beerRepository,
        ]);
    }

    /**
     * @Route("/beer", name="beer")
     * @param BeerRepository $beerRepository
     * @return JsonResponse
     */
    public function beer(BeerRepository $beerRepository)
    {
        //dump($beerRepository); die('');
        return $this->json($beerRepository->findAll());
    }
}
