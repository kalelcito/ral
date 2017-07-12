<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AdministradoresType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre',TextType::class,array('required'=>true))
            ->add('apellidos',TextType::class,array('required'=>true))
            ->add('email',EmailType::class,array('required'=>true))
            ->add('telefono')
            ->add('password',PasswordType::class,array('required'=>true))
            //->add('salt')
            ->add('activo')
            //->add('verificado')
            //->add('created_at',DateType::class,array('label'=>'Creado'))
            //->add('updated_at',DateType::class,array('label'=>'Actualizado'))
        ;
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\Administradores'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_administradores';
}


}
