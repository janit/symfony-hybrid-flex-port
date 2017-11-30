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


}