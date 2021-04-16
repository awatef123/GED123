<?php

namespace App\Form;

use App\Entity\Source;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Document;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Entity\Type;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            -> add('Nom')
            ->add('Source',EntityType::class,['class' => Source::class,
            'choice_label' => 'libelle'  ])
            

            ->add('type',EntityType::class,['class' => Type::class,
            'choice_label' => 'libelle' 
            
             ])


            ->add('Objet')
            ->add('NumInterne')
            ->add('DateDocumentation')
            ->add('image',FileType::class)
          ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
        ]);
    }
}
