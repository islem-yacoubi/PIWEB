<?php

namespace App\Form;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ConnexionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('mail',TextType::class, array('required' => true, 'attr' => array('class' => 'form-control')))
            ->add('password',PasswordType::class, array('required' => true, 'attr' => array('class' => 'form-control')))

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            //'data_class' => Agency::class,
        ]);
    }
}