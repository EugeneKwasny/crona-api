<?php

namespace App\Entity;

use App\Repository\TimeLogRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TimeLogRepository::class)]
class TimeLog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $logStart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $logEnd = null;

    #[ORM\Column(length: 255)]
    private ?string $logName = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogStart(): ?\DateTimeInterface
    {
        return $this->logStart;
    }

    public function setLogStart(\DateTimeInterface $logStart): static
    {
        $this->logStart = $logStart;

        return $this;
    }

    public function getLogEnd(): ?\DateTimeInterface
    {
        return $this->logEnd;
    }

    public function setLogEnd(?\DateTimeInterface $logEnd): static
    {
        $this->logEnd = $logEnd;

        return $this;
    }

    public function getLogName(): ?string
    {
        return $this->logName;
    }

    public function setLogName(string $logName): static
    {
        $this->logName = $logName;

        return $this;
    }
}
