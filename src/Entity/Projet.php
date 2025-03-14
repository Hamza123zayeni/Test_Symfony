<?php

namespace App\Entity;

use App\Repository\ProjetRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjetRepository::class)]
class Projet
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $naame = null;

    #[ORM\Column(length: 255)]
    private ?string $typee = null;

    #[ORM\Column]
    private ?float $price = null;

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

    public function getNaame(): ?string
    {
        return $this->naame;
    }

    public function setNaame(string $naame): static
    {
        $this->naame = $naame;

        return $this;
    }

    public function getTypee(): ?string
    {
        return $this->typee;
    }

    public function setTypee(string $typee): static
    {
        $this->typee = $typee;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }
    public function __construct($naame,$typee,$price){
        $this->naame=$naame;
        $this->typee=$typee;
        $this->price=$price;
    }
    public function computeTVA(){
        if($this->price<0)
        throw new \Exception('invalide');
        if($this->typee=='food')
        return $this->price*0.055;
    }
}
