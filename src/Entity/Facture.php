<?php

namespace App\Entity;

use App\Repository\FactureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactureRepository::class)]
class Facture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_facture = null;

    #[ORM\ManyToOne(inversedBy: 'factures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Voiture $voiture = null;

    #[ORM\ManyToOne(inversedBy: 'factures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Client $client = null;

    #[ORM\Column(nullable: true)]
    private ?float $montant = null;

    /**
     * @var Collection<int, FactureTypeReparation>
     */
    #[ORM\OneToMany(targetEntity: FactureTypeReparation::class, mappedBy: 'facture', orphanRemoval: true)]
    private Collection $factureTypeReparations;

    public function __construct()
    {
        $this->factureTypeReparations = new ArrayCollection();
    }

     

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateFacture(): ?\DateTimeInterface
    {
        return $this->date_facture;
    }

    public function setDateFacture(\DateTimeInterface $date_facture): static
    {
        $this->date_facture = $date_facture;

        return $this;
    }

    public function getVoiture(): ?Voiture
    {
        return $this->voiture;
    }

    public function setVoiture(?Voiture $voiture): static
    {
        $this->voiture = $voiture;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): static
    {
        $this->client = $client;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(?float $montant): static
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * @return Collection<int, FactureTypeReparation>
     */
    public function getFactureTypeReparations(): Collection
    {
        return $this->factureTypeReparations;
    }

    public function addFactureTypeReparation(FactureTypeReparation $factureTypeReparation): static
    {
        if (!$this->factureTypeReparations->contains($factureTypeReparation)) {
            $this->factureTypeReparations->add($factureTypeReparation);
            $factureTypeReparation->setFacture($this);
        }

        return $this;
    }

    public function removeFactureTypeReparation(FactureTypeReparation $factureTypeReparation): static
    {
        if ($this->factureTypeReparations->removeElement($factureTypeReparation)) {
            // set the owning side to null (unless already changed)
            if ($factureTypeReparation->getFacture() === $this) {
                $factureTypeReparation->setFacture(null);
            }
        }

        return $this;
    }

   
}
