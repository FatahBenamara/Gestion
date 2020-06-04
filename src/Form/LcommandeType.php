<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Lcommande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LcommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numc')
            ->add('pv')
            ->add('qte')
            ->add('tva')
            ->add('lig')
            ->add('produit', EntityType::class, [ "class" => Produit::class, "choice_label" => "libelle" ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lcommande::class,
        ]);
    }
}
