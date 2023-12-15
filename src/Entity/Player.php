<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PlayerRepository::class)]
class Player
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $avatar = null;

    #[ORM\Column]
    private ?int $pv = null;

    #[ORM\Column]
    private ?int $pvMax = null;

    #[ORM\Column]
    private ?int $mana = null;

    #[ORM\Column]
    private ?int $manaMax = null;

    #[ORM\Column]
    private ?int $attack = null;

    #[ORM\Column]
    private ?int $defense = null;

    #[ORM\Column]
    private ?int $dodge = null;

    #[ORM\Column]
    private ?bool $isAvailable = null;

    #[ORM\Column]
    private ?bool $isDead = null;

    #[ORM\OneToMany(mappedBy: 'target', targetEntity: Game::class, fetch: 'EAGER')]
    private Collection $games;

    #[ORM\OneToMany(mappedBy: 'player', targetEntity: Attack::class, fetch: 'EAGER')]
    private Collection $attacks;

    #[ORM\OneToMany(mappedBy: 'player', targetEntity: Status::class, fetch: 'EAGER')]
    private Collection $status;

    #[ORM\OneToMany(mappedBy: 'player', targetEntity: Buff::class, fetch: 'EAGER')]
    private Collection $buffs;

    #[ORM\Column(length: 2000, nullable: true)]
    private ?string $avatarhover = null;

    public function __construct()
    {
        $this->games = new ArrayCollection();
        $this->attacks = new ArrayCollection();
        $this->status = new ArrayCollection();
        $this->buffs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getAvatar(): ?string
    {
        return $this->avatar;
    }

    public function setAvatar(?string $avatar): static
    {
        $this->avatar = $avatar;

        return $this;
    }

    public function getPv(): ?int
    {
        return $this->pv;
    }

    public function setPv(int $pv): static
    {
        $this->pv = $pv;

        return $this;
    }

    public function getPvMax(): ?int
    {
        return $this->pvMax;
    }

    public function setPvMax(int $pvMax): static
    {
        $this->pvMax = $pvMax;

        return $this;
    }

    public function getMana(): ?int
    {
        return $this->mana;
    }

    public function setMana(int $mana): static
    {
        $this->mana = $mana;

        return $this;
    }

    public function getManaMax(): ?int
    {
        return $this->manaMax;
    }

    public function setManaMax(int $manaMax): static
    {
        $this->manaMax = $manaMax;

        return $this;
    }

    public function getAttack(): ?int
    {
        return $this->attack;
    }

    public function setAttack(int $attack): static
    {
        $this->attack = $attack;

        return $this;
    }

    public function getDefense(): ?int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): static
    {
        $this->defense = $defense;

        return $this;
    }

    public function getDodge(): ?int
    {
        return $this->dodge;
    }

    public function setDodge(int $dodge): static
    {
        $this->dodge = $dodge;

        return $this;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function isIsAvailable(): ?bool
    {
        return $this->isAvailable;
    }

    public function setIsAvailable(bool $isAvailable): static
    {
        $this->isAvailable = $isAvailable;

        return $this;
    }

    public function isIsDead(): ?bool
    {
        return $this->isDead;
    }

    public function setIsDead(bool $isDead): static
    {
        $this->isDead = $isDead;

        return $this;
    }

    /**
     * @return Collection<int, Game>
     */
    public function getGames(): Collection
    {
        return $this->games;
    }

    public function addGame(Game $game): static
    {
        if (!$this->games->contains($game)) {
            $this->games->add($game);
            $game->setTarget($this);
        }

        return $this;
    }

    public function removeGame(Game $game): static
    {
        if ($this->games->removeElement($game)) {
            // set the owning side to null (unless already changed)
            if ($game->getTarget() === $this) {
                $game->setTarget(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Attack>
     */
    public function getAttacks(): Collection
    {
        return $this->attacks;
    }

    public function addAttack(Attack $attack): static
    {
        if (!$this->attacks->contains($attack)) {
            $this->attacks->add($attack);
            $attack->setPlayer($this);
        }

        return $this;
    }

    public function removeAttack(Attack $attack): static
    {
        if ($this->attacks->removeElement($attack)) {
            // set the owning side to null (unless already changed)
            if ($attack->getPlayer() === $this) {
                $attack->setPlayer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Status>
     */
    public function getStatus(): Collection
    {
        return $this->status;
    }

    public function addStatus(Status $status): static
    {
        if (!$this->status->contains($status)) {
            $this->status->add($status);
            $status->setPlayer($this);
        }

        return $this;
    }

    public function removeStatus(Status $status): static
    {
        if ($this->status->removeElement($status)) {
            // set the owning side to null (unless already changed)
            if ($status->getPlayer() === $this) {
                $status->setPlayer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Buff>
     */
    public function getBuffs(): Collection
    {
        return $this->buffs;
    }

    public function addBuff(Buff $buff): static
    {
        if (!$this->buffs->contains($buff)) {
            $this->buffs->add($buff);
            $buff->setPlayer($this);
        }

        return $this;
    }

    public function removeBuff(Buff $buff): static
    {
        if ($this->buffs->removeElement($buff)) {
            // set the owning side to null (unless already changed)
            if ($buff->getPlayer() === $this) {
                $buff->setPlayer(null);
            }
        }

        return $this;
    }

    public function getAvatarhover(): ?string
    {
        return $this->avatarhover;
    }

    public function setAvatarhover(?string $avatarhover): static
    {
        $this->avatarhover = $avatarhover;

        return $this;
    }
}
