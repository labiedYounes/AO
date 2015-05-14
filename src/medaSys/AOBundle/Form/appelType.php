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
            ->add('objet',null,array('label'=>'Objet :'))
            ->add('attestation',null,array('label'=>'Attestation à fournir :'))
            ->add('passation',null,array('label'=>'Mode de Passation :'))
            ->add('typeMarche',null,array('label'=>'Type du marché :'))
            ->add('dateLimit',null,array('label'=>'Date dépôt Prospectus :'))
            ->add('lieuxDepot',null,array('label'=>'lieu dépôt Prospectus  :'))
            ->add('attestation',null,array('label'=>'Attestation à fournir :'))
            ->add('maitreOuvrage',new entrepriseForAppelType())
            ->add('situationAppel',new situationAppelForAppelType());

        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medaSys\AOBundle\Entity\appel'
        ))
        ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'medasys_aobundle_appel';
    }
}
