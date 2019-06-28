<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\NotBlank;

class AddMemberFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('email', EmailType::class, [
            'label' => "Member e-mail.",
            'attr' => [
                'class' => 'form-control',
                'placeholder' => "josh@gmail.com"
            ],
            'constraints' => [
                new NotBlank(['message' => "E-mail is required."])
            ]
        ])
        ->add('submit', SubmitType::class, [
            'label' => "Save",
            'attr' => [
                'class' => 'btn btn-block btn-primary mt-2'
            ]
        ])
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
