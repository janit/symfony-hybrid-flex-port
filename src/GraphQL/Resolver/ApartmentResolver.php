<?php

namespace App\GraphQL\Resolver;

use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Resolver\ResolverInterface;

class ApartmentResolver implements ResolverInterface {

    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function resolve($input)
    {
        $args = $input->getRawArguments();

        $apartment = $this->em->getRepository('App:Apartment')->find($args['id']);

        return [
            'id' => $apartment->getId(),
            'street_address' => $apartment->getStreetaddress(),
            'country' => $apartment->getCountry(),
            'city' => $apartment->getCity(),
            'zipcode' => $apartment->getZipcode(),
            'build_year' => $apartment->getBuildyear(),
            'size' => $apartment->getSize()
        ];

    }

    public function addSolution($name, callable $solutionFunc, array $solutionFuncArgs = [], array $options = [])
    {
        // TODO: Implement addSolution() method.
    }

    public function getSolution($name)
    {
        // TODO: Implement getSolution() method.
    }

    public function getSolutions()
    {
        // TODO: Implement getSolutions() method.
    }

    public function getSolutionOptions($name)
    {
        // TODO: Implement getSolutionOptions() method.
    }


}