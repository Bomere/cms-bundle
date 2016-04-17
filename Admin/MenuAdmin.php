<?php

namespace Devtronic\CmsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class MenuAdmin extends Admin
{
    

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, array(
                'label' => 'label.cms.admin.menu_name',
            ))
            ->add('slug', null, array(
                'label' => 'label.cms.admin.menu_slug',
            ))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array(
                'label' => 'label.cms.admin.menu_name',
            ))
            ->add('slug', null, array(
                'label' => 'label.cms.admin.menu_slug',
            ));
    }

}