<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * Redirect to an existing method
     *
     * @Route("/")
     *
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        return $this->redirectToRoute('get_currency');
    }
}
