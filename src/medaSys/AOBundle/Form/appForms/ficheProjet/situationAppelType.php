<?php


namespace medaSys\AOBundle\Form\appForms\ficheProjet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;

class situationAppelType extends AbstractType {
    private $section;
    function __construct($section="none")
    {
        $this->section=$section;
    }


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

            ->add('soumission',null,array('label'=>'Soumission'))
            ->add('motifs',null,array('label'=>'Motifs'))
            ->add('modeAdjudication',null,array('label'=>'Mode Adjudication'))
            ->add('observation',null,array('label'=>'Observations'))
            ->addEventListener(FormEvents::PRE_SET_DATA,array($this, 'onPreSetData'))
            //->add('appel',new appelType())
            //->add('etats',new etatType())


        ;
        // $this->addEtats($builder);
    }

    public function onPreSetData(FormEvent $event){
        {
            switch($this->section){
                case 'cautionnement':
                    $event->getForm()->add('cautions','collection',array('type'=>new cautionType()
                       ));
                    $event->getForm()->add('dureeGarentie',null,array('label'=>'Durée de Garantie :'))->add('delaiExection',null,array('label'=>'Délai d’exécution : '))->add('penalites',null,array('label'=>'Pénalités de retard plafonnés à : '));
                    break;
                case   'installation':
                    $event->getForm()->add('siteConcernes',null,array('label'=>'* Sites concernés '))->add('installation',null,array('label'=>'installation'));
                    break;
                case   'qualificationTechnique':
                    $event->getForm()->add('qualificationTechnique',null,array('label'=>'Qualification Technique'))->add('responsableQualification',null,array('label'=>'Responsable qualification :'));
                    break;

            }
            if($this->section== 'soumissionnaires'){
                $event->getForm() ->add('suiviPlis',new suiviPlisType('soumissionnaires'));
            }
            else{
                $event->getForm() ->add('suiviPlis',new suiviPlisType());
            }

        }
    }
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medaSys\AOBundle\Entity\situationAppel',
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ficheProjetFormSituationappel';
    }

} 