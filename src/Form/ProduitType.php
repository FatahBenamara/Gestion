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

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('pa', TextType::class, [ "label" => 'Prix d\'achat', ])
            ->add('pv')
            ->add('tva')
            ->add('stock')
            ->add('image', FileType::class, [ "mapped" => false, ])
            ->add('famille', EntityType::class, [ "class" => Famille::class, "choice_label" => "libelle" ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
