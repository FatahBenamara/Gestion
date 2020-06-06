<?php

namespace App\Form;

use App\Entity\Famille;
use App\Entity\Produit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle', TextType::class, [ "label" => 'Designation produit', ])
            ->add('pa', TextType::class, [ "label" => 'Prix d\'achat', ])
            ->add('pv', MoneyType::class, [ "label" => 'Prix de vente', ])
            ->add('tva', MoneyType::class, [ "label" => 'TVA', ])
            ->add('stock', NumberType::class, [ "label" => 'Stock', ])
            ->add('image', FileType::class, [ "mapped" => false, ])
            ->add('famille', EntityType::class, [ "class" => Famille::class, "choice_label" => "libelle" ])
            ->add('Enregistrer', SubmitType::class, [ "attr" => [ "class" => "btn btn-primary" ] ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
