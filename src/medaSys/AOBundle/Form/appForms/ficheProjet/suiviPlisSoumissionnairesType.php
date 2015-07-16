<?php


namespace medaSys\AOBundle\Form\appForms\ficheProjet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class suiviPlisSoumissionnairesType extends AbstractType
{



    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder


            ->add('lieuxOuverture',null,array('label'=>"Lieu d ’ouverture des plis : "))
            //->addEventListener(FormEvents::PRE_SET_DATA,array($this, 'onPreSetData'))
        ;
    }
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
        return 'ficheProjetFormSuiviPlisSoumissionnaires';
    }
} 