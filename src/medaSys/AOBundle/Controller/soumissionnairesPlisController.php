<?php

namespace medaSys\AOBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use medaSys\AOBundle\Entity\soumissionnairesPlis;
use medaSys\AOBundle\Form\soumissionnairesPlisType;

/**
 * soumissionnairesPlis controller.
 *
 */
class soumissionnairesPlisController extends Controller
{

    /**
     * Lists all soumissionnairesPlis entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('medaSysAOBundle:soumissionnairesPlis')->findAll();

        return $this->render('medaSysAOBundle:soumissionnairesPlis:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new soumissionnairesPlis entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new soumissionnairesPlis();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('soumissionnairesplis_show', array('id' => $entity->getId())));
        }

        return $this->render('medaSysAOBundle:soumissionnairesPlis:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a soumissionnairesPlis entity.
     *
     * @param soumissionnairesPlis $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(soumissionnairesPlis $entity)
    {
        $form = $this->createForm(new soumissionnairesPlisType(), $entity, array(
            'action' => $this->generateUrl('soumissionnairesplis_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new soumissionnairesPlis entity.
     *
     */
    public function newAction()
    {
        $entity = new soumissionnairesPlis();
        $form   = $this->createCreateForm($entity);

        return $this->render('medaSysAOBundle:soumissionnairesPlis:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a soumissionnairesPlis entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:soumissionnairesPlis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find soumissionnairesPlis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:soumissionnairesPlis:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing soumissionnairesPlis entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:soumissionnairesPlis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find soumissionnairesPlis entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:soumissionnairesPlis:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a soumissionnairesPlis entity.
    *
    * @param soumissionnairesPlis $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(soumissionnairesPlis $entity)
    {
        $form = $this->createForm(new soumissionnairesPlisType(), $entity, array(
            'action' => $this->generateUrl('soumissionnairesplis_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing soumissionnairesPlis entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:soumissionnairesPlis')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find soumissionnairesPlis entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('soumissionnairesplis_edit', array('id' => $id)));
        }

        return $this->render('medaSysAOBundle:soumissionnairesPlis:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a soumissionnairesPlis entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('medaSysAOBundle:soumissionnairesPlis')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find soumissionnairesPlis entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('soumissionnairesplis'));
    }

    /**
     * Creates a form to delete a soumissionnairesPlis entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('soumissionnairesplis_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
