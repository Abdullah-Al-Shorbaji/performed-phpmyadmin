<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class NoteLimitationType extends AbstractType
{
    # Abdullah: Here to format structure of note's limitation form
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('text', null, array('required' => false))
            ->add('SortingBy', ChoiceType::class, [
                                    'choices'  => [
                                        'Select one' => 0,
                                        'Id' => 1,
                                        'Title' => 2,
                                        'Text' => 3,
                                        'Date' => 4,
                                    ],
                                ])
            ->add('SortingDirection', ChoiceType::class, [
                                    'choices'  => [
                                        'Select one' => 0,
                                        'ASC' => 1,
                                        'DESC' => 2,
                                    ],
                                ]);            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
