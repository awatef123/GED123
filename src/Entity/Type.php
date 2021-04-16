<?php

namespace App\Entity;

use App\Repository\TypeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypeRepository::class)
 */
class Type
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
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity=Document::class, mappedBy="type")
     */
    private $Document;

    public function __construct()
    {
        $this->Document = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return Collection|Document[]
     */
    public function getDocument(): Collection
    {
        return $this->Document;
    }

    public function addDocument(Document $document): self
    {
        if (!$this->Document->contains($document)) {
            $this->Document[] = $document;
            $document->setType($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): self
    {
        if ($this->Document->removeElement($document)) {
            // set the owning side to null (unless already changed)
            if ($document->getType() === $this) {
                $document->setType(null);
            }
        }

        return $this;
    }
}
