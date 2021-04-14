<?php

namespace App\Entity;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use App\Repository\DocumentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\FileType;


/**
 * @ORM\Entity(repositoryClass=DocumentRepository::class)
 * @Vich\Uploadable
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
     * 
     * 
     */
    private  $Type;



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
     * @ORM\OneToMany(targetEntity=Comments::class, mappedBy="Document")
     */
    private $comments;
    

     /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    /**
     * @Assert\NotBlank(message="please,upload the product brochure as a pdf file.")
     * @Vich\UploadableField(mapping="Document", fileNameProperty="image")
     * @Assert\File(mimeTypes={"application/pdf"})
     * @var File
     */
    private $imageFile;

 



   
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

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

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

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }





   
}
