<?php

namespace App\Form;

use App\Entity\Source;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Document;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;


class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            -> add('Nom')
            ->add('Type')
            ->add('Source',EntityType::class,['class' => Source::class,
            'choice_label' => 'libelle'  ])
            ->add('Objet')
            ->add('NumInterne')
            ->add('DateDocumentation')
            ->add('imageFile',VichImageType::class)

          ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Document::class,
        ]);
    }
}
