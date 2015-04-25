<?php

namespace medaSys\AOBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use medaSys\AOBundle\Entity\suiviPlis;
use medaSys\AOBundle\Form\suiviPlisType;

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

        $form->add('submit', 'submit', array('label' => 'Create'));

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

        $form->add('submit', 'submit', array('label' => 'Update'));

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
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
