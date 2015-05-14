<?php


namespace medaSys\AOBundle\Form\appForms\ficheProjet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class situationAppelType extends AbstractType {

    private $showEtat;
    private $displayArea;
    private $situationAppel;
    function __construct($showEtat,$situationAppel=null,$displayArea=null)

    {
        $this->showEtat=$showEtat;
        $this->displayArea=$displayArea;
        $this->situationAppel=$situationAppel;

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
            ->add('suiviPlis',new suiviPlisType())
            //->add('appel',new appelType())
            // ->add('etats',new etatType())
        ;
        //$this->addEtats($builder);
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
        return 'ficheProjetFormSituationappel';
    }
    private function addEtats(FormBuilderInterface $builder){
        if($this->showEtat){
            $etats=$this->findEtatsArray();
            $i=0;
            $builder->add('etats','collection');
            foreach($etats as $etat){
                $builder->get('etats')->add('etats'.$i,new etatType($etat),array('data_class'=>'medaSys\AOBundle\Entity\Etat'));
            }
        }

    }
    private function findEtatsArray(){
        $etatsTmp=$this->situationAppel->getEtats();
        $etatsArray=array();

        foreach($etatsTmp as $etat){
            if($etat->getValuesArray()['displayArea']==$this->displayArea){
                $etatsArray[]=$etat;
            }
        }
        return $etatsArray;
    }

} 