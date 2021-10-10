<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ProjetRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=ProjetRepository::class)
 */
class Projet
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
    private $titre;

    /**
     * @ORM\Column(type="array")
     */
    private $images = [];

    /**
     * @ORM\Column(type="array")
     */
    private $technologie = [];

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $annee;

    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    private $enLigne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $url;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function setImages(array $images): self
    {
        $this->images = $images;

        return $this;
    }

    public function getTechnologie(): ?array
    {
        return $this->technologie;
    }

    public function setTechnologie(array $technologie): self
    {
        $this->technologie = $technologie;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAnnee(): ?\DateTimeInterface
    {
        return $this->annee;
    }

    public function setAnnee(\DateTimeInterface $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getEnLigne(): ?string
    {
        return $this->enLigne;
    }

    public function setEnLigne(string $enLigne): self
    {
        $this->enLigne = $enLigne;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }
}
