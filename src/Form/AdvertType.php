<?php

namespace App\Form;

use App\Entity\Advert;
use App\Form\PhotoType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdvertType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('title')
            ->add('content')
            ->add('published')
            ->add('slug')
            ->add('updateAt')
            ->add('image')
            ->add('categories')
            ->add('author')
            ->add('aplications')
            ->add('photo', PhotoType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Advert::class,
        ]);
    }
}
