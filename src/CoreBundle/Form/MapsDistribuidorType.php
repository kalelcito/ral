<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MapsDistribuidorType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('url',TextType::class,array('required'=>true,'label'=>'URL Google Maps'))
            ->add('nombre',TextType::class,array('required'=>true))
            ->add('zona',ChoiceType::class,array('choices'=>array('Norte'=>'Norte','Centro'=>'Centro','Pacífico'=>'Pacífico','Sureste'=>'Sureste','Internacional'=>'Internacional')))
            ->add('activo')
            ->add('slug',TextType::class,array('disabled'=>true))
            ->add('metakeys',TextareaType::class,array('required'=>false,'attr'=>array('rows'=>'5')))
            ->add('metadesc',TextareaType::class,array('required'=>false,'attr'=>array('rows'=>'5')))
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
'data_class' => 'CoreBundle\Entity\MapsDistribuidor'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_mapsdistribuidor';
}


}
