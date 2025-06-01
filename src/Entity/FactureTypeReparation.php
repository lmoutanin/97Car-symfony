<?php

namespace App\Entity;

use App\Repository\FactureTypeReparationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureTypeReparationRepository::class)]
class FactureTypeReparation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\ManyToOne(inversedBy: 'factureTypeReparations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Facture $facture = null;

    #[ORM\ManyToOne(inversedBy: 'factureTypeReparations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeReparation $reparation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(?Facture $facture): static
    {
        $this->facture = $facture;

        return $this;
    }

    public function getReparation(): ?TypeReparation
    {
        return $this->reparation;
    }

    public function setReparation(?TypeReparation $reparation): static
    {
        $this->reparation = $reparation;

        return $this;
    }

     public function __toString()
    {
        return $this->getReparation();
    }

}
