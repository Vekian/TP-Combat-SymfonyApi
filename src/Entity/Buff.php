<?php

namespace App\Entity;

use App\Repository\BuffRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BuffRepository::class)]
class Buff
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $atkValue = null;

    #[ORM\Column]
    private ?int $atkTurns = null;

    #[ORM\Column]
    private ?int $defValue = null;

    #[ORM\Column]
    private ?int $defTurns = null;

    #[ORM\Column]
    private ?int $dodgeValue = null;

    #[ORM\Column]
    private ?int $dodgeTurns = null;

    #[ORM\ManyToOne(inversedBy: 'buffs')]
    private ?Monster $monster = null;

    #[ORM\ManyToOne(inversedBy: 'buffs')]
    private ?Player $player = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAtkValue(): ?int
    {
        return $this->atkValue;
    }

    public function setAtkValue(int $atkValue): static
    {
        $this->atkValue = $atkValue;

        return $this;
    }

    public function getAtkTurns(): ?int
    {
        return $this->atkTurns;
    }

    public function setAtkTurns(int $atkTurns): static
    {
        $this->atkTurns = $atkTurns;

        return $this;
    }

    public function getDefValue(): ?int
    {
        return $this->defValue;
    }

    public function setDefValue(int $defValue): static
    {
        $this->defValue = $defValue;

        return $this;
    }

    public function getDefTurns(): ?int
    {
        return $this->defTurns;
    }

    public function setDefTurns(int $defTurns): static
    {
        $this->defTurns = $defTurns;

        return $this;
    }

    public function getDodgeValue(): ?int
    {
        return $this->dodgeValue;
    }

    public function setDodgeValue(int $dodgeValue): static
    {
        $this->dodgeValue = $dodgeValue;

        return $this;
    }

    public function getDodgeTurns(): ?int
    {
        return $this->dodgeTurns;
    }

    public function setDodgeTurns(int $dodgeTurns): static
    {
        $this->dodgeTurns = $dodgeTurns;

        return $this;
    }

    public function getMonster(): ?Monster
    {
        return $this->monster;
    }

    public function setMonster(?Monster $monster): static
    {
        $this->monster = $monster;

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
}
