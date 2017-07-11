<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticulosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre')
            ->add('contenido')
            ->add('activo')
            ->add('slug',TextType::class,array('disabled'=>true))
            ->add('metakeys',TextareaType::class,array('attr'=>array('rows'=>'5')))
            ->add('metadesc',TextareaType::class,array('attr'=>array('rows'=>'5')))
            ->add('created_at',DateType::class,array('label'=>'Creado'))
            ->add('updated_at',DateType::class,array('label'=>'Actualizado'));
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\Articulos'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_articulos';
}


}
