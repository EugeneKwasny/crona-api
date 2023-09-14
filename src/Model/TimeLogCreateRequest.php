<?php

namespace App\Model;

use DateTimeInterface;

class TimeLogCreateRequest
{
    private ?string $logName = null;

    private ?DateTimeInterface $logStart = null;

    private ?DateTimeInterface $logEnd = null;

    

    /**
     * Get the value of logStart
     *
     * @return ?DateTimeInterface
     */
    public function getLogStart(): ?DateTimeInterface
    {
        return $this->logStart;
    }

    /**
     * Set the value of logStart
     *
     * @param ?DateTimeInterface $logStart
     *
     * @return self
     */
    public function setLogStart(?DateTimeInterface $logStart): self
    {
        $this->logStart = $logStart;

        return $this;
    }

    /**
     * Get the value of logEnd
     *
     * @return ?DateTimeInterface
     */
    public function getLogEnd(): ?DateTimeInterface
    {
        return $this->logEnd;
    }

    /**
     * Set the value of logEnd
     *
     * @param ?DateTimeInterface $logEnd
     *
     * @return self
     */
    public function setLogEnd(?DateTimeInterface $logEnd): self
    {
        $this->logEnd = $logEnd;

        return $this;
    }

    

    /**
     * Get the value of logName
     *
     * @return ?string
     */
    public function getLogName(): ?string
    {
        return $this->logName;
    }

    /**
     * Set the value of logName
     *
     * @param ?string $logName
     *
     * @return self
     */
    public function setLogName(?string $logName): self
    {
        $this->logName = $logName;

        return $this;
    }
}