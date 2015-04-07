<?php


namespace medaSys\AOBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


//form for appel

class appelType extends AbstractType {
    public function getName(){
        return 'appel';
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('objet',null,array('required' => false))
            ->add('description')
            ->add('type')
            ->add('passation')
            ->add('ville')
            ->add('cp')
            ->add('typeMarche')
            ->add('dateLimit')
            ->add('maitreOuvrage',new entrepriseType())
            ->add('save', 'submit', array('label' => 'Enregister'));

    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medaSys\AOBundle\Entity\appel',
        ));
    }


} 