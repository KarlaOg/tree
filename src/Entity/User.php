<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Family", inversedBy="users")
     */
    private $family;

    public function __construct()
    {
        $this->family = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * @return Collection|Family[]
     */
    public function getFamily(): Collection
    {
        return $this->family;
    }

    public function addFamily(Family $family): self
    {
        if (!$this->family->contains($family)) {
            $this->family[] = $family;
        }

        return $this;
    }

    public function removeFamily(Family $family): self
    {
        if ($this->family->contains($family)) {
            $this->family->removeElement($family);
        }

        return $this;
    }
}
