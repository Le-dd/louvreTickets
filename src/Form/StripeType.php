<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class StripeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
      $builder
          ->add('name',TextType::class,[
            'constraints' => [
              new NotBlank(),
              new Length(['min' => 3]),
            ],
          ])
          ->add('firstName',TextType::class,[
            'constraints' => [
              new NotBlank(),
              new Length(['min' => 3]),
            ],
          ])
          ->add('email',EmailType::class,[
            'constraints' =>[
              new NotBlank(),
              new Length(['min' => 3]),
            ],
          ])
          ->add('token',HiddenType::class,[
            'constraints' =>[
              new NotBlank(),
            ],
          ])


      ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([

        ]);
    }



}
