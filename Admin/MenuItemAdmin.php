<?php

namespace Devtronic\CmsBundle\Admin;

use Devtronic\CmsBundle\Form\MenuItemTargetType;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MenuItemAdmin extends Admin
{
    

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('label.cms.admin.menu_item_generic', array('class' => 'col-md-9'))
                ->add('title', null, array(
                    'label' => 'label.cms.admin.menu_item_title',
                ))
                ->add('menu', null, array(
                    'label' => 'label.cms.admin.menu',
                ))
                ->add('parentItem', null, array(
                    'label' => 'label.cms.admin.menu_item_parent',
                ))
                ->end()
            ->with('label.cms.admin.menu_item_target', array('class' => 'col-md-3'))
                ->add('type', MenuItemTargetType::class, array(
                    'label' => 'label.cms.admin.menu_item_type',
                ))
                ->add('targetPage', null, array(
                    'label' => 'label.cms.admin.menu_item_target_page',
                ))
                ->add('targetUrl', null, array(
                    'label' => 'label.cms.admin.menu_item_target_address'
                ))
            ->end()
        ;
    }


    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('type', null, array(
            'label' => 'label.cms.admin.menu_item_type',
        ), MenuItemTargetType::class)
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, array(
                'label' => 'label.cms.admin.menu_item_title',
            ))
            ->add('parentItem', null, array(
                'label' => 'label.cms.admin.menu_item_parent',
            ))
            ->add('menu', null, array(
                'label' => 'label.cms.admin.menu',
            ))
        ;
    }

}