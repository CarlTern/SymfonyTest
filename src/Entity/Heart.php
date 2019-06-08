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
}
