<?php

namespace App\Form;

use App\Entity\Disque;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DisqueType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Date')
            ->add('AuteurId')
            ->add('ProducteurId')
            ->add('RayonId')
            ->add('GenreId')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Disque::class,
        ]);
    }
}
