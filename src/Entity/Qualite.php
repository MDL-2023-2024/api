<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\QualiteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QualiteRepository::class)]
#[ApiResource]
class Qualite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $libelleQualite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelleQualite(): ?string
    {
        return $this->libelleQualite;
    }

    public function setLibelleQualite(string $libelleQualite): static
    {
        $this->libelleQualite = $libelleQualite;

        return $this;
    }
}
