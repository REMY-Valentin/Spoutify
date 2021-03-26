<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenreRepository::class)
 */
class Genre
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
     * @ORM\ManyToMany(targetEntity=Disque::class, mappedBy="GenreId")
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
            $disqueId->addGenreId($this);
        }

        return $this;
    }

    public function removeDisqueId(Disque $disqueId): self
    {
        if ($this->DisqueId->removeElement($disqueId)) {
            $disqueId->removeGenreId($this);
        }

        return $this;
    }
}
