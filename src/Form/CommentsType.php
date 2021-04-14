<?php

namespace App\Form;

use App\Entity\Comments;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Validator\Constraints\NotBlank;

use FOS\CKEditorBundle\Form\Type\CKEditorType;






class CommentsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre e-mail',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])     
            
               
            
               
            ->add('content', CKEditorType::class, [
                'label' => 'Votre commentaire',
                'attr' => [
                    'class' => 'form-control'
                ],
                'config'=> ['uiColor'=>"#e2e2e2",
                'toolbar'=>'full',
                'required'=> true
                ]
            ])
             ->add('nickname', TextType::class, [
                'label' => 'Votre pseudo',
                'attr' => [
                    'class' => 'form-control'
                ]
            ])           
            ->add('Igpd', CheckboxType::class, [
                'constraints' => [
                    new NotBlank()
                ]
            ])    
            ->add('envoyer', SubmitType::class)
            ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Comments::class,
        ]);
    }
}
