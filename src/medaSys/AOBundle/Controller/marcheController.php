<?php

namespace medaSys\AOBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use medaSys\AOBundle\Entity\marche;
use medaSys\AOBundle\Form\marcheType;

/**
 * marche controller.
 *
 */
class marcheController extends Controller
{

    /**
     * Lists all marche entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('medaSysAOBundle:marche')->findAll();

        return $this->render('medaSysAOBundle:marche:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new marche entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new marche();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('marche_show', array('id' => $entity->getId())));
        }

        return $this->render('medaSysAOBundle:marche:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a marche entity.
     *
     * @param marche $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(marche $entity)
    {
        $form = $this->createForm(new marcheType(), $entity, array(
            'action' => $this->generateUrl('marche_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Créer'));

        return $form;
    }

    /**
     * Displays a form to create a new marche entity.
     *
     */
    public function newAction()
    {
        $entity = new marche();
        $form   = $this->createCreateForm($entity);

        return $this->render('medaSysAOBundle:marche:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a marche entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:marche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find marche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:marche:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing marche entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:marche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find marche entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:marche:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a marche entity.
    *
    * @param marche $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(marche $entity)
    {
        $form = $this->createForm(new marcheType(), $entity, array(
            'action' => $this->generateUrl('marche_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Modifer'));

        return $form;
    }
    /**
     * Edits an existing marche entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:marche')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find marche entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('marche_edit', array('id' => $id)));
        }

        return $this->render('medaSysAOBundle:marche:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a marche entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('medaSysAOBundle:marche')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find marche entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('marche'));
    }

    /**
     * Creates a form to delete a marche entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('marche_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Supprimer'))
            ->getForm()
        ;
    }
}
