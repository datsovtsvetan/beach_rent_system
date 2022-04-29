<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\PoolRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=PoolRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"company" : "exact"})
 */
class Pool
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $xAxis;

    /**
     * @ORM\Column(type="integer")
     */
    private $yAxis;

    /**
     * @ORM\ManyToOne(targetEntity=PoolType::class, inversedBy="pools")
     * @ORM\JoinColumn(nullable=false)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Beach::class, inversedBy="pools")
     * @ORM\JoinColumn(nullable=false)
     */
    private $beach;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="pools")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;



    public function getId(): ?int
    {
        return $this->id;
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

    public function getType(): ?PoolType
    {
        return $this->type;
    }

    public function setType(?PoolType $type): self
    {
        $this->type = $type;

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
