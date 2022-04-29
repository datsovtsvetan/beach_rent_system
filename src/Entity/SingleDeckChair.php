<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\SingleDeckChairRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=SingleDeckChairRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"company" : "exact"})
 */
class SingleDeckChair
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $xAxis;

    /**
     * @ORM\Column(type="integer")
     */
    private $yAxis;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVipRented = false;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $vipName;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isRented;

    /**
     * @ORM\Column(type="smallint")
     */
    private $rentCount;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imgUrl;

    /**
     * @ORM\ManyToOne(targetEntity=Beach::class, inversedBy="singleDeckChairs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $beach;

    /**
     * @ORM\OneToMany(targetEntity=Booking::class, mappedBy="singleDeckChair")
     */
    private $bookings;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="singleDeckChairs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;

    /**
     * @ORM\Column(type="integer")
     */
    private $rotation;


    public function __construct()
    {
        $this->bookings = new ArrayCollection();
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

    public function getXAxis(): ?int
    {
        return $this->xAxis;
    }

    public function setXAxis(int $xAxis): self
    {
        $this->xAxis = $xAxis;

        return $this;
    }

    public function getYAxis(): ?int
    {
        return $this->yAxis;
    }

    public function setYAxis(int $yAxis): self
    {
        $this->yAxis = $yAxis;

        return $this;
    }

    public function getIsVipRented(): ?bool
    {
        return $this->isVipRented;
    }

    public function setIsVipRented(bool $isVipRented): self
    {
        $this->isVipRented = $isVipRented;

        return $this;
    }

    public function getVipName(): ?string
    {
        return $this->vipName;
    }

    public function setVipName(?string $vipName): self
    {
        $this->vipName = $vipName;

        return $this;
    }

    public function getIsRented(): ?bool
    {
        return $this->isRented;
    }

    public function setIsRented(bool $isRented): self
    {
        $this->isRented = $isRented;

        return $this;
    }

    public function getRentCount(): ?int
    {
        return $this->rentCount;
    }

    public function setRentCount(int $rentCount): self
    {
        $this->rentCount = $rentCount;

        return $this;
    }

    public function getImgUrl(): ?string
    {
        return $this->imgUrl;
    }

    public function setImgUrl(string $imgUrl): self
    {
        $this->imgUrl = $imgUrl;

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
            $booking->setSingleDeckChair($this);
        }

        return $this;
    }

    public function removeBooking(Booking $booking): self
    {
        if ($this->bookings->removeElement($booking)) {
            // set the owning side to null (unless already changed)
            if ($booking->getSingleDeckChair() === $this) {
                $booking->setSingleDeckChair(null);
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

    public function getRotation(): ?int
    {
        return $this->rotation;
    }

    public function setRotation(int $rotation): self
    {
        $this->rotation = $rotation;

        return $this;
    }

}
