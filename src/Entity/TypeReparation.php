<?php

namespace App\Entity;

use App\Repository\TypeReparationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeReparationRepository::class)]
class TypeReparation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $cout = null;

    /**
     * @var Collection<int, FactureTypeReparation>
     */
    #[ORM\OneToMany(targetEntity: FactureTypeReparation::class, mappedBy: 'reparation')]
    private Collection $factureTypeReparations;

    public function __construct()
    {
        $this->factureTypeReparations = new ArrayCollection();
    }

  

   

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCout(): ?int
    {
        return $this->cout;
    }

    public function setCout(int $cout): static
    {
        $this->cout = $cout;

        return $this;
    }

   

     

    public function __toString()
    {
        return $this->description;
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
            $factureTypeReparation->setReparation($this);
        }

        return $this;
    }

    public function removeFactureTypeReparation(FactureTypeReparation $factureTypeReparation): static
    {
        if ($this->factureTypeReparations->removeElement($factureTypeReparation)) {
            // set the owning side to null (unless already changed)
            if ($factureTypeReparation->getReparation() === $this) {
                $factureTypeReparation->setReparation(null);
            }
        }

        return $this;
    }

    
}
