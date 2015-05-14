<?php
namespace medaSys\AOBundle\Form\appForms\ficheProjet;



use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;




class appelType extends AbstractType {
    private $showEtat;
    private $displayArea;
    private $situationAppel;
    private $em;
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
            ->add('objet',null,array('label'=>'Objet :'))
            ->add('attestation',null,array('label'=>'Attestation à fournir :'))
            ->add('passation',null,array('label'=>'Mode de Passation :'))
            ->add('dateLimit',null,array('label'=>'Date dépôt Prospectus :'))
            ->add('lieuxDepot',null,array('label'=>'lieu dépôt Prospectus  :'))
            ->add('attestation',null,array('label'=>'Attestation à fournir :'))
            ->add('maitreOuvrage',new entrepriseType())
            ->add('situationAppel',new situationAppelType($this->showEtat,$this->situationAppel,$this->displayArea))
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
        return 'ficheProjetFormAppel';
    }


} 