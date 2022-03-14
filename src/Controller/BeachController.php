<?php


namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BeachController extends AbstractController
{

    /**
     * @Route("/")
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $dataArray = ['test' => 'ok'];
        return $this->json($dataArray);
    }

    /**
     * @Route("/{wildCard}", name="app_index")
     */
    public function show($wildCard): JsonResponse
    {
        $dataArray = ['test' => $wildCard];
        return $this->json($dataArray);
    }
}