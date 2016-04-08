<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserEditType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'Symfony\Component\Form\Extension\Core\Type\EmailType', $this->placeholder('Įveskite pašto adresą', 'Paštas'))
            ->add('password', 'Symfony\Component\Form\Extension\Core\Type\RepeatedType',
                array(
                    'type' => 'Symfony\Component\Form\Extension\Core\Type\PasswordType',
                    'required' => false,
                    'first_options' => array(
                        'label' => 'Slaptažodis', 'attr' => array('placeholder' => 'Įveskite slaptažodį jeigu norite pakeisti')),

                    'second_options' => array(
                        'label' => 'Pakartoti slaptažodį', 'attr' => array('placeholder' => 'Pakartokite slaptažodį')),
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    private function placeholder($text, $label = '')
    {
        return array(
            'label' => $label,
            'attr' => array(
                'placeholder' => $text,
            )
        );
    }
}