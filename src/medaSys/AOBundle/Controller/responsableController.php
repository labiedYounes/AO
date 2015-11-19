<?php

namespace medaSys\AOBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use medaSys\AOBundle\Entity\responsable;
use medaSys\AOBundle\Form\responsableType;

/**
 * responsable controller.
 *
 */
class responsableController extends Controller
{

    /**
     * Lists all responsable entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('medaSysAOBundle:responsable')->findAll();

        return $this->render('medaSysAOBundle:responsable:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new responsable entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new responsable();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('responsable_show', array('id' => $entity->getId())));
        }

        return $this->render('medaSysAOBundle:responsable:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a responsable entity.
     *
     * @param responsable $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(responsable $entity)
    {
        $form = $this->createForm(new responsableType(), $entity, array(
            'action' => $this->generateUrl('responsable_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new responsable entity.
     *
     */
    public function newAction()
    {
        $entity = new responsable();
        $form   = $this->createCreateForm($entity);

        return $this->render('medaSysAOBundle:responsable:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a responsable entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:responsable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find responsable entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:responsable:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing responsable entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:responsable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find responsable entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:responsable:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a responsable entity.
    *
    * @param responsable $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(responsable $entity)
    {
        $form = $this->createForm(new responsableType(), $entity, array(
            'action' => $this->generateUrl('responsable_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing responsable entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:responsable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find responsable entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('responsable_edit', array('id' => $id)));
        }

        return $this->render('medaSysAOBundle:responsable:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a responsable entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('medaSysAOBundle:responsable')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find responsable entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('responsable'));
    }

    /**
     * Creates a form to delete a responsable entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('responsable_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
        ;
    }
}
