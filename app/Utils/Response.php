<?php

namespace App\Utils;


class Response {
    private $status;
    private $message;
    private $data;

    public static function getResponse($status, $message, $data = null) {
        return new Response($status, $message, $data);
    }

    private function __construct($status, $message, $data)
    {   
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }

    private function __clone(){}

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getData(): mixed
    {
        return $this->data;
    }
}