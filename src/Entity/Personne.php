<?php

namespace App\Entity;

use App\Repository\PersonneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PersonneRepository::class)]
class Personne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column]
    private ?int $age = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;
        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;
        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): static
    {
       
        $this->age = $age;
        return $this;
    }

    public function __construct(string $nom, string $prenom, int $age)
    {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setAge($age);
    }

    public function categorie(): string
    {
        if ($this->age < 0) {
            throw new \Exception("L'âge ne peut pas être négatif.");
        }
        if ($this->age >= 18) {
            return 'majeur';
        }
        return 'mineur';
    }
}