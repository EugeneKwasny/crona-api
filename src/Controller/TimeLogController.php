<?php

namespace App\Controller;

use App\Attribute\RequestBody;
use App\Model\TimeLogCreateRequest;
use App\Service\TimeLogService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class TimeLogController extends AbstractController
{
    public function __construct(
        private TimeLogService $timeLogService
    )
    {

    }
    #[Route('/time/log', name: 'app_time_log', methods:['GET'])]
    public function index(): JsonResponse
    {
        return $this->json($this->timeLogService->index());
    }

    #[Route(path:'/time/log', methods:['POST'])]
    public function new(#[RequestBody] TimeLogCreateRequest $createRequest): JsonResponse
    {
        return $this->json($this->timeLogService->new($createRequest));
    }

}
