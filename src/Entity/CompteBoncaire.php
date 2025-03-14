<?php

namespace App\Entity;

use App\Repository\CompteBoncaireRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteBoncaireRepository::class)]
class CompteBoncaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $propietaire = null;

    #[ORM\Column]
    private ?float $sold = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPropietaire(): ?string
    {
        return $this->propietaire;
    }

    public function setPropietaire(string $propietaire): static
    {
        $this->propietaire = $propietaire;

        return $this;
    }

    public function getSold(): ?float
    {
        return $this->sold;
    }

    public function setSold(float $sold): static
    {
        $this->sold = $sold;

        return $this;
    }
    public function __construct(string $propietaire, float $sold)
    {
        $this->setPropietaire($propietaire);
        $this->setSold($sold);
       
    }
    public function reterier(float $montant): float
    {
        if ($this->sold-$montant< 0) {
            throw new \Exception("hahahaha");
        }
        else{
            $this->sold-=$montant;
            return $this->sold;
        }
        
       
    }
}
