<?php

namespace App\Controller;

use App\Exception\CurrencyException;
use App\Service\CurrencyService;
use App\Service\TextService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/exchange")
 */
class CurrencyController extends Controller
{
    /** @var TextService */
    private $textService;
    /** @var CurrencyService */
    private $currencyService;

    /**
     * @param CurrencyService $currencyService A CurrencyService instance.
     * @param TextService     $textService     A TextService instance.
     */
    public function __construct(CurrencyService $currencyService, TextService $textService)
    {
        $this->currencyService = $currencyService;
        $this->textService     = $textService;
    }

    /**
     * Get the currency rate.
     * If the currency is not specified, a random one is taken.
     *
     * @Route("/{currency}", defaults={"currency"=null}, methods={"GET"}, name="get_currency")
     *
     * @param string|null $currency Currency name.
     * @return JsonResponse
     * @throws CurrencyException If it was not possible to get data about currencies.
     */
    public function getCurrency(?string $currency): JsonResponse
    {
        $currencyObject = $currency === null ?
            $this->currencyService->getRandCurrency() :
            $this->currencyService->getCurrency($currency);

        return $this->json([
            'status'                       => 'success',
            $currencyObject->getCharCode() => $this->textService->formulateResponseAboutCurrency($currencyObject),
        ], Response::HTTP_OK)->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    }
}
