<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\BooleanFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\BeachRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={"get" ={"path"="/beaches/{id}"},
 *      "put" = {}
 *     },
 *     normalizationContext={
 *     "groups"={"beach:read"}
 *     },
 *     denormalizationContext={
 *     "groups"={"beach:write"}
 *     },
 *     shortName = "Beach"
 * )
 *
 * @ORM\Entity(repositoryClass=BeachRepository::class)
 *@ApiFilter(BooleanFilter::class, properties={"isActive"})
 * @ApiFilter(SearchFilter::class, properties={"name" : "exact", "company.id" : "exact", "users.id" : "exact" })
 */
class Beach
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Groups({"beach:read", "beach:write"})
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     * @Groups({"beach:read", "beach:write"})
     */
    private $isActive;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="beaches")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;

    /**
     * @ORM\OneToMany(targetEntity=Pair::class, mappedBy="beach", orphanRemoval=true)
     * @Groups({"beach:read"})
     */
    private $pairs;

    /**
     * @ORM\OneToMany(targetEntity=SingleDeckChair::class, mappedBy="beach", orphanRemoval=true)
     */
    private $singleDeckChairs;

    /**
     * @ORM\OneToMany(targetEntity=Umbrella::class, mappedBy="beach", orphanRemoval=true)
     */
    private $umbrellas;

    /**
     * @ORM\OneToMany(targetEntity=Stat::class, mappedBy="beach", orphanRemoval=true)
     */
    private $stats;

    /**
     * @ORM\OneToMany(targetEntity=Rent::class, mappedBy="beach", orphanRemoval=true)
     */
    private $rents;

    /**
     * @ORM\OneToMany(targetEntity=Pool::class, mappedBy="beach", orphanRemoval=true)
     */
    private $pools;

    /**
     * @ORM\OneToMany(targetEntity=ControlStat::class, mappedBy="beach", orphanRemoval=true)
     */
    private $controlStats;

//    /**
//     * @ORM\OneToMany(targetEntity=Controller::class, mappedBy="beach", orphanRemoval=true)
//     */
//    private $controllers;

    /**
     * @ORM\OneToMany(targetEntity=Booking::class, mappedBy="beach", orphanRemoval=true)
     */
    private $bookings;

    /**
     * @ORM\OneToMany(targetEntity=DeckChair::class, mappedBy="beach", orphanRemoval=true)
     */
    private $deckChairs;

//    /**
//     * @ORM\OneToMany(targetEntity=Controller2Beach::class, mappedBy="beach", orphanRemoval=true)
//     */
//    private $controller2Beaches;

//    /**
//     * @ORM\OneToMany(targetEntity=RentEmployee2Beach::class, mappedBy="beach", orphanRemoval=true)
//     */
//    private $rentEmployee2Beaches;

//    /**
//     * @ORM\ManyToMany(targetEntity=Controller::class, mappedBy="beaches")
//     */
//    private $controllers;

    /**
     * @ORM\ManyToMany(targetEntity=User::class, mappedBy="beaches")
     */
    private $users;

    // required properties may be added to constructor, but the argument name must be the same as the property name
    // setter can be deleted, so make the record immutable
    // example public function __construct(string $name = null)
    // the = null is to help serializer succeed and then validation will throw error if the property is NOT NULL in DB
    public function __construct(string $name = null)
    {
        $this->name = $name;
        $this->pairs = new ArrayCollection();
        $this->singleDeckChairs = new ArrayCollection();
        $this->umbrellas = new ArrayCollection();
        $this->stats = new ArrayCollection();
        $this->rents = new ArrayCollection();
        $this->pools = new ArrayCollection();
        $this->controlStats = new ArrayCollection();
        //$this->controllers = new ArrayCollection();
        $this->bookings = new ArrayCollection();
        $this->deckChairs = new ArrayCollection();
        //$this->controller2Beaches = new ArrayCollection();
        //$this->rentEmployee2Beaches = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    // example @SerializedName("exampleName") in get operation
    public function getName(): ?string
    {
        return $this->name;
    }

     //example @Groups({"beach:write"})  if no property name associated with the setter
     //example @SerializedName("exampleName") in post or put/patch operation
     //public function doSomethingBeforeSetting$this->name(string $name): self
     // { $this->name = someFunction($name)}
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getCompany(): ?company
    {
        return $this->company;
    }

    public function setCompany(?company $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return Collection<int, Pair>
     */
    public function getPair(): Collection
    {
        return $this->pair;
    }

    public function addPair(pair $pair): self
    {
        if (!$this->pair->contains($pair)) {
            $this->pair[] = $pair;
            $pair->setBeach($this);
        }

        return $this;
    }

    public function removePair(pair $pair): self
    {
        if ($this->pair->removeElement($pair)) {
            // set the owning side to null (unless already changed)
            if ($pair->getBeach() === $this) {
                $pair->setBeach(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SingleDeckChair>
     */
    public function getSingleDeckChair(): Collection
    {
        return $this->singleDeckChair;
    }

    public function addSingleDeckChair(SingleDeckChair $singleDeckChair): self
    {
        if (!$this->singleDeckChair->contains($singleDeckChair)) {
            $this->singleDeckChair[] = $singleDeckChair;
            $singleDeckChair->setBeach($this);
        }

        return $this;
    }

    public function removeSingleDeckChair(SingleDeckChair $singleDeckChair): self
    {
        if ($this->singleDeckChair->removeElement($singleDeckChair)) {
            // set the owning side to null (unless already changed)
            if ($singleDeckChair->getBeach() === $this) {
                $singleDeckChair->setBeach(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Umbrella>
     */
    public function getUmbrellas(): Collection
    {
        return $this->umbrellas;
    }

    public function addUmbrella(Umbrella $umbrella): self
    {
        if (!$this->umbrellas->contains($umbrella)) {
            $this->umbrellas[] = $umbrella;
            $umbrella->setBeach($this);
        }

        return $this;
    }

    public function removeUmbrella(Umbrella $umbrella): self
    {
        if ($this->umbrellas->removeElement($umbrella)) {
            // set the owning side to null (unless already changed)
            if ($umbrella->getBeach() === $this) {
                $umbrella->setBeach(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Stat>
     */
    public function getStats(): Collection
    {
        return $this->stats;
    }

    public function addStat(Stat $stat): self
    {
        if (!$this->stats->contains($stat)) {
            $this->stats[] = $stat;
            $stat->setBeach($this);
        }

        return $this;
    }

    public function removeStat(Stat $stat): self
    {
        if ($this->stats->removeElement($stat)) {
            // set the owning side to null (unless already changed)
            if ($stat->getBeach() === $this) {
                $stat->setBeach(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Rent>
     */
    public function getRents(): Collection
    {
        return $this->rents;
    }

    public function addRent(Rent $rent): self
    {
        if (!$this->rents->contains($rent)) {
            $this->rents[] = $rent;
            $rent->setBeach($this);
        }

        return $this;
    }

    public function removeRent(Rent $rent): self
    {
        if ($this->rents->removeElement($rent)) {
            // set the owning side to null (unless already changed)
            if ($rent->getBeach() === $this) {
                $rent->setBeach(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Pool>
     */
    public function getPools(): Collection
    {
        return $this->pools;
    }

    public function addPool(Pool $pool): self
    {
        if (!$this->pools->contains($pool)) {
            $this->pools[] = $pool;
            $pool->setBeach($this);
        }

        return $this;
    }

    public function removePool(Pool $pool): self
    {
        if ($this->pools->removeElement($pool)) {
            // set the owning side to null (unless already changed)
            if ($pool->getBeach() === $this) {
                $pool->setBeach(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ControlStat>
     */
    public function getControlStats(): Collection
    {
        return $this->controlStats;
    }

    public function addControlStat(ControlStat $controlStat): self
    {
        if (!$this->controlStats->contains($controlStat)) {
            $this->controlStats[] = $controlStat;
            $controlStat->setBeach($this);
        }

        return $this;
    }

    public function removeControlStat(ControlStat $controlStat): self
    {
        if ($this->controlStats->removeElement($controlStat)) {
            // set the owning side to null (unless already changed)
            if ($controlStat->getBeach() === $this) {
                $controlStat->setBeach(null);
            }
        }

        return $this;
    }

//    /**
//     * @return Collection<int, Controller>
//     */
//    public function getControllers(): Collection
//    {
//        return $this->controllers;
//    }
//
//    public function addController(Controller $controller): self
//    {
//        if (!$this->controllers->contains($controller)) {
//            $this->controllers[] = $controller;
//            $controller->setBeach($this);
//        }
//
//        return $this;
//    }
//
//    public function removeController(Controller $controller): self
//    {
//        if ($this->controllers->removeElement($controller)) {
//            // set the owning side to null (unless already changed)
//            if ($controller->getBeach() === $this) {
//                $controller->setBeach(null);
//            }
//        }
//
//        return $this;
//    }

    /**
     * @return Collection<int, Booking>
     */
    public function getBookings(): Collection
    {
        return $this->bookings;
    }

    public function addBooking(Booking $booking): self
    {
        if (!$this->bookings->contains($booking)) {
            $this->bookings[] = $booking;
            $booking->setBeach($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getBeach() === $this) {
                $booking->setBeach(null);
            }
        }

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
            $deckChair->setBeach($this);
        }

        return $this;
    }

    public function removeDeckChair(DeckChair $deckChair): self
    {
        if ($this->deckChairs->removeElement($deckChair)) {
            // set the owning side to null (unless already changed)
            if ($deckChair->getBeach() === $this) {
                $deckChair->setBeach(null);
            }
        }

        return $this;
    }

//    /**
//     * @return Collection<int, Controller2Beach>
//     */
//    public function getController2Beaches(): Collection
//    {
//        return $this->controller2Beaches;
//    }
//
//    public function addController2Beach(Controller2Beach $controller2Beach): self
//    {
//        if (!$this->controller2Beaches->contains($controller2Beach)) {
//            $this->controller2Beaches[] = $controller2Beach;
//            $controller2Beach->setBeach($this);
//        }
//
//        return $this;
//    }
//
//    public function removeController2Beach(Controller2Beach $controller2Beach): self
//    {
//        if ($this->controller2Beaches->removeElement($controller2Beach)) {
//            // set the owning side to null (unless already changed)
//            if ($controller2Beach->getBeach() === $this) {
//                $controller2Beach->setBeach(null);
//            }
//        }
//
//        return $this;
//    }

//    /**
//     * @return Collection<int, RentEmployee2Beach>
//     */
//    public function getRentEmployee2Beaches(): Collection
//    {
//        return $this->rentEmployee2Beaches;
//    }
//
//    public function addRentEmployee2Beach(RentEmployee2Beach $rentEmployee2Beach): self
//    {
//        if (!$this->rentEmployee2Beaches->contains($rentEmployee2Beach)) {
//            $this->rentEmployee2Beaches[] = $rentEmployee2Beach;
//            $rentEmployee2Beach->setBeach($this);
//        }
//
//        return $this;
//    }
//
//    public function removeRentEmployee2Beach(RentEmployee2Beach $rentEmployee2Beach): self
//    {
//        if ($this->rentEmployee2Beaches->removeElement($rentEmployee2Beach)) {
//            // set the owning side to null (unless already changed)
//            if ($rentEmployee2Beach->getBeach() === $this) {
//                $rentEmployee2Beach->setBeach(null);
//            }
//        }
//
//        return $this;
//    }

//    /**
//     * @return Collection<int, Controller>
//     */
//    public function getControllers(): Collection
//    {
//        return $this->controllers;
//    }
//
//    public function addController(Controller $controller): self
//    {
//        if (!$this->controllers->contains($controller)) {
//            $this->controllers[] = $controller;
//            $controller->addBeach($this);
//        }
//
//        return $this;
//    }
//
//    public function removeController(Controller $controller): self
//    {
//        if ($this->controllers->removeElement($controller)) {
//            $controller->removeBeach($this);
//        }
//
//        return $this;
//    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->addBeach($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            $user->removeBeach($this);
        }

        return $this;
    }

}
