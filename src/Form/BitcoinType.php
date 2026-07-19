<?php

namespace App\Form;

use App\Entity\Bitcoin;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BitcoinType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('compte')
            ->add('date')
            ->add('libelle')
            ->add('credit')
            ->add('debit')
            ->add('banque')
            ->add('budget')
            ->add('cheque')
            ->add('cbid')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Bitcoin::class,
        ]);
    }
}
