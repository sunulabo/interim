<?php

namespace Interim\RecruteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Interim\RecruteBundle\Entity\Cv;
use Interim\RecruteBundle\Form\CvType;

/**
 * Cv controller.
 *
 */
class CvController extends Controller
{

    /**
     * Lists all Cv entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('InterimRecruteBundle:Cv')->findAll();

        return $this->render('InterimRecruteBundle:Cv:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Cv entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Cv();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $document->upload();
            $em->persist($entity);
            $em->flush();

   
            	
           
            
            	 
            
            
            
            
            
            
            
            return $this->redirect($this->generateUrl('cv_show', array('id' => $entity->getId())));
        }

        return $this->render('InterimRecruteBundle:Cv:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Cv entity.
     *
     * @param Cv $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Cv $entity)
    {
        $form = $this->createForm(new CvType(), $entity, array(
            'action' => $this->generateUrl('cv_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Cv entity.
     *
     */
    public function newAction()
    {
        $entity = new Cv();
        $form   = $this->createCreateForm($entity);

        return $this->render('InterimRecruteBundle:Cv:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cv entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Cv')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cv entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:Cv:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cv entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Cv')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cv entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('InterimRecruteBundle:Cv:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Cv entity.
    *
    * @param Cv $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cv $entity)
    {
        $form = $this->createForm(new CvType(), $entity, array(
            'action' => $this->generateUrl('cv_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Cv entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('InterimRecruteBundle:Cv')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cv entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('cv_edit', array('id' => $id)));
        }

        return $this->render('InterimRecruteBundle:Cv:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Cv entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('InterimRecruteBundle:Cv')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cv entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('cv'));
    }

    /**
     * Creates a form to delete a Cv entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cv_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    
 
    
    
    
    public function upload()
    {
    	// la propriŽtŽ Ç file È peut tre vide si le champ n'est pas requis
    	if (null === $this->file) {
    		return;
    	}
    
    	// utilisez le nom de fichier original ici mais
    	// vous devriez Ç l'assainir È pour au moins Žviter
    	// quelconques problmes de sŽcuritŽ
    
    	// la mŽthode Ç move È prend comme arguments le rŽpertoire cible et
    	// le nom de fichier cible o le fichier doit tre dŽplacŽ
    	$this->file->move($this->getUploadRootDir(), $this->file->getClientOriginalName());
    
    	// dŽfinit la propriŽtŽ Ç path È comme Žtant le nom de fichier o vous
    	// avez stockŽ le fichier
    	$this->path = $this->file->getClientOriginalName();
    
    	// Ç nettoie È la propriŽtŽ Ç file È comme vous n'en aurez plus besoin
    	$this->file = null;
    }
    
    
    
}
