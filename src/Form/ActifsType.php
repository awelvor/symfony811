<?php

namespace App\Form;

use App\Entity\Actifs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ActifsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('createdAt', null, [
                'widget' => 'single_text',
            ])
            ->add('c1')
            ->add('c2')
            ->add('c3')
            ->add('c4')
            ->add('c5')
            ->add('c6')
            ->add('c7')
            ->add('c8')
            ->add('c9')
            ->add('c10')
            ->add('c11')
            ->add('c12')
            ->add('c13')
            ->add('c14')
            ->add('c15')
            ->add('c16')
            ->add('c17')
            ->add('c18')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actifs::class,
        ]);
    }
}
