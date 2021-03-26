<?php

namespace App\Entity;

use App\Repository\RayonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RayonRepository::class)
 */
class Rayon
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\OneToMany(targetEntity=Disque::class, mappedBy="RayonId")
     */
    private $DisqueId;

    public function __construct()
    {
        $this->DisqueId = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return Collection|Disque[]
     */
    public function getDisqueId(): Collection
    {
        return $this->DisqueId;
    }

    public function addDisqueId(Disque $disqueId): self
    {
        if (!$this->DisqueId->contains($disqueId)) {
            $this->DisqueId[] = $disqueId;
            $disqueId->setRayonId($this);
        }

        return $this;
    }

    public function removeDisqueId(Disque $disqueId): self
    {
        if ($this->DisqueId->removeElement($disqueId)) {
            // set the owning side to null (unless already changed)
            if ($disqueId->getRayonId() === $this) {
                $disqueId->setRayonId(null);
            }
        }

        return $this;
    }
}
