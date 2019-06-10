<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HeartRepository")
 */
class Heart
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $heartr;

    /**
     * @ORM\Column(type="boolean")
     */
    private $heartStatus;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getHeartr(): ?int
    {
        return $this->heartr;
    }

    public function setHeartr(int $heartr): self
    {
        $this->heartr = $heartr;

        return $this;
    }

    public function getHeartStatus(): ?bool
    {
        return $this->heartStatus;
    }

    public function setHeartStatus(bool $heartStatus): self
    {
        $this->heartStatus = $heartStatus;

        return $this;
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
}
