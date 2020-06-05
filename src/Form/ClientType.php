<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('code', TextType::class, [ "label" => 'Code Client', ])
            ->add('libelle', TextType::class, [ "label" => 'Désignation Client', ])
            ->add('responsable', TextType::class, [ "label" => 'Responsable', ])
            ->add('adresse', TextType::class, [ "label" => 'Adresse  Client', ])
            ->add('ville', TextType::class, [ "label" => 'Ville', ])
            ->add('tel', TextType::class, [ "label" => 'Téléphonne', "help" => "Tapez votre numéro de téléphone"])
            ->add('portable', TextType::class, [ "label" => 'Portable', ])
            ->add('email', EmailType::class, [ "label" => 'Email', "help" => "Tapez votre email", "data" => "",])
            ->add('matfisc', TextType::class, [ "label" => 'Matricule Fiscale', ])
            ->add('cin', TextType::class, [ "label" => 'CIN', ])
            ->add('Ajouter', SubmitType::class, [ "attr" => [ "class" => "btn btn-primary" ] ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
