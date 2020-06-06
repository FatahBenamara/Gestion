<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\Lcommande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LcommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numc', NumberType::class, [ "label" => 'Numero de la commande', ])
            ->add('pv', MoneyType::class, [ "label" => 'Prix de vente', ])
            ->add('qte', NumberType::class, [ "label" => 'Quantité', ])
            ->add('tva', MoneyType::class, [ "label" => 'TVA', ])
           // ->add('lig', TextType::class, [ "label" => 'Lig', ])
            ->add('produit', EntityType::class, [ "class" => Produit::class, "choice_label" => "libelle" ])
            ->add('Enregistrer', SubmitType::class, [ "attr" => [ "class" => "btn btn-primary" ] ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Lcommande::class,
        ]);
    }
}
