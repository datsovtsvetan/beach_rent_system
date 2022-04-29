<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\RangeFilter;
use App\Repository\StatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=StatRepository::class)
 * @ApiFilter(RangeFilter::class, properties={"rentedCount"})
 * @ApiFilter(SearchFilter::class, properties={"company" : "exact"})
 */
// For RangeFilter .. (two dots) is delimiter between lowest and highest range values
class Stat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateTime;

    /**
     * @ORM\Column(type="integer")
     */
    private $rentedCount;

    /**
     * @ORM\Column(type="integer")
     */
    private $releasedByControllerCount;

    /**
     * @ORM\ManyToOne(targetEntity=Beach::class, inversedBy="stats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $beach;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="stats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateTime(): ?\DateTimeInterface
    {
        return $this->dateTime;
    }

    public function setDateTime(\DateTimeInterface $DateTime): self
    {
        $this->dateTime = $DateTime;

        return $this;
    }

    public function getRentedCount(): ?int
    {
        return $this->rentedCount;
    }

    public function setRentedCount(int $rentedCount): self
    {
        $this->rentedCount = $rentedCount;

        return $this;
    }

    public function getReleasedByControllerCount(): ?int
    {
        return $this->releasedByControllerCount;
    }

    public function setReleasedByControllerCount(int $releasedByControllerCount): self
    {
        $this->releasedByControllerCount = $releasedByControllerCount;

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
