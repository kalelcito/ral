<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoriaType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre',TextType::class,array('required'=>true))
            ->add('descripcion',TextareaType::class,array('attr'=>array('rows'=>'5')))
            ->add('imagen',FileType::class,array('required'=>true,'data_class'=>null,'attr'=>array('ruta'=>'images')))
            ->add('color',TextType::class,array('required'=>true,'attr'=>array('class'=>'colorpicker')))
            ->add('orden',IntegerType::class,array('required'=>false,'attr'=>array('min'=>'0','step'=>'1')))
            ->add('activo')
            ->add('slug',TextType::class,array('disabled'=>true))
            ->add('metakeys',TextareaType::class,array('required'=>false,'label'=>'Metakeys separadas por coma(,)','attr'=>array('rows'=>'5')))
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
'data_class' => 'CoreBundle\Entity\Categoria'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_categoria';
}


}
