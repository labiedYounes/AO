<?php


namespace medaSys\AOBundle\Form\appForms\ficheProjet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class etatType extends AbstractType
{
    private $etat;
    function __construct($etat)
    {
        $this->etat=$etat;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ref','hidden')
            ->add('valuesArray','hidden')
            ->add('orderNum')
            ->add('displayedString')
            ->add('situationAppel','hidden')
            ->add('situationMarche','hidden')
            ->add('modelEtats','hidden')
        ;
        if (!is_null($this->etat)){
            $builder->setData($this->etat);
        }
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medaSys\AOBundle\Entity\etat'

        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ficheProjetFormEtat';
    }
}