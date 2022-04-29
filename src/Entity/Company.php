<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CompanyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=CompanyRepository::class)
 */
class Company
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @ORM\OneToMany(targetEntity=Beach::class, mappedBy="company", orphanRemoval=true)
     */
    private $beaches;

//    /**
//     * @ORM\OneToMany(targetEntity=RentEmployee::class, mappedBy="company", orphanRemoval=true)
//     */
//    private $rentEmployees;

//    /**
//     * @ORM\OneToMany(targetEntity=Controller::class, mappedBy="company", orphanRemoval=true)
//     */
//    private $controllers;
//
//    /**
//     * @ORM\OneToMany(targetEntity=Admin::class, mappedBy="company", orphanRemoval=true)
//     */
//    private $admins;

    /**
     * @ORM\OneToMany(targetEntity=BeachType::class, mappedBy="company", orphanRemoval=true)
     */
    private $beachTypes;

    /**
     * @ORM\OneToMany(targetEntity=ControlStat::class, mappedBy="company", orphanRemoval=true)
     */
    private $controlStats;

    /**
     * @ORM\OneToMany(targetEntity=Booking::class, mappedBy="company", orphanRemoval=true)
     */
    private $bookings;

    /**
     * @ORM\OneToMany(targetEntity=DeckChair::class, mappedBy="company", orphanRemoval=true)
     */
    private $deckChairs;

    /**
     * @ORM\OneToMany(targetEntity=Pair::class, mappedBy="company", orphanRemoval=true)
     */
    private $pairs;

    /**
     * @ORM\OneToMany(targetEntity=Pool::class, mappedBy="company", orphanRemoval=true)
     */
    private $pools;

    /**
     * @ORM\OneToMany(targetEntity=PoolType::class, mappedBy="company", orphanRemoval=true)
     */
    private $poolTypes;

    /**
     * @ORM\OneToMany(targetEntity=Rent::class, mappedBy="company", orphanRemoval=true)
     */
    private $rents;

    /**
     * @ORM\OneToMany(targetEntity=SingleDeckChair::class, mappedBy="company", orphanRemoval=true)
     */
    private $singleDeckChairs;

    /**
     * @ORM\OneToMany(targetEntity=Stat::class, mappedBy="company", orphanRemoval=true)
     */
    private $stats;

    /**
     * @ORM\OneToMany(targetEntity=Umbrella::class, mappedBy="company", orphanRemoval=true)
     */
    private $umbrellas;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="company", orphanRemoval=true)
     */
    private $users;

    public function __construct()
    {
        $this->beaches = new ArrayCollection();
        //$this->rentEmployees = new ArrayCollection();
        //$this->controllers = new ArrayCollection();
        //$this->admins = new ArrayCollection();
        $this->beachTypes = new ArrayCollection();
        $this->controlStats = new ArrayCollection();
        $this->bookings = new ArrayCollection();
        $this->deckChairs = new ArrayCollection();
        $this->pairs = new ArrayCollection();
        $this->pools = new ArrayCollection();
        $this->poolTypes = new ArrayCollection();
        $this->rents = new ArrayCollection();
        $this->singleDeckChairs = new ArrayCollection();
        $this->stats = new ArrayCollection();
        $this->umbrellas = new ArrayCollection();
        $this->users = new ArrayCollection();
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

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return Collection<int, Beach>
     */
    public function getBeaches(): Collection
    {
        return $this->beaches;
    }

    public function addBeach(Beach $beach): self
    {
        if (!$this->beaches->contains($beach)) {
            $this->beaches[] = $beach;
            $beach->setCompany($this);
        }

        return $this;
    }

    public function removeBeach(Beach $beach): self
    {
        if ($this->beaches->removeElement($beach)) {
            // set the owning side to null (unless already changed)
            if ($beach->getCompany() === $this) {
                $beach->setCompany(null);
            }
        }

        return $this;
    }

//    /**
//     * @return Collection<int, RentEmployee>
//     */
//    public function getRentEmployees(): Collection
//    {
//        return $this->rentEmployees;
//    }
//
//    public function addRentEmployee(RentEmployee $rentEmployee): self
//    {
//        if (!$this->rentEmployees->contains($rentEmployee)) {
//            $this->rentEmployees[] = $rentEmployee;
//            $rentEmployee->setCompany($this);
//        }
//
//        return $this;
//    }
//
//    public function removeRentEmployee(RentEmployee $rentEmployee): self
//    {
//        if ($this->rentEmployees->removeElement($rentEmployee)) {
//            // set the owning side to null (unless already changed)
//            if ($rentEmployee->getCompany() === $this) {
//                $rentEmployee->setCompany(null);
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
//            $controller->setCompany($this);
//        }
//
//        return $this;
//    }
//
//    public function removeController(Controller $controller): self
//    {
//        if ($this->controllers->removeElement($controller)) {
//            // set the owning side to null (unless already changed)
//            if ($controller->getCompany() === $this) {
//                $controller->setCompany(null);
//            }
//        }
//
//        return $this;
//    }

//    /**
//     * @return Collection<int, Admin>
//     */
//    public function getAdmins(): Collection
//    {
//        return $this->admins;
//    }
//
//    public function addAdmin(Admin $admin): self
//    {
//        if (!$this->admins->contains($admin)) {
//            $this->admins[] = $admin;
//            $admin->setCompany($this);
//        }
//
//        return $this;
//    }
//
//    public function removeAdmin(Admin $admin): self
//    {
//        if ($this->admins->removeElement($admin)) {
//            // set the owning side to null (unless already changed)
//            if ($admin->getCompany() === $this) {
//                $admin->setCompany(null);
//            }
//        }
//
//        return $this;
//    }

    /**
     * @return Collection<int, BeachType>
     */
    public function getBeachTypes(): Collection
    {
        return $this->beachTypes;
    }

    public function addBeachType(BeachType $beachType): self
    {
        if (!$this->beachTypes->contains($beachType)) {
            $this->beachTypes[] = $beachType;
            $beachType->setCompany($this);
        }

        return $this;
    }

    public function removeBeachType(BeachType $beachType): self
    {
        if ($this->beachTypes->removeElement($beachType)) {
            // set the owning side to null (unless already changed)
            if ($beachType->getCompany() === $this) {
                $beachType->setCompany(null);
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
            $controlStat->setCompany($this);
        }

        return $this;
    }

    public function removeControlStat(ControlStat $controlStat): self
    {
        if ($this->controlStats->removeElement($controlStat)) {
            // set the owning side to null (unless already changed)
            if ($controlStat->getCompany() === $this) {
                $controlStat->setCompany(null);
            }
        }

        return $this;
    }

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
            $booking->setCompany($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getCompany() === $this) {
                $booking->setCompany(null);
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
            $deckChair->setCompany($this);
        }

        return $this;
    }

    public function removeDeckChair(DeckChair $deckChair): self
    {
        if ($this->deckChairs->removeElement($deckChair)) {
            // set the owning side to null (unless already changed)
            if ($deckChair->getCompany() === $this) {
                $deckChair->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Pair>
     */
    public function getPairs(): Collection
    {
        return $this->pairs;
    }

    public function addPair(Pair $pair): self
    {
        if (!$this->pairs->contains($pair)) {
            $this->pairs[] = $pair;
            $pair->setCompany($this);
        }

        return $this;
    }

    public function removePair(Pair $pair): self
    {
        if ($this->pairs->removeElement($pair)) {
            // set the owning side to null (unless already changed)
            if ($pair->getCompany() === $this) {
                $pair->setCompany(null);
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
            $pool->setCompany($this);
        }

        return $this;
    }

    public function removePool(Pool $pool): self
    {
        if ($this->pools->removeElement($pool)) {
            // set the owning side to null (unless already changed)
            if ($pool->getCompany() === $this) {
                $pool->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PoolType>
     */
    public function getPoolTypes(): Collection
    {
        return $this->poolTypes;
    }

    public function addPoolType(PoolType $poolType): self
    {
        if (!$this->poolTypes->contains($poolType)) {
            $this->poolTypes[] = $poolType;
            $poolType->setCompany($this);
        }

        return $this;
    }

    public function removePoolType(PoolType $poolType): self
    {
        if ($this->poolTypes->removeElement($poolType)) {
            // set the owning side to null (unless already changed)
            if ($poolType->getCompany() === $this) {
                $poolType->setCompany(null);
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
            $rent->setCompany($this);
        }

        return $this;
    }

    public function removeRent(Rent $rent): self
    {
        if ($this->rents->removeElement($rent)) {
            // set the owning side to null (unless already changed)
            if ($rent->getCompany() === $this) {
                $rent->setCompany(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SingleDeckChair>
     */
    public function getSingleDeckChairs(): Collection
    {
        return $this->singleDeckChairs;
    }

    public function addSingleDeckChair(SingleDeckChair $singleDeckChair): self
    {
        if (!$this->singleDeckChairs->contains($singleDeckChair)) {
            $this->singleDeckChairs[] = $singleDeckChair;
            $singleDeckChair->setCompany($this);
        }

        return $this;
    }

    public function removeSingleDeckChair(SingleDeckChair $singleDeckChair): self
    {
        if ($this->singleDeckChairs->removeElement($singleDeckChair)) {
            // set the owning side to null (unless already changed)
            if ($singleDeckChair->getCompany() === $this) {
                $singleDeckChair->setCompany(null);
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
            $stat->setCompany($this);
        }

        return $this;
    }

    public function removeStat(Stat $stat): self
    {
        if ($this->stats->removeElement($stat)) {
            // set the owning side to null (unless already changed)
            if ($stat->getCompany() === $this) {
                $stat->setCompany(null);
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
            $umbrella->setCompany($this);
        }

        return $this;
    }

    public function removeUmbrella(Umbrella $umbrella): self
    {
        if ($this->umbrellas->removeElement($umbrella)) {
            // set the owning side to null (unless already changed)
            if ($umbrella->getCompany() === $this) {
                $umbrella->setCompany(null);
            }
        }

        return $this;
    }

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
            $user->setCompany($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getCompany() === $this) {
                $user->setCompany(null);
            }
        }

        return $this;
    }

}
