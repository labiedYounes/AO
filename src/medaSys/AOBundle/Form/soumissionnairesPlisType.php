<?php

namespace medaSys\AOBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class soumissionnairesPlisType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('montant')
            //->add('soumissionnaire')
           // ->add('suiviPlis')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medaSys\AOBundle\Entity\soumissionnairesPlis'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'medasys_aobundle_soumissionnairesplis';
    }
}
