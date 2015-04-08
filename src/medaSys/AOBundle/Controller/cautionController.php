<?php

namespace medaSys\AOBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use medaSys\AOBundle\Entity\caution;
use medaSys\AOBundle\Form\cautionType;

/**
 * caution controller.
 *
 */
class cautionController extends Controller
{

    /**
     * Lists all caution entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('medaSysAOBundle:caution')->findAll();

        return $this->render('medaSysAOBundle:caution:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new caution entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new caution();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('caution_show', array('id' => $entity->getId())));
        }

        return $this->render('medaSysAOBundle:caution:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a caution entity.
     *
     * @param caution $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(caution $entity)
    {
        $form = $this->createForm(new cautionType(), $entity, array(
            'action' => $this->generateUrl('caution_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new caution entity.
     *
     */
    public function newAction()
    {
        $entity = new caution();
        $form   = $this->createCreateForm($entity);

        return $this->render('medaSysAOBundle:caution:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a caution entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:caution')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find caution entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:caution:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing caution entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:caution')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find caution entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:caution:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a caution entity.
    *
    * @param caution $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(caution $entity)
    {
        $form = $this->createForm(new cautionType(), $entity, array(
            'action' => $this->generateUrl('caution_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing caution entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:caution')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find caution entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('caution_edit', array('id' => $id)));
        }

        return $this->render('medaSysAOBundle:caution:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a caution entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('medaSysAOBundle:caution')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find caution entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('caution'));
    }

    /**
     * Creates a form to delete a caution entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('caution_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
