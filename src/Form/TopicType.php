<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Topic;
use App\Entity\Categorie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class TopicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class, ['label' => 'Titre :'])
            ->add('dateCreation', DateType::class, ['label' => 'Date de création :','widget' => 'single_text', ])
            ->add('posts', EntityType::class, ['class' => Post::class, 'choice_label' => 'message', 'mapped' => false])
            ->add('submit',SubmitType::class, ['attr' => ['class' => 'btn']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Topic::class,
        ]);
    }
}
