<?php

namespace Devtronic\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Menu
 *
 * @ORM\Table(name="menu")
 * @ORM\Entity(repositoryClass="Devtronic\CmsBundle\Repository\MenuRepository")
 */
class Menu
{
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=128, unique=true)
     */
    private $slug;

    /**
     * @var MenuItem[]
     *
     * @ORM\OneToMany(targetEntity="Devtronic\CmsBundle\Entity\MenuItem", mappedBy="menu")
     * @ORM\OrderBy({"position" = "ASC"})
     */
    private $items;


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
     * Set name
     *
     * @param string $name
     *
     * @return Menu
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     *
     * @return Menu
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @return MenuItem[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param MenuItem[] $items
     */
    public function setItems($items)
    {
        $this->items = $items;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add menuItem
     *
     * @param \Devtronic\CmsBundle\Entity\MenuItem $menuItem
     *
     * @return Menu
     */
    public function addMenuItem(\Devtronic\CmsBundle\Entity\MenuItem $menuItem)
    {
        $this->items[] = $menuItem;

        return $this;
    }

    /**
     * Remove menuItem
     *
     * @param \Devtronic\CmsBundle\Entity\MenuItem $menuItem
     */
    public function removeMenuItem(\Devtronic\CmsBundle\Entity\MenuItem $menuItem)
    {
        $this->items->removeElement($menuItem);
    }

    /**
     * Add item
     *
     * @param \Devtronic\CmsBundle\Entity\MenuItem $item
     *
     * @return Menu
     */
    public function addItem(\Devtronic\CmsBundle\Entity\MenuItem $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \Devtronic\CmsBundle\Entity\MenuItem $item
     */
    public function removeItem(\Devtronic\CmsBundle\Entity\MenuItem $item)
    {
        $this->items->removeElement($item);
    }
}
