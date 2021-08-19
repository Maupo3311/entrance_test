<?php

namespace App\EventListener;

use App\Exception\AuthException;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestListener
{
    /**
     * Checking the auth header.
     *
     * @param GetResponseEvent $event A GetResponseEvent instance.
     * @throws AuthException If the user is not logged in.
     */
    public function onKernelRequest(GetResponseEvent $event): void
    {
        $authHeader = $event->getRequest()->headers->get('X-API-KEY');
        if ($authHeader !== '123321') {
            throw AuthException::unauthorized();
        }
    }
}
