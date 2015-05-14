<?php


namespace medaSys\AOBundle\Form\appForms\ficheProjet;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class entrepriseType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nomEntreprise',null,array('label'=>'Maître d’Ouvrage'))
            ->add('nomContact',null,array('label'=>'Nom du contact '))
            ->add('telephone',null,array('label'=>'Tél'))
            ->add('fax',null,array('label'=>'Fax'))
            ->add('mail',null,array('label'=>'E-mail'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medaSys\AOBundle\Entity\entreprise'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'ficheProjetFormEntreprise';
    }

} 