<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Topic;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('message', TextareaType::class, ['label' => 'Post'])
            ->add('users', EntityType::class, ['class' => User::class, 'choice_label' => 'pseudo'])
            ->add('topic', EntityType::class, ['class' => Topic::class, 'choice_label' => 'titre'])
            ->add('datePub', DateType::class, ['label' => 'Date de publication :','widget' => 'single_text'])
            ->add('submit',SubmitType::class, ['attr' => ['class' => 'btn']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
