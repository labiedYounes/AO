<?php


namespace medaSys\AOBundle\Form\appForms\ficheProjet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class suiviPlisType extends AbstractType
{
private $soumissionnaires;
    /**
     * current appel
     * @var appel
     */
    function __construct($soumissionnaires='none')
    {
        $this->soumissionnaires=$soumissionnaires;
    }


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder


            ->add('lieuxOuverture',null,array('label'=>"Lieu d ’ouverture des plis : "))
            ->addEventListener(FormEvents::PRE_SET_DATA,array($this, 'onPreSetData'))
        ;
    }
    public function onPreSetData(FormEvent $event){
        {
            switch($this->soumissionnaires){

                case   'soumissionnaires':
                    $event->getForm() ->add('lieuxOuverture',null,array('label'=>"Lieu d ’ouverture des plis : "));
                    $event->getForm()->add('soumissionnaires','collection',array('type'=>new soumissionnaireType()
                    ));
                    break;
                case   'none':
                    $event->getForm() ->add('lieuxOuverture',null,array('label'=>"Lieu d ’ouverture des plis : "));
                    break;
            }


        }
    }
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medaSys\AOBundle\Entity\suiviPlis'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ficheProjetFormSuiviplis';
    }
} 