<?php

namespace medaSys\AOBundle\Controller;

use medaSys\AOBundle\Entity\situationAppel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use medaSys\AOBundle\Entity\appel;
use medaSys\AOBundle\Form\appelType;

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
        $entity = new appel();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $maitreOuvrage=$entity->getMaitreOuvrage();//persisting the underlying object
            $situationAppel=new situationAppel();
            $entity->setSituationAppel($situationAppel);
            $situationAppel->setAppel($entity);
            $em->persist($entity);
            $em->persist($maitreOuvrage);
           // $em->persist($situationAppel);
            $em->flush();

            return $this->redirect($this->generateUrl('appel_show', array('id' => $entity->getId())));
        }

        return $this->render('medaSysAOBundle:appel:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a appel entity.
     *
     * @param appel $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(appel $entity)
    {
        $form = $this->createForm(new appelType(), $entity, array(
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
        $entity = new appel();
        $form   = $this->createCreateForm($entity);

        return $this->render('medaSysAOBundle:appel:new.html.twig', array(
            'entity' => $entity,
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

        $entity = $em->getRepository('medaSysAOBundle:appel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:appel:show.html.twig', array(
            'entity'      => $entity,
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

        $entity = $em->getRepository('medaSysAOBundle:appel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:appel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a appel entity.
    *
    * @param appel $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(appel $entity)
    {
        $form = $this->createForm(new appelType(), $entity, array(
            'action' => $this->generateUrl('appel_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing appel entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('medaSysAOBundle:appel')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('appel_edit', array('id' => $id)));
        }

        return $this->render('medaSysAOBundle:appel:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
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
            $entity = $em->getRepository('medaSysAOBundle:appel')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find appel entity.');
            }

            $em->remove($entity);
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
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
