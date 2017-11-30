<?php

namespace App\GraphQL\Resolver;

use Doctrine\ORM\EntityManager;
use Overblog\GraphQLBundle\Resolver\ResolverInterface;

class ApartmentResolver implements ResolverInterface {

    private Entitymanager $em;


    public function resolve($input)
    {

        var_dump(get_class($this->em));
/*

        $args = $input->getRawArguments();

        $attendee = $this->em->getRepository('AppBundle:Attendee')->find($args['id']);

        return [
            'id' => $attendee->getId(),
            'name' => $attendee->getName(),
            'country' => $attendee->getCountry(),
            'bio' => $attendee->getBio()
        ];

*/

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