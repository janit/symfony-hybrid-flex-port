<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Apartment
 *
 * @ORM\Table(name="apartment")
 * @ORM\Entity(repositoryClass="App\Repository\ApartmentRepository")
 */
class Apartment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="streetaddress", type="string", length=255)
     */
    private $streetaddress;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=255)
     */
    private $zipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @var int
     *
     * @ORM\Column(name="buildyear", type="integer")
     */
    private $buildyear;

    /**
     * @var int
     *
     * @ORM\Column(name="size", type="integer")
     */
    private $size;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set streetaddress
     *
     * @param string $streetaddress
     *
     * @return Apartment
     */
    public function setStreetaddress($streetaddress)
    {
        $this->streetaddress = $streetaddress;

        return $this;
    }

    /**
     * Get streetaddress
     *
     * @return string
     */
    public function getStreetaddress()
    {
        return $this->streetaddress;
    }

    /**
     * Set city
     *
     * @param string $city
     *
     * @return Apartment
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     *
     * @return Apartment
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Apartment
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set buildyear
     *
     * @param integer $buildyear
     *
     * @return Apartment
     */
    public function setBuildyear($buildyear)
    {
        $this->buildyear = $buildyear;

        return $this;
    }

    /**
     * Get buildyear
     *
     * @return int
     */
    public function getBuildyear()
    {
        return $this->buildyear;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return Apartment
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }
}

