<?php

namespace App\Entity;

use App\Repository\SensorstateRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SensorstateRepository::class)
 */
class Sensorstate
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
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $state;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datetimeAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getDatetimeAt(): ?\DateTimeInterface
    {
        return $this->datetimeAt;
    }

    public function setDatetimeAt(\DateTimeInterface $datetimeAt): self
    {
        $this->datetimeAt = $datetimeAt;

        return $this;
    }
}
