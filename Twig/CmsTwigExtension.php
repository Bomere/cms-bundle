<?php
namespace Devtronic\CmsBundle\Twig;

use Devtronic\CmsBundle\Entity\Menu;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

class CmsTwigExtension extends \Twig_Extension
{

    /**
     * @var EntityManager
     */
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('cms_menu', array($this, 'menu'), array(
                'is_safe' => array('html'),
                'needs_environment' => true
            )),
        );
    }

    /**
     * @param string $menuSlug Slug of the menu
     * @param \Twig_Template $menuTemplate
     * @return string The rendered menu
     */
    public function menu(\Twig_Environment $twig, $menuSlug, $menuTemplate = 'CmsBundle::menu.html.twig')
    {
        $repo = $this->em->getRepository('CmsBundle:Menu');
        $menu = $repo->findOneBySlug($menuSlug);
        return $twig->render($menuTemplate, array('menu' => $menu));
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'cms_extension';
    }

}