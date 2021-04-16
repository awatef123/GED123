<?php

namespace App\Entity;

use App\Repository\DocumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;




/**
 * @ORM\Entity(repositoryClass=DocumentRepository::class)
 *
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
    private  $Nom;

   


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

    /**
     * @ORM\ManyToOne(targetEntity=Source::class, inversedBy="document")
     */
    private $source;

  
  /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="Document")
     */
    private $type;

    

    

/**
     * @ORM\OneToMany(targetEntity=Comments::class, mappedBy="Document")
     */
    private $comments;
   /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;
   
    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNom(): ?string
    {
        return $this->Nom;
    }
    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

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

    public function getSource(): ?Source
    {
        return $this->source;
    }

    public function setSource(?Source $source): self
    {
        $this->source = $source;

        return $this;
    }
    /**
     * @return Collection|Comments[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setDocument($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getDocument() === $this) {
                $comment->setDocument(null);
            }
        }

        return $this;
    }

   
    public function getType(): ?Type
    {
        return $this->type;
    }

    public function setType( Type $type): self
    {
        $this->type = $type;

        return $this;
    }
public function getImage(){
    return $this->image;
}
public function setImage ($image)
{
    $this->image=$image;
    return $this;
}
   
}
