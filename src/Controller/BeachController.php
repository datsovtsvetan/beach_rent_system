<?php


namespace App\Controller;



use App\Repository\DeckChairRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BeachController extends AbstractController
{

    /**
     * @Route("/")
     * @return Response
     */
    public function index(): Response
    {
        $dataArray = ['test' => 'ok'];
//        return $this->json($dataArray);
        return new Response('bla bla');
    }
//
//    /**
//     * @Route("/{companyId}/{beachId}", name="app_index")
//     */
//    public function show($companyId, $beachId, DeckChairRepository $repository): JsonResponse
//    {
//        //$dataArray = ['test' => $wildCard];
//        $dataArray = $repository->findByCompanyId($companyId, $beachId);
//        dd($dataArray);
//
//
//        return $this->json($dataArray);
//    }
}