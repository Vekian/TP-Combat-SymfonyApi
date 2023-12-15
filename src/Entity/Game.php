<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $turn = null;

    #[ORM\Column]
    private ?int $numberPlayersPlayed = null;

    #[ORM\Column]
    private ?int $numberPlayersDead = null;

    #[ORM\ManyToOne(inversedBy: 'games')]
    private ?Player $target = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTurn(): ?int
    {
        return $this->turn;
    }

    public function setTurn(int $turn): static
    {
        $this->turn = $turn;

        return $this;
    }

    public function getNumberPlayersPlayed(): ?int
    {
        return $this->numberPlayersPlayed;
    }

    public function setNumberPlayersPlayed(int $numberPlayersPlayed): static
    {
        $this->numberPlayersPlayed = $numberPlayersPlayed;

        return $this;
    }

    public function getNumberPlayersDead(): ?int
    {
        return $this->numberPlayersDead;
    }

    public function setNumberPlayersDead(int $numberPlayersDead): static
    {
        $this->numberPlayersDead = $numberPlayersDead;

        return $this;
    }

    public function getTarget(): ?Player
    {
        return $this->target;
    }

    public function setTarget(?Player $target): static
    {
        $this->target = $target;

        return $this;
    }
}
