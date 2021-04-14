<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;



class FilterSearch
{

   /**
    * 
    * @ORM\Column(type="date")

    */  
   private $minDate;

   /**
    *      
    * @ORM\Column(type="date")
    */ 
   private $maxDate;

   
  public function getMinDate():? \DateTimeInterface
   {
       return $this->minDate;
   }

   public function setMinDate(\DateTimeInterface $minDate): self
   {
       $this->minDate = $minDate;

       return $this;
   }

   public function getMaxDate(): ?\DateTimeInterface
   {
       return $this->maxDate;
   }

   public function setMaxDate(\DateTimeInterface $maxDate): self
   {
       $this->maxDate = $maxDate;

       return $this;
   }
 



}