<?php

namespace App\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Booking;
use App\Entity\Rate;
use App\Entity\Type;

class BookingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('firstName')
            ->add('country')
            ->add('birthDate')
            ->add('rateId', EntityType::class, [
              'class' => Rate::class,
              'choice_label' => 'name'
            ])
            ->add('typeId', EntityType::class, [
              'class' => Type::class,
              'choice_label' => 'name'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Booking::class,
        ]);
    }
}
