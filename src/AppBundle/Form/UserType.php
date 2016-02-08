<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, $this->placeholder('Enter a valid email'))
            ->add('username', TextType::class, $this->placeholder('Enter a valid username'))
            ->add('password', RepeatedType::class,
                array(
                    'type' => PasswordType::class,
                    'first_options' => array(
                        'label' => 'Password', 'attr' => array('placeholder' => 'Enter your password')),

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