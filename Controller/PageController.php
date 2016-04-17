<?php

namespace Devtronic\CmsBundle\Controller;

use Doctrine\ORM\EntityNotFoundException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageController extends Controller
{
    /**
     * @Route("/{slug}", name="cms_page")
     * @Template()
     */
    public function pageAction($slug)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository('CmsBundle:Page');

        $page = $repo->findOneBySlug($slug);



        return array('page' => $page);
    }

}
