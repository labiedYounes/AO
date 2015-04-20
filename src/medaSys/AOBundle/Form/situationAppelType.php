<?php

namespace medaSys\AOBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class situationAppelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numOrder')
            ->add('resultas')
            ->add('responsableCompte')
            ->add('responsableQualification')
            ->add('montantMarche')
            ->add('lot')
            ->add('dateSoumission')
            ->add('observation')
            //->add('appel',new appelType())
           // ->add('etats',new etatType())
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medaSys\AOBundle\Entity\situationAppel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'medasys_aobundle_situationappel';
    }
}
