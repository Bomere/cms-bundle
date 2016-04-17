<?php

namespace Devtronic\CmsBundle\Admin;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class PageAdmin extends Admin
{
    

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', null, array(
                'label' => 'label.cms.admin.page_title',
            ))
            ->add('slug', null, array(
                'label' => 'label.cms.admin.page_slug',
            ))
            ->add('content', CKEditorType::class, array(
            ))
            ->add('isPublic', null, array(
                'label' => 'label.cms.admin.page_is_public',
            ))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title', null, array(
            'label' => 'label.cms.admin.page_title',
        ));
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, array(
                'label' => 'label.cms.admin.page_title',
            ))
            ->add('isPublic', null, array(
                'label' => 'label.cms.admin.page_is_public',
            ))
        ;
    }
}