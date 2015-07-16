<?php


namespace medaSys\AOBundle\Form\appForms\ficheProjet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
class modifierSoumissionnairesType extends AbstractType
{
    private $soumissionnaires;
    /**
     * current appel
     * @var appel
     */
    function __construct()
    {

    }


    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder


            ->add('soumissionnaires','collection',array('type'=>new soumissionnairesPlisType(),
                'allow_add'    => true,
                'allow_delete'  => true,
                'by_reference'  => false,
            ));
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
        return 'ficheProjetFormModifierSoumissionnaires';
    }
} 