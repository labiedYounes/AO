<?php

namespace medaSys\AOBundle\Form;

use medaSys\AOBundle\Entity\situationAppel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class appelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('objet')
            ->add('description')
            ->add('type')
            ->add('passation')
            ->add('attestation')
            ->add('cp')
            ->add('ville')
            ->add('typeMarche')
            ->add('dateLimit')
            ->add('lieuxDepot')
            ->add('maitreOuvrage',new entrepriseType())
            ->add('situationAppel',new situationAppelType())
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medaSys\AOBundle\Entity\appel'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'medasys_aobundle_appel';
    }
}
