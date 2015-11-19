<?php

namespace medaSys\AOBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use medaSys\AOBundle\Entity\situationAppel;
use medaSys\AOBundle\Form\situationAppelType;

/**
 * situationAppel controller.
 *
 */
class situationAppelController extends Controller
{

    /**
     * Lists all situationAppel entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('medaSysAOBundle:situationAppel')->findAll();

        return $this->render('medaSysAOBundle:situationAppel:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new situationAppel entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new situationAppel();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('situationappel_show', array('id' => $entity->getId())));
        }

        return $this->render('medaSysAOBundle:situationAppel:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a situationAppel entity.
     *
     * @param situationAppel $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(situationAppel $entity)
    {
        $form = $this->createForm(new situationAppelType(), $entity, array(
            'action' => $this->generateUrl('situationappel_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new situationAppel entity.
     *
     */
    public function newAction()
    {
        $entity = new situationAppel();
        $form   = $this->createCreateForm($entity);

        return $this->render('medaSysAOBundle:situationAppel:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a situationAppel entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:situationAppel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find situationAppel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:situationAppel:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing situationAppel entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:situationAppel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find situationAppel entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:situationAppel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a situationAppel entity.
    *
    * @param situationAppel $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(situationAppel $entity)
    {
        $form = $this->createForm(new situationAppelType(), $entity, array(
            'action' => $this->generateUrl('situationappel_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifier'));

        return $form;
    }
    /**
     * Edits an existing situationAppel entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:situationAppel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find situationAppel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('situationappel_edit', array('id' => $id)));
        }

        return $this->render('medaSysAOBundle:situationAppel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a situationAppel entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('medaSysAOBundle:situationAppel')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find situationAppel entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('situationappel'));
    }

    /**
     * Creates a form to delete a situationAppel entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('situationappel_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
        ;
    }
}
