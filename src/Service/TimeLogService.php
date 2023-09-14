<?php

namespace App\Service;

use App\Entity\TimeLog;
use App\Model\TimeLogCreateRequest;
use App\Repository\TimeLogRepository;
use Doctrine\ORM\EntityManagerInterface;

class TimeLogService
{
    public function __construct(
        private EntityManagerInterface $entityManager,
        private TimeLogRepository $timeLogRepository
    )
    {

    }

    public function index()
    {
        return $this->timeLogRepository->findAll();
    }

    public function new(TimeLogCreateRequest $createRequest)
    {
        $timeLog = (new TimeLog())
                    ->setLogName($createRequest->getLogName())
                    ->setLogStart($createRequest->getLogStart())
                    ->setLogEnd($createRequest->getLogEnd())
        ;

        $this->entityManager->persist($timeLog);
        $this->entityManager->flush();

    }

}
