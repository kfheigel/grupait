<?php

namespace App\Controller;

use App\Handler\DataHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PresentDataController extends AbstractController
{
    public function __construct(private DataHandler $dataHandler)
    {
    }

    #[Route('/present', name: 'present_data', methods: 'GET')]
    public function index(): JsonResponse
    {
        return new JsonResponse(
            $this->dataHandler->getData(),
            Response::HTTP_OK,
            []
        );
    }
}
