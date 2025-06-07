<?php

namespace App\Exceptions;

use Exception;

class AuthException extends Exception
{
    function __construct($message = "Falha na autenticação")
    {
        parent::__construct($message);
    }
}
