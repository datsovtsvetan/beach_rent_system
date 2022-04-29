<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\RentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=RentRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"company" : "exact"})
 */
class Rent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $rentedAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $rentedVip = false;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $employeeName;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $includeChairCover;

    /**
     * @ORM\ManyToOne(targetEntity=Beach::class, inversedBy="rents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $beach;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="rents")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRentedAt(): ?\DateTimeImmutable
    {
        return $this->rentedAt;
    }

    public function setRentRentedAt(\DateTimeImmutable $rentedAt): self
    {
        $this->rentedAt = $rentedAt;

        return $this;
    }

    public function getRentedVip(): ?bool
    {
        return $this->rentedVip;
    }

    public function setRentedVip(bool $rentedVip): self
    {
        $this->rentedVip = $rentedVip;

        return $this;
    }

    public function getEmployeeName(): ?string
    {
        return $this->employeeName;
    }

    public function setEmployeeName(string $employeeName): self
    {
        $this->employeeName = $employeeName;

        return $this;
    }

    public function getIncludeChairCover(): ?bool
    {
        return $this->includeChairCover;
    }

    public function setIncludeChairCover(?bool $includeChairCover): self
    {
        $this->includeChairCover = $includeChairCover;

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
