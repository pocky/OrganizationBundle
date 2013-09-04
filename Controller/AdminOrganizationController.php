<?php

/*
 * This file is part of the Black package.
 *
 * (c) Alexandre Balmes <albalmes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Black\Bundle\OrganizationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Exception;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use JMS\SecurityExtraBundle\Annotation\Secure;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Controller managing the Organization profile`
 *
 * @Route("/admin/organization")
 */
class AdminOrganizationController extends Controller
{
    /**
     * Show lists of Organizations
     *
     * @Method("GET")
     * @Route("/index.html", name="admin_organizations")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     * 
     * @return Template
     */
    public function indexAction()
    {
        $csrf = $this->container->get('form.csrf_provider');

        $fields = array(
            'id',
            'organization.admin.organization.name.text',
            'organization.admin.organization.email.text',
            'organization.admin.postalAddress.address.country.text'
        );

        return array(
            'keys'  => $fields,
            'csrf'  => $csrf
        );
    }

    /**
     * Show lists of Organizations
     *
     * @Method("GET")
     * @Route("/list.json", name="admin_organizations_json")
     * @Secure(roles="ROLE_ADMIN")
     * 
     * @return Response
     */
    public function ajaxListAction()
    {
        $documentManager    = $this->getManager();
        $repository         = $documentManager->getRepository();

        $rawDocuments       = $repository->findAll();

        $documents = array('aaData' => array());
        foreach ($rawDocuments as $document) {
            if ($document->getAddress()->first()) {
                $country = $document->getAddress()->first()->getAddressCountryLocale($this->getRequest()->getLocale());
            } else {
                $country = null;
            }
            $documents['aaData'][] = array(
                $document->getId(),
                $document->getName(),
                $document->getEmail(),
                $country,
                null
            );
        }

        return new Response(json_encode($documents));
    }

    /**
     * Show an organization
     *
     * @param integer $id
     * 
     * @Method({"GET"})
     * @Route("/{id}/show", name="admin_organization_show")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     * 
     * @return Template
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function showAction($id)
    {
        $documentManager = $this->getManager();
        $repository = $documentManager->getRepository();

        $document   = $repository->findOneById($id);

        if (!$document) {
            throw $this->createNotFoundException('Unable to find Organization document.');
        }

        $locale = $this->getRequest()->getLocale();

        return array(
            'document'      => $document,
            'locale'        => $locale
        );
    }

    /**
     * Displays a form to create a new Organization document.
     *
     * @Method({"GET", "POST"})
     * @Route("/new", name="admin_organization_new")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     * @return Template
     */
    public function newAction()
    {
        $documentManager    = $this->getManager();
        $document           = $documentManager->createInstance();

        $formHandler    = $this->get('black_organization.organization.form.handler');
        $process        = $formHandler->process($document);

        if ($process) {
            $documentManager->persist($document);
            $documentManager->flush();

            return $this->redirect($this->generateUrl('admin_organization_edit', array('id' => $document->getId())));
        }

        return array(
            'document'  => $document,
            'form'      => $formHandler->getForm()->createView()
        );
    }

    /**
     * Displays a form to edit an existing organization document.
     *
     * @param string $id The document ID
     * 
     * @Method({"GET", "POST"})
     * @Route("/{id}/edit", name="admin_organization_edit")
     * @Secure(roles="ROLE_ADMIN")
     * @Template()
     *
     * @return array
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException If document doesn't exists
     */
    public function editAction($id)
    {
        $manager    = $this->getManager();
        $repository = $manager->getRepository();

        $organization = $repository->findOneById($id);

        if (!$organization) {
            throw $this->createNotFoundException('Unable to find Organization.');
        }

        $deleteForm     = $this->createDeleteForm($id);

        $formHandler    = $this->get('black_organization.organization.form.handler');
        $process        = $formHandler->process($organization);

        if ($process) {
            $manager->flush();

            return $this->redirect($this->generateUrl('admin_organization_edit', array('id' => $id)));
        }

        return array(
            'document'      => $organization,
            'form'          => $formHandler->getForm()->createView(),
            'delete_form'   => $deleteForm->createView()
        );
    }

    /**
     * Deletes a Organization document.
     *
     * @param integer $id
     * @param string  $token
     * 
     * @Method({"POST", "GET"})
     * @Route("/{id}/delete/{token}", name="admin_organization_delete")
     * @Secure(roles="ROLE_ADMIN")
     *
     * @return array
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException If document doesn't exists
     */
    public function deleteAction($id, $token = null)
    {
        $form       = $this->createDeleteForm($id);
        $request    = $this->getRequest();

        $form->bind($request);

        if (null !== $token) {
            $token = $this->get('form.csrf_provider')->isCsrfTokenValid('delete', $token);
        }

        if ($form->isValid() || true === $token) {

            $dm         = $this->getManager();
            $repository = $dm->getRepository();
            $document   = $repository->findOneById($id);

            if (!$document) {
                throw $this->createNotFoundException('Unable to find Organization document.');
            }

            $dm->remove($document);
            $dm->flush();

            $this->get('session')->getFlashBag()->add('success', 'success.organization.admin.organization.delete');

        } else {
            $this->get('session')->getFlashBag()->add('error', 'error.organization.admin.organization.not.valid');
        }

        return $this->redirect($this->generateUrl('admin_organizations'));
    }

    /**
     * Deletes a Organization document.
     *
     * @Method({"POST"})
     * @Route("/batch", name="admin_organization_batch")
     *
     * @return array
     *
     * @throws \Symfony\Component\Serializer\Exception\InvalidArgumentException If method does not exist
     */
    public function batchAction()
    {
        $request    = $this->getRequest();
        $token      = $this->get('form.csrf_provider')->isCsrfTokenValid('batch', $request->get('token'));

        if (!$ids = $request->get('ids')) {
            $this->get('session')->getFlashBag()->add('error', 'error.organization.admin.organization.no.item');

            return $this->redirect($this->generateUrl('admin_organizations'));
        }

        if (!$action = $request->get('batchAction')) {
            $this->get('session')->getFlashBag()->add('error', 'error.organization.admin.organization.no.action');

            return $this->redirect($this->generateUrl('admin_organizations'));
        }

        if (!method_exists($this, $method = $action . 'Action')) {
            throw new Exception\InvalidArgumentException(
                sprintf('You must create a "%s" method for action "%s"', $method, $action)
            );
        }

        if (false === $token) {
            $this->get('session')->getFlashBag()->add('error', 'error.organization.admin.organization.crsf');

            return $this->redirect($this->generateUrl('admin_organizations'));
        }

        foreach ($ids as $id) {
            $this->$method($id, $this->get('form.csrf_provider')->generateCsrfToken('delete'));
        }

        return $this->redirect($this->generateUrl('admin_organizations'));

    }

    protected function createDeleteForm($id)
    {
        $form = $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm();

        return $form;
    }

    /**
     * Returns the DocumentManager
     *
     * @return DocumentManager
     */
    protected function getManager()
    {
        return $this->get('black_organization.manager.organization');
    }
}
