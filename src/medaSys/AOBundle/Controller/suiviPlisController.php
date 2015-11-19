<?php

namespace medaSys\AOBundle\Controller;

use Doctrine\DBAL\DriverManager;
use medaSys\AOBundle\Entity\entreprise;
use medaSys\AOBundle\Entity\soumissionnairesPlis;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use medaSys\AOBundle\Entity\suiviPlis;

use medaSys\AOBundle\Form\suiviPlisType;
use medaSys\AOBundle\Form\appForms\ficheProjet\modifierSoumissionnairesType;

/**
 * suiviPlis controller.
 *
 */
class suiviPlisController extends Controller
{

    /**
     * Lists all suiviPlis entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('medaSysAOBundle:suiviPlis')->findAll();

        return $this->render('medaSysAOBundle:suiviPlis:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new suiviPlis entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new suiviPlis();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('suiviplis_show', array('id' => $entity->getId())));
        }

        return $this->render('medaSysAOBundle:suiviPlis:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a suiviPlis entity.
     *
     * @param suiviPlis $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(suiviPlis $entity)
    {
        $form = $this->createForm(new suiviPlisType(), $entity, array(
            'action' => $this->generateUrl('suiviplis_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new suiviPlis entity.
     *
     */
    public function newAction()
    {
        $entity = new suiviPlis();
        $form   = $this->createCreateForm($entity);

        return $this->render('medaSysAOBundle:suiviPlis:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a suiviPlis entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:suiviPlis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find suiviPlis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:suiviPlis:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing suiviPlis entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:suiviPlis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find suiviPlis entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:suiviPlis:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a suiviPlis entity.
     *
     * @param suiviPlis $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(suiviPlis $entity)
    {
        $form = $this->createForm(new suiviPlisType(), $entity, array(
            'action' => $this->generateUrl('suiviplis_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing suiviPlis entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:suiviPlis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find suiviPlis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('suiviplis_edit', array('id' => $id)));
        }

        return $this->render('medaSysAOBundle:suiviPlis:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a suiviPlis entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('medaSysAOBundle:suiviPlis')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find suiviPlis entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('suiviplis'));
    }

    /**
     * Creates a form to delete a suiviPlis entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('suiviplis_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
            ;
    }

    public function modifierSoumissionnairesAction(Request $request,$id){
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:suiviPlis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find suiviPlis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createSoumissionnairesEditForm($entity);
        $editForm->handleRequest($request);
        // die(var_dump($editForm));
        // $editForm->getData()->getSoumissionnaires()[0]->setMontant(11111);
        //$editForm->setdata($editForm->getData()->getSoumissionnaires());
        if($editForm->get('submit')->isClicked()){
            $this->validateFormCollection($editForm,$id,$entity);
        }

        //\Doctrine\Common\Util\Debug::dump($editForm->getData()->getSoumissionnaires());
        if ($editForm->isValid()) {

            die(var_dump('test'));
            $em->flush();

            return $this->redirect($this->generateUrl('suiviplis_edit', array('id' => $id)));
        }

        return $this->render('medaSysAOBundle:ficheProjet:modifierSoumissionnaires.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    private function validateFormCollection($editForm,$id,$entity){


        //$entities = $em->getRepository('medaSysAOBundle:soumissionnairesPlis')->findALL($id);
        //$this->addIfNotPresent($editForm,$id,$entity);
        $this->addIfNotPresentVII($editForm,$id,$entity);
        $this->removeIfNoLongerPresent($editForm,$id,$entity);

    }
    private function removeIfNoLongerPresent($editForm,$id,$entity){
        /* 1 getallsoumissionnaire with suiviPlis=this;
          2 getallsoumissionnaire form the form
          3=1-2
              remove 3*/
        $em=$this->getDoctrine()->getEntityManager();
        //1
        $allSoumisPlis=$em->getRepository('medaSysAOBundle:soumissionnairesPlis')->findBy(array('suiviPlis'=>$entity));
        //2
        $currentSoumis=$editForm->getData()->getSoumissionnaires();
        //die(var_dump($allSoumisPlis));

        $currentSoumis=$this->getEntreprise($currentSoumis);

        //\Doctrine\Common\Util\Debug::dump($currentSoumis);
        $deletedSoumis=$this->minus($allSoumisPlis,$currentSoumis);
        //\Doctrine\Common\Util\Debug::dump($deletedSoumis);

        $this->deleteSoumis($deletedSoumis);

    }
    private function deleteSoumis($deletedSoumisPlis){
        $em=$this->getDoctrine()->getEntityManager();
        //\Doctrine\Common\Util\Debug::dump($deletedSoumisPlis);
        foreach($deletedSoumisPlis as $soumiPlis ){
            $conn=$em->getConnection();
            $sql = "delete From soumissionnairesPlis where soumissionnaire_id=:so and suiviPlis_id=:su";
            $stmt = $em->getConnection()->prepare($sql);

            $stmt->bindValue(':so',$soumiPlis->getSoumissionnaire()->getId() );
            $stmt->bindValue(':su',$soumiPlis->getSuiviPlis()->getId() );
            $result = $stmt->execute();
        }

    }
    private function minus($allSoumisPlis,$currentSoumis){
        $remainingSoumis=(array)$allSoumisPlis;
        //$em=$this->getDoctrine()->getEntityManager();
        // $remainingSoumis=array();
        $temp=array();
        foreach($currentSoumis as $current){
            $i=0;

            foreach($remainingSoumis as $remaining){
                $i++;
                if($current[0]->getId()==$remaining->getSoumissionnaire()->getId()){
                    $temp[]=$i;

                }
            }
        }
        $remainingSoumis=$this->removeElements($temp,$remainingSoumis);
        //\Doctrine\Common\Util\Debug::dump(sizeOf($remainingSoumis));
        return $remainingSoumis;
    }
    private function removeElements($indexes,$elemArray){
        $size=sizeof($indexes);
        for($i=0;$i<$size;$i++){

            unset($elemArray[$indexes[$i]]);
        }
        return $elemArray;

    }
    private function getEntreprise($currentSoumis){
        $entreprises=array();
        $em=$this->getDoctrine()->getEntityManager();
        foreach($currentSoumis as $soumi){
            $entreprise=$em->getRepository('medaSysAOBundle:entreprise')->findBy(array('nomEntreprise'=>$soumi->getSoumissionnaire()->getNomEntreprise()));
            $entreprises[]=$entreprise;
        }
        // \Doctrine\Common\Util\Debug::dump($entreprise[0]->getId());
        return $entreprises;

    }
    private function addIfNotPresentVII($editForm,$id,$entity){
        $notPresent=array();
        $soumis=$editForm->getData()->getSoumissionnaires();
        $em=$this->getDoctrine()->getEntityManager();
        foreach($soumis as $soumi){
            $entreprise=$em->getRepository('medaSysAOBundle:entreprise')->findOneBy(array('nomEntreprise'=>$soumi->getSoumissionnaire()->getNomEntreprise()));
            if($entreprise!=null){
                $soumiPlis=$em->getRepository('medaSysAOBundle:soumissionnairesPlis')->findOneBy(array('soumissionnaire'=>$entreprise,'suiviPlis'=>$entity));
                if($soumiPlis==null){
                    $conn=$em->getConnection();
                    $sql = "INSERT INTO soumissionnairesPlis (montant, soumissionnaire_id,suiviPlis_id) VALUES (:m,:so,:su)";
                    $stmt = $em->getConnection()->prepare($sql);
                    $stmt->bindValue(':m',$soumi->getMontant() );
                    $stmt->bindValue(':so',$entreprise->getId() );
                    $stmt->bindValue(':su',$entity->getId() );
                    $result = $stmt->execute();
                    /* $queryBuilder = $conn->createQueryBuilder();
                     $queryBuilder
                         ->insert('somissionnairesPlis')
                         ->values(
                             array(
                                 'montant' => '?',
                                 'soumissionnaire_id' => '?',
                                 'suiviPlis_id' => '?'
                             )
                         )
                         ->setParameter(0, $soumi->getMontant())
                         ->setParameter(1, $soumi->getsoumissionnaire()->getId())
                         ->setParameter(2, $soumi->getSuiviPlis()->getId());
                     $conn->executeUpdate();
                     $queryBuilder->execute();*/
                    /*$soumissionnairePlis=new soumissionnairesPlis();
                    $soumissionnairePlis->setMontant($soumi->getMontant());
                    $soumissionnairePlis->setSuiviPlis($entity);
                    $soumissionnairePlis->setSoumissionnaire($entreprise);
                    $em->persist($soumissionnairePlis);
                    $em->flush();
                    $em->clear();*/
                }
                if($soumiPlis!=null){
                    $conn=$em->getConnection();
                    $sql = "update soumissionnairesPlis set montant=:m, soumissionnaire_id=:so,suiviPlis_id=:su where id=:somiPlis";
                    $stmt = $em->getConnection()->prepare($sql);
                    $stmt->bindValue(':m',$soumi->getMontant() );
                    $stmt->bindValue(':so',$entreprise->getId() );
                    $stmt->bindValue(':su',$entity->getId() );
                    $stmt->bindValue(':somiPlis',$soumiPlis->getId() );
                    $result = $stmt->execute();
                }
            }
            if($entreprise==null){
                $notPresent[]=$soumi->getSoumissionnaire()->getNomEntreprise();
            }
        }
        if(sizeOf($notPresent)!=0){
            $this->createSoumissionnaires($notPresent);
            $this->addIfNotPresentVII($editForm,$id,$entity);
        }
    }
    private function createSoumissionnaires($soumis){
        $em=$this->getDoctrine()->getEntityManager();
        foreach($soumis as $soumi){
            $conn=$em->getConnection();
            $sql = "INSERT INTO enterprise (nomEntreprise) VALUES (:nom)";
            $stmt = $em->getConnection()->prepare($sql);
            $stmt->bindValue(':nom',$soumi);

            $result = $stmt->execute();

            /*
            $entreprise=new entreprise();
            $entreprise->setNomEntreprise($soumi);
            $em->persist($entreprise);
            $em->flush();
            $em->clear();*/

        }
    }
    private function addIfNotPresent($editForm,$id,$suiviPlis){

        $em = $this->getDoctrine()->getManager();
        $soumissionnaires=$editForm->getData()->getSoumissionnaires();
        //die(var_dump(sizeof($soumissionnaires[0]->getSoumissionnaire()->getNomEntreprise())));
        for($i=0;$i<sizeof($soumissionnaires);$i++){
            $entreprise=$em->getRepository('medaSysAOBundle:entreprise')->findOneBy(array('nomEntreprise'=>$soumissionnaires[$i]->getSoumissionnaire()->getNomEntreprise()));
            if($entreprise==null){
                $this->addEntreprise($soumissionnaires[$i]);

                $i=$i==0?$i:$i-1;
                $em->flush();
                $em->clear();
                continue;

            }
            else{
                $this->addSoumissionaireIfNotPresent($soumissionnaires[$i],$id,$entreprise,$suiviPlis);
                /*$soumissionnairePlis=new soumissionnairesPlis();
                $soumissionnairePlis->setMontant($soumissionnaire->getMontant());
                $soumissionnairePlis->setSoumissionaire($entreprise);
                $soumissionnairePlis->setSuiviPlis($id);
                $em->persist($soumissionnairePlis);
                $em->flush();*/


            }
            $em->flush();
        }

    }
    private function addSoumissionaireIfNotPresent($soumi,$id,$entreprise,$suiviPlis){
        $em = $this->getDoctrine()->getManager();
        $soumissionairePlis=$em->getRepository('medaSysAOBundle:soumissionnairesPlis')->findOneBy(array('soumissionnaire'=>$entreprise,'montant'=>$soumi->getMontant(),'suiviPlis'=>$suiviPlis));
        if($soumissionairePlis== null){
            $soumissionairePlis=new soumissionnairesPlis();
            $soumissionairePlis->setSuiviPlis($suiviPlis);
            $soumissionairePlis->setSoumissionnaire($entreprise);
            $soumissionairePlis->setMontant($soumi->getMontant());
            $em->persist($soumissionairePlis);

        }
    }
    private function addEntreprise($soumissionaire){
        $entrepise=new entreprise();
        $entrepise->setNomEntreprise($soumissionaire->getSoumissionnaire()->getNomEntreprise());
        $em = $this->getDoctrine()->getManager();
        $em->persist($entrepise);


    }
    private function createSoumissionnairesEditForm($entity){
        //$formType=new \medaSys\AOBundle\Form\appForms\ficheProjet\suiviPlisType('soumissionnaires');
        $form = $this->createForm(new modifierSoumissionnairesType(), $entity, array(
            'action' => $this->generateUrl('suiviplis_modifier_soumissionnaires', array('id' => $entity->getId())),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }

}
