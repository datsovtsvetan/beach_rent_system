<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BookingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=BookingRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"company" : "exact"})
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $client;

    /**
     * @ORM\ManyToOne(targetEntity=DeckChair::class, inversedBy="bookings")
     */
    private $deckChair;

    /**
     * @ORM\ManyToOne(targetEntity=SingleDeckChair::class, inversedBy="bookings")
     */
    private $singleDeckChair;

    /**
     * @ORM\ManyToOne(targetEntity=Beach::class, inversedBy="bookings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $beach;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="bookings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getClient(): ?string
    {
        return $this->client;
    }

    public function setClient(string $client): self
    {
        $this->client = $client;

        return $this;
    }

    public function getDeckChair(): ?DeckChair
    {
        return $this->deckChair;
    }

    public function setDeckChair(?DeckChair $deckChair): self
    {
        $this->deckChair = $deckChair;

        return $this;
    }

    public function getSingleDeckChair(): ?SingleDeckChair
    {
        return $this->singleDeckChair;
    }

    public function setSingleDeckChair(?SingleDeckChair $singleDeckChair): self
    {
        $this->singleDeckChair = $singleDeckChair;

        return $this;
    }

    public function getBeach(): ?Beach
    {
        return $this->beach;
    }

    public function setBeach(?Beach $beach): self
    {
        $this->beach = $beach;

        return $this;
    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }
    
}
