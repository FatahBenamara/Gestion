<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Commande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numc', TextType::class, [ "label" => 'Numero client', ])
            ->add('datecomm', DateType::class, [ "label" => 'Date Commande', "widget" => "single_text"])
            ->add('observation', TextType::class, [ "label" => 'Observation', ])
            ->add('totht', MoneyType::class, [ "label" => 'Total Ht', ])
            ->add('tottva', MoneyType::class, [ "label" => 'Total Tva', ])
            ->add('totttc', MoneyType::class, [ "label" => 'Total TTC', ])
            ->add('client', EntityType::class, [ "class" => Client::class, "choice_label" => "libelle" ])
            ->add('Enregistrer', SubmitType::class, [ "attr" => [ "class" => "btn btn-primary" ] ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Commande::class,
        ]);
    }
}
