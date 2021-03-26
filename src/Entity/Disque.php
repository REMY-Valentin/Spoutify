<?php

namespace App\Entity;

use App\Repository\DisqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DisqueRepository::class)
 */
class Disque
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
     * @ORM\Column(type="date")
     */
    private $Date;

    /**
     * @ORM\ManyToMany(targetEntity=Auteur::class, inversedBy="DisqueId")
     */
    private $AuteurId;

    /**
     * @ORM\ManyToMany(targetEntity=Producteur::class, inversedBy="DisqueId")
     */
    private $ProducteurId;

    /**
     * @ORM\ManyToOne(targetEntity=Rayon::class, inversedBy="DisqueId")
     */
    private $RayonId;

    /**
     * @ORM\ManyToMany(targetEntity=Genre::class, inversedBy="DisqueId")
     */
    private $GenreId;

    public function __construct()
    {
        $this->AuteurId = new ArrayCollection();
        $this->ProducteurId = new ArrayCollection();
        $this->GenreId = new ArrayCollection();
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }

    /**
     * @return Collection|Auteur[]
     */
    public function getAuteurId(): Collection
    {
        return $this->AuteurId;
    }

    public function addAuteurId(Auteur $auteurId): self
    {
        if (!$this->AuteurId->contains($auteurId)) {
            $this->AuteurId[] = $auteurId;
        }

        return $this;
    }

    public function removeAuteurId(Auteur $auteurId): self
    {
        $this->AuteurId->removeElement($auteurId);

        return $this;
    }

    /**
     * @return Collection|Producteur[]
     */
    public function getProducteurId(): Collection
    {
        return $this->ProducteurId;
    }

    public function addProducteurId(Producteur $producteurId): self
    {
        if (!$this->ProducteurId->contains($producteurId)) {
            $this->ProducteurId[] = $producteurId;
        }

        return $this;
    }

    public function removeProducteurId(Producteur $producteurId): self
    {
        $this->ProducteurId->removeElement($producteurId);

        return $this;
    }

    public function getRayonId(): ?Rayon
    {
        return $this->RayonId;
    }

    public function setRayonId(?Rayon $RayonId): self
    {
        $this->RayonId = $RayonId;

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getGenreId(): Collection
    {
        return $this->GenreId;
    }

    public function addGenreId(Genre $genreId): self
    {
        if (!$this->GenreId->contains($genreId)) {
            $this->GenreId[] = $genreId;
        }

        return $this;
    }

    public function removeGenreId(Genre $genreId): self
    {
        $this->GenreId->removeElement($genreId);

        return $this;
    }
}
