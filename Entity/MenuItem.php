<?php

namespace Devtronic\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MenuItem
 *
 * @ORM\Table(name="menu_item")
 * @ORM\Entity(repositoryClass="Devtronic\CmsBundle\Repository\MenuItemRepository")
 */
class MenuItem
{

    CONST TYPE_INTERN = 0;
    CONST TYPE_EXTERN = 1;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=100)
     */
    private $title;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="target_url", type="string", length=255, nullable=true)
     */
    private $targetUrl;

    /**
     * @var Page
     *
     * @ORM\ManyToOne(targetEntity="Devtronic\CmsBundle\Entity\Page")
     */
    private $targetPage;

    /**
     * @ORM\ManyToOne(targetEntity="Devtronic\CmsBundle\Entity\Menu", inversedBy="items", cascade={"persist"})
     */
    private $menu;

    /**
     * @var MenuItem
     *
     * @ORM\ManyToOne(targetEntity="Devtronic\CmsBundle\Entity\MenuItem", inversedBy="subItems")
     */
    private $parentItem;

    /**
     * @var MenuItem[]
     *
     * @ORM\OneToMany(targetEntity="Devtronic\CmsBundle\Entity\MenuItem", mappedBy="parentItem")
     */
    private $subItems;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subItems = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return MenuItem
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return MenuItem
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set target
     *
     * @param string $targetUrl
     *
     * @return MenuItem
     */
    public function setTargetUrl($targetUrl)
    {
        $this->targetUrl = $targetUrl;

        return $this;
    }

    /**
     * Get target
     *
     * @return string
     */
    public function getTargetUrl()
    {
        return $this->targetUrl;
    }

    /**
     * Set menu
     *
     * @param \Devtronic\CmsBundle\Entity\Menu $menu
     *
     * @return MenuItem
     */
    public function setMenu(\Devtronic\CmsBundle\Entity\Menu $menu = null)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return \Devtronic\CmsBundle\Entity\Menu
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Set parentItem
     *
     * @param \Devtronic\CmsBundle\Entity\MenuItem $parentItem
     *
     * @return MenuItem
     */
    public function setParentItem(\Devtronic\CmsBundle\Entity\MenuItem $parentItem = null)
    {
        $this->parentItem = $parentItem;

        return $this;
    }

    /**
     * Get parentItem
     *
     * @return \Devtronic\CmsBundle\Entity\MenuItem
     */
    public function getParentItem()
    {
        return $this->parentItem;
    }

    /**
     * Add subItem
     *
     * @param \Devtronic\CmsBundle\Entity\MenuItem $subItem
     *
     * @return MenuItem
     */
    public function addSubItem(\Devtronic\CmsBundle\Entity\MenuItem $subItem)
    {
        $this->subItems[] = $subItem;

        return $this;
    }

    /**
     * Remove subItem
     *
     * @param \Devtronic\CmsBundle\Entity\MenuItem $subItem
     */
    public function removeSubItem(\Devtronic\CmsBundle\Entity\MenuItem $subItem)
    {
        $this->subItems->removeElement($subItem);
    }

    /**
     * Get subItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubItems()
    {
        return $this->subItems;
    }

    /**
     * Set targetPage
     *
     * @param \Devtronic\CmsBundle\Entity\Page $targetPage
     *
     * @return MenuItem
     */
    public function setTargetPage(\Devtronic\CmsBundle\Entity\Page $targetPage = null)
    {
        $this->targetPage = $targetPage;

        return $this;
    }

    /**
     * Get targetPage
     *
     * @return \Devtronic\CmsBundle\Entity\Page
     */
    public function getTargetPage()
    {
        return $this->targetPage;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
