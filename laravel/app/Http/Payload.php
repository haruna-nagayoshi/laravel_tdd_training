<?php

namespace App\Http;

class Payload
{
    public const CREATED = 'CREATED';

    private string $status;

    private $output;

    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setOutput($output): self
    {
        $this->output = $output;

        return $this;
    }

    public function getOutput()
    {
        return $this->output;
    }
}
