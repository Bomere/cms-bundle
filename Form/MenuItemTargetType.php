<?php

namespace Devtronic\CmsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MenuItemTargetType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'choices' => array(
                0 => 'label.cms.admin.page_intern',
                1 => 'label.cms.admin.page_extern',
                2 => 'label.cms.admin.page_route',
            ),
        ));
    }


    public function getParent()
    {
        return ChoiceType::class;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'cmsbundle_targettype';
    }
}