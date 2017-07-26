<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HomeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre',TextType::class,array('required'=>true,'attr'=>array('maxlength'=>'30')))
            ->add('descripcion', TextareaType::class,array('required'=>true,'attr'=>array('rows'=>'5','maxlength'=>'200')))
            ->add('imagen',FileType::class,array('required'=>true,'data_class'=>null,'attr'=>array('ruta'=>'images')))
            ->add('link',TextType::class,array('required'=>true))
            ->add('orden',ChoiceType::class,array('required'=>true,'choices'=>array('Sección 1'=>'1','Sección 2'=>'2','Sección 3'=>'3','Sección 4'=>'4','Sección 5'=>'5')))
            ->add('activo')
            //->add('created_at')
            //->add('updated_at')
        ;
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\Home'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_home';
}


}
