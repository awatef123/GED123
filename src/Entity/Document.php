<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DocumentRepository::class)
 */
class Document
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
    private $Type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Source;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Objet;

    /**
     * @ORM\Column(type="integer")
     */
    private $NumInterne;

    /**
     * @ORM\Column(type="date")
     */
    private $DateDocumentation;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getSource(): ?string
    {
        return $this->Source;
    }

    public function setSource(string $Source): self
    {
        $this->Source = $Source;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->Objet;
    }

    public function setObjet(string $Objet): self
    {
        $this->Objet = $Objet;

        return $this;
    }

    public function getNumInterne(): ?int
    {
        return $this->NumInterne;
    }

    public function setNumInterne(int $NumInterne): self
    {
        $this->NumInterne = $NumInterne;

        return $this;
    }

    public function getDateDocumentation(): ?\DateTimeInterface
    {
        return $this->DateDocumentation;
    }

    public function setDateDocumentation(\DateTimeInterface $DateDocumentation): self
    {
        $this->DateDocumentation = $DateDocumentation;

        return $this;
    }
}
