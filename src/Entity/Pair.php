<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\PairRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=PairRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"company" : "exact"})
 */
class Pair
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=Beach::class, inversedBy="pairs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $beach;

    /**
     * @ORM\OneToMany(targetEntity=DeckChair::class, mappedBy="pair", orphanRemoval=true)
     */
    private $deckChairs;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="pairs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;


    public function __construct()
    {
        $this->deckChairs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    /**
     * @return Collection<int, DeckChair>
     */
    public function getDeckChairs(): Collection
    {
        return $this->deckChairs;
    }

    public function addDeckChair(DeckChair $deckChair): self
    {
        if (!$this->deckChairs->contains($deckChair)) {
            $this->deckChairs[] = $deckChair;
            $deckChair->setPair($this);
        }

        return $this;
    }

    public function removeDeckChair(DeckChair $deckChair): self
    {
        if ($this->deckChairs->removeElement($deckChair)) {
            // set the owning side to null (unless already changed)
            if ($deckChair->getPair() === $this) {
                $deckChair->setPair(null);
            }
        }

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
