<?php

namespace TurismoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class TurismoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('localidad',TextType::class,array('label'=>'Localidad: ',
                                             'label_attr'=>array('class'=>'etiqueta'),
                                             'attr'=>array('class'=>'formulario'))))
        ->add('provincia',TextType::class,array('label'=>'Provincia: ',
                                             'label_attr'=>array('class'=>'etiqueta'),
                                             'attr'=>array('class'=>'formulario'))))
        ->add('poblacion',IntegerType::class,array('label'=>'Poblacion: ',
                                             'label_attr'=>array('class'=>'etiqueta'),
                                             'attr'=>array('class'=>'formulario'))))
        ->add('fechaReserva',DateType::class,array('label'=>'Fecha de reserva: ',
                                             'label_attr'=>array('class'=>'etiqueta'),
                                             'attr'=>array('class'=>'formulario'))));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TurismoBundle\Entity\Turismo'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'turismobundle_turismo';
    }


}
