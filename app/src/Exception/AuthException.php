<?php

namespace App\Exception;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class AuthException extends Exception
{
    /**
     * @return AuthException
     */
    public static function unauthorized(): AuthException
    {
        return new self('You are not logged in', Response::HTTP_UNAUTHORIZED);
    }
}
