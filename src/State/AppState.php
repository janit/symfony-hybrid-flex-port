<?php

namespace App\State;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

class AppState implements \JsonSerializable {

    public $fetchMore = false;
    public $sortBy = false;
    public $selectedCountry = false;
    public $apartments = [];

    public function jsonSerialize() {

        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        return $serializer->serialize($this, 'json');

    }

    /**
     * @return string
     */
    public function getSortBy()
    {
        return $this->sortBy;
    }

    /**
     * @param string $sortBy
     */
    public function setSortBy($sortBy)
    {
        $this->sortBy = $sortBy;
    }

    /**
     * @return array
     */
    public function getApartments()
    {
        return $this->apartments;
    }

    /**
     * @param array $apartments
     */
    public function setApartments($apartments)
    {
        $this->apartments = $apartments;
    }

    /**
     * @return bool
     */
    public function isSelectedCountry()
    {
        return $this->selectedCountry;
    }

    /**
     * @param bool $selectedCountry
     */
    public function setSelectedCountry($selectedCountry)
    {
        $this->selectedCountry = $selectedCountry;
    }

    /**
     * @return bool
     */
    public function isFetchMore()
    {
        return $this->fetchMore;
    }

    /**
     * @param bool $fetchMore
     */
    public function setFetchMore($fetchMore)
    {
        $this->fetchMore = $fetchMore;
    }



}