<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    public function __construct($message = 'Não encontrado.')
    {
        parent::__construct($message);
    }
}
