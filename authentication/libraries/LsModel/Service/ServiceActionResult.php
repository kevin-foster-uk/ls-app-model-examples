<?php
namespace LsModel\Service;

class ServiceActionResult
{
    private $errors = [];

    public function __construct($errors = [])
    {
        $this->errors = [];
    }

    public function isSuccess()
    {
        return count($this->errors) == 0;
    }

    public static function factoryUnknownError()
    {
        return new static(['Unkown error']);
    }
}