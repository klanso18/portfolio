<?php

namespace App\Form;

use App\Entity\Stack;
use App\Entity\Project;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du projet',
                'help' => 'Merci de rentrer le nom du projet'
            ])
            ->add('description', TextType::class, [
                'label' => 'Description (optionnel)',
                'required' => false,
                'help' => 'Merci de rentrer une description'
            ])
            ->add('createdAt', DateType::class, [
                'label' => 'Created date',
                'widget' => 'single_text'
            ])
            ->add('stacks', EntityType::class, [
                'class' => Stack::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
                'by_reference' => false,
            ]);
            // ->add('images', CollectionType::class, [
            //     'label' => false,
            //     'entry_type' => ImageProjectType::class,
            //     'by_reference' => false,
            //     'allow_add' => true,
            //     'allow_delete' => true,
            // ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
