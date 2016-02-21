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
            ->add('email', 'Symfony\Component\Form\Extension\Core\Type\EmailType', $this->placeholder('Enter a valid email'))
            ->add('password', 'Symfony\Component\Form\Extension\Core\Type\RepeatedType',
                array(
                    'type' => 'Symfony\Component\Form\Extension\Core\Type\PasswordType',
                    'required' => false,
                    'first_options' => array(
                        'label' => 'Password', 'attr' => array('placeholder' => 'Enter your password to change')),

                    'second_options' => array(
                        'label' => 'Repeat Password', 'attr' => array('placeholder' => 'Repeat your password')),
                )
            );
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\User'
        ));
    }

    private function placeholder($text)
    {
        return array(
            'attr' => array(
                'placeholder' => $text,
            )
        );
    }
}