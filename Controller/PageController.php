<?php

namespace Devtronic\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends Controller
{
    /**
     * @Route("/", name="cms_index")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('CmsBundle:Page');

        $page = $repo->findOneByIsHome(1);

        return array('page' => $page);
    }

    /**
     * @Route("/{slug}", name="cms_page")
     * @Template()
     */
    public function pageAction($slug)
    {
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository('CmsBundle:Page');

        $page = $repo->findOneBySlug($slug);

        return array('page' => $page);
    }

}
