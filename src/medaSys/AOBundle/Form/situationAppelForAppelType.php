<?php


namespace medaSys\AOBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class situationAppelForAppelType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numOrder',null,array('label'=>'Réf. AO/ Consultation : '))
             ->add('responsableCompte',null,array('label'=>'Responsable du compte :'))
             ->add('montantMarche',null,array('label'=>'Estimation du projet :'))
            ->add('lot',null,array('label'=>'Nombre de lots : '))
            ->add('montantSoumission',null,array('label'=>'Montant de la soumission :'))
            ->add('dateVisiteLieux',null,array('label'=>'Date visite des lieux :  '))
            ->add('dateSoumission',null,array('label'=>'Date et heure soumission :'))
              ->add('suiviPlis',new suiviPlisForAppelType())
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