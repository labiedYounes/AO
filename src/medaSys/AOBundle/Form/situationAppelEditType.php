<?php

namespace medaSys\AOBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class situationAppelEditType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
           /* ->add('appel',new appelForSituationType())
            ->add('numOrder')
            ->add('resultas')
            ->add('responsableCompte')
            ->add('responsableQualification')
            ->add('montantMarche')
            ->add('lot')
            ->add('dateSoumission')
            ->add('observation')*/
            ->add('etats','collection',array('type'=>new etatType()))
            //->add($options['etats'][0]->getDisplayedString(), null, array('mapped' => false,'data'=>$options['etats'][0]->getValuesArray()['choices'][0]))

        ;


    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medaSys\AOBundle\Entity\situationAppel'
        ))->setRequired(array(
            'em','etats'
        ))
            ->setAllowedTypes(array(
                'em' => 'Doctrine\Common\Persistence\ObjectManager',
                'etats' => 'Doctrine\ORM\PersistentCollection'
            ))
            ;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'medasys_aobundle_situationappel';
    }
}
