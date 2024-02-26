<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class QuizFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class)
            ->add('level', ChoiceType::class, [
                'choices' => [
                    'Easy' => 'Easy',
                    'Medium' => 'Medium',
                    'Hard' => 'Hard'
                ]
            ])
            ->add( 'categories', ChoiceType::class, [
                'choices' => [
                    'movies' => 'movies',
                    'programming' => 'programming',
                    'data structures' => 'data structures',
                    'technology' => 'technology',
                    'docker' => 'docker'
                ]
            ] )
            ->add('Add', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
