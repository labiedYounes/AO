<?php


namespace medaSys\AOBundle\Form\appForms\ficheProjet;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class soumissionnaires extends AbstractType {


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
            ->add('dateLimit',null,array('label'=>'Date dépôt Prospectus :'))
            ->add('lieuxDepot',null,array('label'=>'lieu dépôt Prospectus  :'))
            ->add('attestation',null,array('label'=>'Attestation à fournir :'))
            ->add('maitreOuvrage',new entrepriseType())
            ->add('situationAppel',new situationAppelType("soumissionnaires"))
        ;

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medaSys\AOBundle\Entity\appel'

        )) ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ficheProjetFormAppelSoumissionnaires';
    }
} 