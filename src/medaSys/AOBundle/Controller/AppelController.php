<?php

namespace medaSys\AOBundle\Controller;

use medaSys\AOBundle\Entity\situationAppel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use medaSys\AOBundle\Entity\appel;
use medaSys\AOBundle\Entity\suiviPlis;
use medaSys\AOBundle\Form\appelType;
use medaSys\AOBundle\Form\etatForm;

/**
 * appel controller.
 *
 */
class appelController extends Controller
{

    /**
     * Lists all appel entities.
     *
     */
    private $em;
    private $btnArray;

    function __construct()
    {
     $this->btnArray=array('cautionnement'=>'Cautionnement',
            'installation'=>'Installation',
            'qualificationTechnique'=>'Qualification Technique',
            'soumissionnairesConcurrents'=>'soumissionnaires concurrents',
            "submit"=>"Update");
        //$this->btnArray=array("submit"=>"Update");

    }

    public function indexAction()
    {
        $this->em = $this->getDoctrine()->getManager();

        $entities = $this->em->getRepository('medaSysAOBundle:appel')->findAll();

        return $this->render('medaSysAOBundle:appel:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    private function debugFun($msg){
        $appel=$this->em->getRepository('medaSysAOBundle:appel')->findOneById(1);
        $appel->setAppelDebug($msg);
        $this->em->persist($appel);
        $this->em->flush();
    }
    /**
     * Creates a new appel entity.
     *
     */
    public function createAction(Request $request)
    {

        $entity = new appel();
        $form = $this->createCreateForm($entity);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->em = $this->getDoctrine()->getManager();
           // $maitreOuvrage=$entity->getMaitreOuvrage();//persisting the underlying object
            $situationAppel=$entity->getSituationAppel();
            //$suiviPlis=$situationAppel->getSuiviPlis();
           // $suiviPlis->setSituationAppel($situationAppel);
            $situationAppel->setAppel($entity);
            $this->em->persist($entity);
           // $this->em->persist($maitreOuvrage);
           // $this->em->persist($suiviPlis);
            $etatForm= new etatForm($form,$entity->getSituationAppel()->getEtats(),$this->getDoctrine()->getEntityManager(),$request);
            $etatForm->processEtats();
            $this->em->flush();

            // ////$this->debugFun("SituationAppelId ". $entity->getSituationAppel()->getId()." appelID ".$entity->getId());


            return $this->redirect($this->generateUrl('appel_show', array('id' => $entity->getId())));
        }

        return $this->render('medaSysAOBundle:appel:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a appel entity.
     *
     * @param appel $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(appel $entity)
    {
        $form = $this->createForm(new appelType(), $entity, array(
            'action' => $this->generateUrl('appel_create'),
            'method' => 'POST',
            'attr'=>array('novalidate'=>'novalidate')
        ));
        $etatForm= new etatForm($form,$entity->getSituationAppel()->getEtats(),$this->getDoctrine()->getEntityManager());
        $etatForm->renderEtats();
        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new appel entity.
     *
     */
    public function newAction()
    {
        $entity = new appel();
        $situation=new situationAppel();
        $situation->setLot(2);
        $this->em=$this->getDoctrine()->getEntityManager();
        $this->em->persist($situation);
        $this->em->flush();
        $entity->setSituationAppel($situation);
        $form   = $this->createCreateForm($entity);
        $etatForm= new etatForm($form,$entity->getSituationAppel()->getEtats(),$this->getDoctrine()->getEntityManager());
        $etatForm->renderEtats();

        return $this->render('medaSysAOBundle:appel:new.html.twig', array(
            'entity'=>$entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a appel entity.
     *
     */
    public function showAction($id)
    {
        $this->em = $this->getDoctrine()->getManager();

        $entity = $this->em->getRepository('medaSysAOBundle:appel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:appel:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing appel entity.
     *
     */
    public function editAction(Request $request,$id)
    {
        $this->em = $this->getDoctrine()->getManager();

        $entity = $this->em->getRepository('medaSysAOBundle:appel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }

        $editForm = $this->createEditForm($entity);
        $etatForm= new etatForm($editForm,$entity->getSituationAppel()->getEtats(),$this->getDoctrine()->getEntityManager(),$request);
        $etatForm->renderEtats();
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:appel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a appel entity.
     *
     * @param appel $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(appel $entity)
    {
        $form = $this->createForm(new appelType(), $entity, array(
            'action' => $this->generateUrl('appel_update', array('id' => $entity->getId())),
            'method' => 'POST',
            'attr'=>array('novalidate'=> 'novalidate'),
        ));
        $this->addBtns($this->btnArray,$form);


       // $form->add('submit', 'submit', array('label' => 'Update'));

        //$form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    private function addBtns($btnArray,$form){
        $str="";
        foreach($btnArray as $key=>$btnLabel){
            $form->add($key, 'submit', array('label' =>$btnLabel ));
            $str.=$key." added";
        }
        ////$this->debugFun($str);
    }
    /**
     * Edits an existing appel entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $this->em = $this->getDoctrine()->getManager();

        $entity = $this->em->getRepository('medaSysAOBundle:appel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }


        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);

        $editForm->handleRequest($request);


        if ($editForm->isValid()) {
            ////$this->debugFun("isValid");
            $this->persist($entity);
            $etatForm= new etatForm($editForm,$entity->getSituationAppel()->getEtats(),$this->getDoctrine()->getEntityManager(),$request);
            $etatForm->processEtats();
            $this->em->flush();

            return $this->redirect($this->generateUrl('appel_edit', array('id' => $id)));
        }
     ////$this->debugFun(var_dump($editForm->getErrors()));
        $editForm=$this->createEditForm($entity);
        $etatForm= new etatForm($editForm,$entity->getSituationAppel()->getEtats(),$this->getDoctrine()->getEntityManager());
        $etatForm->renderEtats();

        return $this->render('medaSysAOBundle:appel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a appel entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $this->em = $this->getDoctrine()->getManager();
            $entity = $this->em->getRepository('medaSysAOBundle:appel')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find appel entity.');
            }

            $this->em->remove($entity);
            $this->em->flush();
        }

        return $this->redirect($this->generateUrl('appel'));
    }

    /**
     * Creates a form to delete a appel entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('appel_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }
}
