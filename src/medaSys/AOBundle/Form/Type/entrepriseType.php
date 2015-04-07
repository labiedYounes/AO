<?php


namespace medaSys\AOBundle\Form\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class entrepriseType extends AbstractType {
    public function getName(){
        return 'entreprise';
    }
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder
            ->add('nom')
            ->add('secteur')
            ->add('forme')
            ->add('adresse')
            ->add('telephone')
            ->add('fax')
            ->add('mail')
            ->add('site')
            ->add('type');
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'medaSys\AOBundle\Entity\entreprise',
        ));
    }
} 