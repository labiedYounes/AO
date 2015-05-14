<?php

namespace medaSys\AOBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use medaSys\AOBundle\Entity\appel;
use medaSys\AOBundle\Form\appForms\ficheProjet\appelType;


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
        $appel = new appel();
        $form = $this->createCreateForm($appel);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($appel);
            $em->flush();

            return $this->redirect($this->generateUrl('appel_show', array('id' => $appel->getId())));
        }

        return $this->render('medaSysAOBundle:appel:new.html.twig', array(
            'entity' => $appel,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a appel entity.
     *
     * @param appel $appel The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(appel $appel)
    {
        $form = $this->createForm(new appelType(false), $appel, array(
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
        $appel = new appel();
        $form   = $this->createCreateForm($appel);

        return $this->render('medaSysAOBundle:ficheProjet:new.html.twig', array(
            'entity' => $appel,
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

        $appel = $em->getRepository('medaSysAOBundle:appel')->find($id);

        if (!$appel) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:appel:show.html.twig', array(
            'entity'      => $appel,
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

        $appel = $em->getRepository('medaSysAOBundle:appel')->find($id);

        if (!$appel) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }

        $editForm = $this->createEditForm($appel);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('medaSysAOBundle:ficheProjet:edit.html.twig', array(
            'entity'      => $appel,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a appel entity.
    *
    * @param appel $appel The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(appel $appel,$displayArea='all')
    {
        $form = $this->createForm(new appelType(true,$appel->getSituationAppel(),$displayArea), $appel, array(
            'action' => $this->generateUrl('appel_update', array('id' => $appel->getId())),
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

        $appel = $em->getRepository('medaSysAOBundle:appel')->find($id);

        if (!$appel) {
            throw $this->createNotFoundException('Unable to find appel entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($appel);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('appel_edit', array('id' => $id)));
        }

        return $this->render('medaSysAOBundle:ficheProjet:edit.html.twig', array(
            'entity'      => $appel,
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
            $appel = $em->getRepository('medaSysAOBundle:appel')->find($id);

            if (!$appel) {
                throw $this->createNotFoundException('Unable to find appel entity.');
            }

            $em->remove($appel);
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
