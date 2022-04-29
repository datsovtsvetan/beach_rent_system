<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\ControlStatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource
 * @ORM\Entity(repositoryClass=ControlStatRepository::class)
 * @ApiFilter(SearchFilter::class, properties={"company" : "exact"})
 */
class ControlStat
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
    private $controlledAt;

    /**
     * @ORM\Column(type="boolean")
     */
    private $verifiedByRentEmployee;

    /**
     * @ORM\ManyToOne(targetEntity=Beach::class, inversedBy="controlStats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $beach;

//    /**
//     * @ORM\OneToMany(targetEntity=ControlStat2Controller::class, mappedBy="controlStat", orphanRemoval=true)
//     */
//    private $controlStat2Controllers;

    /**
     * @ORM\ManyToOne(targetEntity=Company::class, inversedBy="controlStats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $company;

//    /**
//     * @ORM\ManyToOne(targetEntity=Controller::class, inversedBy="controlStats")
//     * @ORM\JoinColumn(nullable=false)
//     */
//    private $controller;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="stats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    public function __construct()
    {
        //$this->controlStat2Controllers = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getControlledAt(): ?\DateTimeImmutable
    {
        return $this->controlledAt;
    }

    public function setControlledAt(\DateTimeImmutable $controlledAt): self
    {
        $this->controlledAt = $controlledAt;

        return $this;
    }

    public function getVerifiedByRentEmployee(): ?bool
    {
        return $this->verifiedByRentEmployee;
    }

    public function setVerifiedByRentEmployee(bool $verifiedByRentEmployee): self
    {
        $this->verifiedByRentEmployee = $verifiedByRentEmployee;

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

//    /**
//     * @return Collection<int, ControlStat2Controller>
//     */
//    public function getControlStat2Controllers(): Collection
//    {
//        return $this->controlStat2Controllers;
//    }
//
//    public function addControlStat2Controller(ControlStat2Controller $controlStat2Controller): self
//    {
//        if (!$this->controlStat2Controllers->contains($controlStat2Controller)) {
//            $this->controlStat2Controllers[] = $controlStat2Controller;
//            $controlStat2Controller->setControlStat($this);
//        }
//
//        return $this;
//    }
//
//    public function removeControlStat2Controller(ControlStat2Controller $controlStat2Controller): self
//    {
//        if ($this->controlStat2Controllers->removeElement($controlStat2Controller)) {
//            // set the owning side to null (unless already changed)
//            if ($controlStat2Controller->getControlStat() === $this) {
//                $controlStat2Controller->setControlStat(null);
//            }
//        }
//
//        return $this;
//    }

    public function getCompany(): ?Company
    {
        return $this->company;
    }

    public function setCompany(?Company $company): self
    {
        $this->company = $company;

        return $this;
    }

//    public function getController(): ?Controller
//    {
//        return $this->controller;
//    }
//
//    public function setController(?Controller $controller): self
//    {
//        $this->controller = $controller;
//
//        return $this;
//    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
    
}
