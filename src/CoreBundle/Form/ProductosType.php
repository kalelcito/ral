<?php

namespace CoreBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('id_familia')
            ->add('nombre',TextType::class,array('required'=>true))
            ->add('descripcion',TextareaType::class,array('required'=>true,'attr'=>array('rows'=>'5')))
            ->add('imagen',FileType::class,array('required'=>true,'data_class'=>null,'attr'=>array('ruta'=>'images')))
            ->add('aplicacion',CKEditorType::class)
            ->add('beneficios',CKEditorType::class)
            ->add('especificaciones',CKEditorType::class)
            ->add('presentaciones',CKEditorType::class)
            ->add('caracteristicas',CKEditorType::class)
            ->add('info',CKEditorType::class)
            ->add('activo')
            ->add('slug',TextType::class,array('disabled'=>true))
            ->add('metakeys',TextareaType::class,array('label'=>'Metakeys separado por coma(,)','attr'=>array('rows'=>'5')))
            ->add('metadesc',TextareaType::class,array('attr'=>array('rows'=>'5')))
            //->add('created_at')
            //->add('updated_at')
            ->add('familia')
        ;
}

/**
* {@inheritdoc}
*/
public function configureOptions(OptionsResolver $resolver)
{
$resolver->setDefaults(array(
'data_class' => 'CoreBundle\Entity\Productos'
));
}

/**
* {@inheritdoc}
*/
public function getBlockPrefix()
{
return 'corebundle_productos';
}


}
