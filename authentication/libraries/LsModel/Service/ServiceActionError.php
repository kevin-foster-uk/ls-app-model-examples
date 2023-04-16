<?php
namespace LsModel\Service;

class ServiceActionError
{
    private $message = null;
    private $code = null;

    public function __construct($message = null, $code = null)
    {
        $this->message = $message;
        $this->code = $code;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getCode()
    {
        return $this->code;
    }
}