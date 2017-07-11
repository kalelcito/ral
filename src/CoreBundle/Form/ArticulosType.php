<?php

namespace CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Ivory\CKEditorBundle\Form\Type\CKEditorType;

class ArticulosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre',TextType::class,array('required'=>true))
            ->add('contenido',CKEditorType::class)
            ->add('activo')
            ->add('slug',TextType::class,array('disabled'=>true))
            ->add('metakeys',TextareaType::class,array('attr'=>array('rows'=>'5'),'label'=>"Metakeys separados por coma(,)"))
            ->add('metadesc',TextareaType::class,array('attr'=>array('rows'=>'5')))
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
