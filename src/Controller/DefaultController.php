<?php

namespace App\Controller;

use App\State\AppState;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Cache\Simple\FilesystemCache;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request )
    {
        $appState = new AppState();

        $em = $this->get('doctrine.orm.default_entity_manager');
        $apartments = $em->getRepository('App:Apartment')->findByLimit(3);

        $appState->setApartments($apartments);
        $appState->setFetchMore(true);

        return $this->render('default/index.html.twig', [
            'appstate' => $appState,
            'appstate_serialized' => $appState->jsonSerialize()
        ]);
    }


    /**
     * @Route("/limit/{limit}", name="limited")
     */
    public function limitedAction(Request $request, int $limit = 3 )
    {

        $appState = new AppState();

        $em = $this->get('doctrine.orm.default_entity_manager');
        $apartments = $em->getRepository('App:Apartment')->findByLimit($limit);

        $appState->setApartments($apartments);

        return $this->render('default/index.html.twig', [
            'appstate' => $appState,
            'appstate_serialized' => $appState->jsonSerialize()
        ]);
    }

    /**
     * @Route("/country/{country}", name="filtered")
     */
    public function filteredAction(Request $request, $country=false )
    {

        $appState = new AppState();

        $em = $this->get('doctrine.orm.default_entity_manager');
        $apartments = $em->getRepository('App:Apartment')->findByCountry($country);

        $appState->setSelectedCountry($country);
        $appState->setSortBy($country);
        $appState->setApartments($apartments);

        return $this->render('default/index.html.twig', [
            'appstate' => $appState,
            'appstate_serialized' => $appState->jsonSerialize()
        ]);
    }


    /**
     * @Route("/api", name="api")
     */
    public function apiApartmentsAction(Request $request)
    {

        $appState = new AppState();

        $cache = new FilesystemCache();
        $cacheKey = 'apartments';

        if (!$cache->has($cacheKey)) {

            $em = $this->get('doctrine.orm.default_entity_manager');
            $apartments = $em->getRepository('App:Apartment')->findByLimit(10);

            $cache->set($cacheKey, $apartments, 3600);
        }

        $apartments = $cache->get($cacheKey);

        $appState->setApartments($apartments);

        $response = new JsonResponse();

        $response->setContent($appState->jsonSerialize());

        return $response;

    }


}
