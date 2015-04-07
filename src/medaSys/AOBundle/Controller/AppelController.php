<?php


namespace medaSys\AOBundle\Controller;
use medaSys\AOBundle\Entity\appel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use medaSys\AOBundle\Form\Type\appelType;

class AppelController extends Controller {
   // crud
    public function createAction(Request $request){
        $appel=new appel();
        $appel->setDateLimit(new \DateTime('Tomorrow'));
        $form=$this->createForm(new appelType(),$appel);

        $form->handleRequest($request);
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();//todo should be refactored into appel repository
            $em->persist($appel);
            $em->persist($appel->getMaitreOuvrage());
            $em->flush();
            return $this->render('medaSysAOBundle:Default:accueil.html.twig');
        }
        return $this->render('medaSysAOBundle:Appel:create.html.twig', array(
            'form' => $form->createView(),
        ));

    }
    public function updateAction(Request $request,$id){
        $repository = $this->getDoctrine()
            ->getRepository('medaSysAOBundle:appel');

        $appel=$repository->find($id);
        $form=$this->createFormBuilder($appel)
            ->add('objet')
            ->add('description')
            ->add('type')
            ->add('passation')
            ->add('ville')
            ->add('cp')
            ->add('typeMarche')
            ->add('dateLimit')
            ->add('maitreOuvrage')
            ->add('situationAppel')
            ->add('save', 'submit', array('label' => 'Modifier'))
            ->getForm();
        $form->handleRequest($request);
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($appel);
            $em->flush();
            return $this->render('medaSysAOBundle:Default:accueil.html.twig');
        }
        return $this->render('medaSysAOBundle:Appel:update.html.twig', array(
            'form' => $form->createView(),
        ));


    }
}
