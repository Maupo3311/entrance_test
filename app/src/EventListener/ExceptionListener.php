<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;

class ExceptionListener
{
    /**
     * We return the error in json format.
     *
     * @param GetResponseForExceptionEvent $event A GetResponseForExceptionEvent instance.
     */
    public function onKernelException(GetResponseForExceptionEvent $event): void
    {
        $exception = $event->getException();
        $response  = new JsonResponse([
            'status'  => 'error',
            'message' => $exception->getMessage(),
        ], $exception->getCode());
        $event->setResponse($response);
    }
}
