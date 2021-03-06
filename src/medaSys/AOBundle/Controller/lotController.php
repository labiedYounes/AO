<?php

namespace medaSys\AOBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use medaSys\AOBundle\Entity\lot;
use medaSys\AOBundle\Form\lotType;

/**
 * lot controller.
 *
 */
class lotController extends Controller
{

    /**
     * Lists all lot entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('medaSysAOBundle:lot')->findAll();

        return $this->render('medaSysAOBundle:lot:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new lot entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new lot();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('lot_show', array('id' => $entity->getId())));
        }

        return $this->render('medaSysAOBundle:lot:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a lot entity.
     *
     * @param lot $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(lot $entity)
    {
        $form = $this->createForm(new lotType(), $entity, array(
            'action' => $this->generateUrl('lot_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new lot entity.
     *
     */
    public function newAction()
    {
        $entity = new lot();
        $form   = $this->createCreateForm($entity);

        return $this->render('medaSysAOBundle:lot:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a lot entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:lot')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find lot entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:lot:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing lot entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:lot')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find lot entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:lot:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a lot entity.
    *
    * @param lot $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(lot $entity)
    {
        $form = $this->createForm(new lotType(), $entity, array(
            'action' => $this->generateUrl('lot_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing lot entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:lot')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find lot entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('lot_edit', array('id' => $id)));
        }

        return $this->render('medaSysAOBundle:lot:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a lot entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('medaSysAOBundle:lot')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find lot entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('lot'));
    }

    /**
     * Creates a form to delete a lot entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('lot_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
