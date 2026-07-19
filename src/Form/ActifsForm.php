<?php

namespace App\Form;

use App\Entity\Actifs;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ActifsForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('createdAt', null, ['widget' => 'single_text',])
            ->add('c1', TextType::class, ['label' => 'Sequoia P.'])
            ->add('c2', TextType::class, ['label' => 'PEA N. titres'])
            ->add('c3', TextType::class, ['label' => 'PEA N. espèces'])
            ->add('c4', TextType::class, ['label' => 'Sequoia N. euros'])
            ->add('c15',TextType::class, ['label' => 'Monetaire N.'])
            ->add('c5', TextType::class, ['label' => 'Sequoia N. quattro3'])
            ->add('c16',TextType::class, ['label' => 'Sequoia N. taux fixe'])
            ->add('c6', TextType::class, ['label' => 'Sequoia N. quietude3'])
            ->add('c17',TextType::class, ['label' => 'Sequoia N. ambre'])
            ->add('c18',TextType::class, ['label' => 'Sequoia N. bleuet'])
            ->add('c7', TextType::class, ['label' => 'CTO P.'])
            ->add('c8', TextType::class, ['label' => 'CEF J.'])
            ->add('c9', TextType::class, ['label' => 'PEA P.'])
            ->add('c10',TextType::class, ['label' => 'AVie P.'])
            ->add('c13',TextType::class, ['label' => 'CTO N.'])
            ->add('c12',TextType::class, ['label' => 'CEF J.'])
            ->add('c11',TextType::class, ['label' => 'PEA_PME N.'])
            ->add('c14',TextType::class, ['label' => 'AVie N.'])
            
            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Actifs::class,
        ]);
    }
}
