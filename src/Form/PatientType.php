<?php

namespace App\Form;

use App\Entity\Patient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PatientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom', TextType::class, [
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            ->add('Prenom', TextType::class, [
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            ->add('Mail', TextType::class, [
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            
                   
            ->add('Telephone', TextType::class, [
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            ->add('MotdePasse', PasswordType::class, [
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            

            ->add('DateNaissance', DateType::class, [
                'widget' => 'single_text', 
                'years' => range(1950, date('Y') + 10), 
                'label' => 'Date de naissance',
                'attr' => [
                    'class' => "form-control"
                ],
            ])
            
            ->add('adresse', TextType::class, [
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            ->add('role', TextType::class, [
                'attr' => [
                    'class' => "form-control"
                ]
            ])
            
      ;         
    }


    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Patient::class,
        ]);
    }


    
}
