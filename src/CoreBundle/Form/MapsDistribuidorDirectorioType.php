<?php

namespace CoreBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MapsDistribuidorDirectorioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('clave',TextType::class,array('required'=>true))
            ->add('nombreDistribuidor',TextType::class,array('required'=>true,'label'=>'Nombre de Distribuidor'))
            ->add('direccion',TextareaType::class,array('required'=>true,'attr'=>array('rows'=>'5')))
            ->add('telefono')
            ->add('whatsapp',TextType::class,array('label'=>'Número Whatsapp (*formato internacional)','attr'=>array('placeholder'=>'Ejemplo CDMX: +5215556482315')))
            ->add('email',EmailType::class)
            ->add('email2',EmailType::class,array('label'=>'Email Alternativo'))
            ->add('orden',IntegerType::class,array('attr'=>array('min'=>'0','step'=>'1')))
            ->add('activo')
            //->add('created_at')
            //->add('updated_at')
            ->add('mapsDistribuidor',EntityType::class,array('class'=>'CoreBundle\Entity\MapsDistribuidor','by_reference'=>true,'expanded'=>false,'multiple'=>false,'label'=>'Zona Geográfica'))
        ;
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\MapsDistribuidorDirectorio'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_mapsdistribuidordirectorio';
}


}
