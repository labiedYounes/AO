<?php

namespace medaSys\AOBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use medaSys\AOBundle\Entity\situationMarche;
use medaSys\AOBundle\Form\situationMarcheType;

/**
 * situationMarche controller.
 *
 */
class situationMarcheController extends Controller
{

    /**
     * Lists all situationMarche entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('medaSysAOBundle:situationMarche')->findAll();

        return $this->render('medaSysAOBundle:situationMarche:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new situationMarche entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new situationMarche();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('situationmarche_show', array('id' => $entity->getId())));
        }

        return $this->render('medaSysAOBundle:situationMarche:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a situationMarche entity.
     *
     * @param situationMarche $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(situationMarche $entity)
    {
        $form = $this->createForm(new situationMarcheType(), $entity, array(
            'action' => $this->generateUrl('situationmarche_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new situationMarche entity.
     *
     */
    public function newAction()
    {
        $entity = new situationMarche();
        $form   = $this->createCreateForm($entity);

        return $this->render('medaSysAOBundle:situationMarche:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a situationMarche entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:situationMarche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find situationMarche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:situationMarche:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing situationMarche entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:situationMarche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find situationMarche entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:situationMarche:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a situationMarche entity.
    *
    * @param situationMarche $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(situationMarche $entity)
    {
        $form = $this->createForm(new situationMarcheType(), $entity, array(
            'action' => $this->generateUrl('situationmarche_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing situationMarche entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:situationMarche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find situationMarche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('situationmarche_edit', array('id' => $id)));
        }

        return $this->render('medaSysAOBundle:situationMarche:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a situationMarche entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('medaSysAOBundle:situationMarche')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find situationMarche entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('situationmarche'));
    }

    /**
     * Creates a form to delete a situationMarche entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('situationmarche_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
        ;
    }
}
