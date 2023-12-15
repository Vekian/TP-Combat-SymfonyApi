<?php

namespace App\Entity;

use App\Repository\AttackRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AttackRepository::class)]
class Attack
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 1000)]
    private ?string $name = null;

    #[ORM\Column(length: 3000)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'attacks')]
    private ?Player $player = null;

    #[ORM\Column(length: 255)]
    private ?string $idName = null;

    #[ORM\Column(length: 2000)]
    private ?string $powerType = null;

    #[ORM\Column]
    private ?int $powerValue = null;

    #[ORM\Column(length: 2000)]
    private ?string $costType = null;

    #[ORM\Column]
    private ?int $costValue = null;

    #[ORM\Column(length: 2000, nullable: true)]
    private ?string $effectType = null;

    #[ORM\Column(nullable: true)]
    private ?int $effectValue = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): static
    {
        $this->player = $player;

        return $this;
    }

    public function getIdName(): ?string
    {
        return $this->idName;
    }

    public function setIdName(string $idName): static
    {
        $this->idName = $idName;

        return $this;
    }

    public function getPowerType(): ?string
    {
        return $this->powerType;
    }

    public function setPowerType(string $powerType): static
    {
        $this->powerType = $powerType;

        return $this;
    }

    public function getPowerValue(): ?int
    {
        return $this->powerValue;
    }

    public function setPowerValue(int $powerValue): static
    {
        $this->powerValue = $powerValue;

        return $this;
    }

    public function getCostType(): ?string
    {
        return $this->costType;
    }

    public function setCostType(string $costType): static
    {
        $this->costType = $costType;

        return $this;
    }

    public function getCostValue(): ?int
    {
        return $this->costValue;
    }

    public function setCostValue(int $costValue): static
    {
        $this->costValue = $costValue;

        return $this;
    }

    public function getEffectType(): ?string
    {
        return $this->effectType;
    }

    public function setEffectType(?string $effectType): static
    {
        $this->effectType = $effectType;

        return $this;
    }

    public function getEffectValue(): ?int
    {
        return $this->effectValue;
    }

    public function setEffectValue(?int $effectValue): static
    {
        $this->effectValue = $effectValue;

        return $this;
    }
}
