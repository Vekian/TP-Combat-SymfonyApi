<?php

namespace App\Entity;

use App\Repository\MonsterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonsterRepository::class)]
class Monster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $pv = null;

    #[ORM\Column]
    private ?int $pvMax = null;

    #[ORM\Column]
    private ?int $attack = null;

    #[ORM\Column]
    private ?int $defense = null;

    #[ORM\Column]
    private ?int $dodge = null;

    #[ORM\Column(length: 255)]
    private ?string $bgType = null;

    #[ORM\Column(length: 255)]
    private ?string $faType = null;

    #[ORM\Column(length: 255)]
    private ?string $barName = null;

    #[ORM\Column]
    private ?bool $isAvailable = null;

    #[ORM\OneToMany(mappedBy: 'monster', targetEntity: Status::class)]
    private Collection $status;

    #[ORM\OneToMany(mappedBy: 'monster', targetEntity: Buff::class)]
    private Collection $buffs;

    public function __construct()
    {
        $this->status = new ArrayCollection();
        $this->buffs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBgType(): ?string
    {
        return $this->bgType;
    }

    public function setBgType(string $bgType): static
    {
        $this->bgType = $bgType;

        return $this;
    }

    public function getFaType(): ?string
    {
        return $this->faType;
    }

    public function setFaType(string $faType): static
    {
        $this->faType = $faType;

        return $this;
    }

    public function getBarName(): ?string
    {
        return $this->barName;
    }

    public function setBarName(string $barName): static
    {
        $this->barName = $barName;

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
            $status->setMonster($this);
        }

        return $this;
    }

    public function removeStatus(Status $status): static
    {
        if ($this->status->removeElement($status)) {
            // set the owning side to null (unless already changed)
            if ($status->getMonster() === $this) {
                $status->setMonster(null);
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
            $buff->setMonster($this);
        }

        return $this;
    }

    public function removeBuff(Buff $buff): static
    {
        if ($this->buffs->removeElement($buff)) {
            // set the owning side to null (unless already changed)
            if ($buff->getMonster() === $this) {
                $buff->setMonster(null);
            }
        }

        return $this;
    }
}
