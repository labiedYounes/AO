<?php

namespace medaSys\AOBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use medaSys\AOBundle\Entity\appel;
use medaSys\AOBundle\Entity\caution;
use medaSys\AOBundle\Form\appForms\ficheProjet\appelType;
use Symfony\Component\HttpFoundation\Response;
use Jaspersoft\Client\Client;


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
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('medaSysAOBundle:appel')->findAll();

        return $this->render('medaSysAOBundle:appel:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new appel entity.
     *
     */
    public function createAction(Request $request)
    {
        $appel = new appel();
        $form = $this->createCreateForm($appel);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($appel);
            $this->addDataToSituationAppel($appel, $em);
            $em->flush();

            return $this->redirect($this->generateUrl('appel_show', array('id' => $appel->getId())));
        }

        return $this->render('medaSysAOBundle:ficheProjet:new.html.twig', array(
            'entity' => $appel,
            'form'   => $form->createView(),
        ));
    }

    private function addDataToSituationAppel($appel,$em){
        $this->createCautions(array(array('definitive','MT Caution définitive : '),array('provisoire','MT Caution provisoire:'),array('garantie','MT Retenue de garantie : ')),$em,$appel->getSituationAppel());
       // $this->addCationToSituationAppel($appel->getSituationAppel(),$DefaultCautions);
        $em->persist($appel->getSituationAppel());

    }
    private function createCautions($optionArray,$em,$situation){

        foreach($optionArray as $caut){
            $caution=new caution();
            $caution->setLabel($caut[1]);
            $caution->setType($caut[0]);
            $em->persist($caution);
            $situation->addCaution($caution);
            $cautions[]=$caution;
        }

    }
    private function addCationToSituationAppel($situation,$cautions){
        foreach($cautions as $caut){
            $situation->addCaution($caut);
        }
    }
    /**
     * Creates a form to create a appel entity.
     *
     * @param appel $appel The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(appel $appel)
    {
        $form = $this->createForm(new appelType(), $appel, array(
            'action' => $this->generateUrl('appel_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new appel entity.
     *
     */
    public function newAction()
    {
        $appel = new appel();
        $form   = $this->createCreateForm($appel);

        return $this->render('medaSysAOBundle:ficheProjet:new.html.twig', array(
            'entity' => $appel,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a appel entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $appel = $em->getRepository('medaSysAOBundle:appel')->find($id);

        if (!$appel) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:appel:show.html.twig', array(
            'entity'      => $appel,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing appel entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $appel = $em->getRepository('medaSysAOBundle:appel')->find($id);


        if (!$appel) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }

        $editForm = $this->createEditForm($appel);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:ficheProjet:edit.html.twig', array(
            'entity'      => $appel,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a appel entity.
     *
     * @param appel $appel The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(appel $appel,$formType='appelType')
    {
        $route=($formType=='appelType'?'appel_update':$formType);
        $formType='medaSys\\AOBundle\\Form\\appForms\\ficheProjet\\'.$formType;
        $obj=new $formType();
        $form = $this->createForm($obj, $appel, array(
            'action' => $this->generateUrl($route, array('id' => $appel->getId())),
            'method' => 'PUT',
        ));

        /*$form->add('cautionnement', 'submit', array('label' => 'Cautionnement'));
        $form->add('installation', 'submit', array('label' => 'Installation'));
        $form->add('qualificationTechnique', 'submit', array('label' => 'Qualification Technique'));
        $form->add('soumissionnaires', 'submit', array('label' => 'Soumissionnaires'));
       */ $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing appel entity.
     *
     */
    public function updateAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $appel = $em->getRepository('medaSysAOBundle:appel')->find($id);

        if (!$appel) {
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($appel);
        $editForm->handleRequest($request);

        $view=$this->isClicked($editForm);
        //die(var_dump($editForm->isValid()?'true':'false'));
        if ($editForm->isValid()&&$view=='') {
            //  die(var_dump($view." test"));
            $em->flush();
            return $this->redirect($this->generateUrl('appel_edit', array('id' => $id)));
        }
        $editView=$view==""?'edit':$view;

        return $this->render('medaSysAOBundle:ficheProjet:'.$editView.'.html.twig', array(
            'entity'      => $appel,
            'edit_form'   => $this->getForm($view,$editForm),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function cautionnementAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $appel = $em->getRepository('medaSysAOBundle:appel')->find($id);

        if (!$appel) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($appel,'cautionnement');
        $editForm->handleRequest($request);
        // die(var_dump($appel->getSituationAppel()->getPenalites().' fdqsdfq'));
       // $view=$this->isClicked($editForm);


        if ($editForm->isValid()) {
            //die(var_dump($view." test"));
            $em->persist($appel);
            $em->flush();
            return $this->redirect($this->generateUrl('appel_edit', array('id' => $id)));
        }
       // $editView=$view==""?'edit':$view;

        return $this->render('medaSysAOBundle:ficheProjet:cautionnement.html.twig', array(
            'entity'      => $appel,
            'edit_form'   => $this->getForm("",$editForm),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function installationAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $appel = $em->getRepository('medaSysAOBundle:appel')->find($id);

        if (!$appel) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($appel,'installation');
        $editForm->handleRequest($request);
        // die(var_dump($appel->getSituationAppel()->getPenalites().' fdqsdfq'));
       // $view=$this->isClicked($editForm);


        if ($editForm->isValid()) {
           // die(var_dump($view." test"));
            $em->persist($appel);
            $em->flush();
            return $this->redirect($this->generateUrl('appel_edit', array('id' => $id)));
        }
        //$editView=$view==""?'edit':$view;

        return $this->render('medaSysAOBundle:ficheProjet:installation.html.twig', array(
            'entity'      => $appel,
            'edit_form'   => $this->getForm("",$editForm),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function soumissionnairesAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $appel = $em->getRepository('medaSysAOBundle:appel')->find($id);



        if (!$appel) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($appel,'soumissionnaires');
        $editForm->handleRequest($request);
        // die(var_dump($appel->getSituationAppel()->getPenalites().' fdqsdfq'));
        $view=$this->isClicked($editForm);


        if ($editForm->isValid()) {
           // die(var_dump('h'));
            $em->persist($appel);
            $em->flush();
            return $this->redirect($this->generateUrl('appel_edit', array('id' => $id)));
        }
        $editView=$view==""?'edit':$view;

        return $this->render('medaSysAOBundle:ficheProjet:edit.html.twig', array(
            'entity'      => $appel,
            'edit_form'   => $this->getForm("",$editForm),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    public function qualificationTechniqueAction(Request $request, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $appel = $em->getRepository('medaSysAOBundle:appel')->find($id);

        if (!$appel) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($appel,'qualificationTechnique');
        $editForm->handleRequest($request);
        // die(var_dump($appel->getSituationAppel()->getPenalites().' fdqsdfq'));
        //$view=$this->isClicked($editForm);


        if ($editForm->isValid()) {
            //die(var_dump($view." test"));
            $em->persist($appel);
            $em->flush();
            return $this->redirect($this->generateUrl('appel_edit', array('id' => $id)));
        }
       // $editView=$view==""?'edit':$view;

        return $this->render('medaSysAOBundle:ficheProjet:qualificationTechnique.html.twig', array(
            'entity'      => $appel,
            'edit_form'   => $this->getForm("",$editForm),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /*
     * returns a from view
     * */
    private function getForm($view,$defautlForm){
        return $view==""?$defautlForm->createView():$this->createEditForm($defautlForm->getData(),$view)->createView();
    }

    private function isClicked($editForm){
        $view="";
        if(!$editForm->get('submit')->isClicked()){

            if($editForm->get('cautionnement')->isClicked()){
                $view='cautionnement';
            }
            if($editForm->get('installation')->isClicked()){
                $view='installation';
            }
            if($editForm->get('qualificationTechnique')->isClicked()){
                $view='qualificationTechnique';
            }
            if($editForm->get('soumissionnaires')->isClicked()){
                $view='soumissionnaires';
            }
        }
        return $view;

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
            $em = $this->getDoctrine()->getManager();
            $appel = $em->getRepository('medaSysAOBundle:appel')->find($id);

            if (!$appel) {
                throw $this->createNotFoundException('Unable to find appel entity.');
            }

            $em->remove($appel);
            $em->flush();
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
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
            ;
    }

    public function ficheProjetAction($id,$reportName){
        $c = new Client(
            "http://localhost:8081/jasperserver",
            "test",
            "test"
        );
     $param=array('appelId'=>array($id),
                   'soumission'=>array("oui"),
                   'modeAdjudication'=>array("article"),
                   'installation'=>array('casa'),
                   'qualificationTechnique'=>array('oui'),
                   'test'=>array('nn'),
                   'nomContact'=>array('test'),
    'tel'=>array('test'),
    'fax'=>array('test'),
    'eMail'=>array('test'),
    'refAo'=>array('test'),
   
    'montantSoumi'=>array('test'),
    'objet'=>array('test'),
    
    'nbrLot'=>array('test'),

    'soumission'=>array('oui'),
    'motifs'=>array('test'),
    'modeAdjudication'=>array('lot'),
    'modePassation'=>array('test'),
    'estimation'=>array('test'),
    'attestion'=>array('test'),
    'lieuOuverture'=>array('test'),
    'observations'=>array('test'),
    'cautionProvisoire'=>array('test'),
    'cautionDefinitive'=>array('test'),
    'garantie'=>array('7%'),
    'dureeGarantie'=>array('test'),
    'delaiExecution'=>array('test'),
    'penalites'=>array('test'),
    'installation'=>array('rabat'),
    'sites'=>array('test'),
    'qualificationTechnique'=>array('oui'),
    'responsableQualification'=>array('test'));
      $report = $c->reportService()->runReport('/reports/interactive/'.$reportName, 'html',null,null,$param);
/*$report = $c->reportService()->runReport('/public/Samples/Reports/suiviMarche', 'html');*/
        echo $report;
    }



}
