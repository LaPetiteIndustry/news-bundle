<?php

namespace Lpi\NewsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;

class ZoneHasNewsAdmin extends Admin
{
    protected $translationDomain = 'LpiNewsBundle';

    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     *
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $link_parameters = array();

        if ($this->hasParentFieldDescription()) {
            $link_parameters = $this->getParentFieldDescription()->getOption('link_parameters', array());
        }

        $formMapper
            ->add('news', 'sonata_type_model_list', array('required' => false), array(
                'link_parameters' => $link_parameters
            ))
            ->add('position', 'hidden');
    }

    /**
     * @param  \Sonata\AdminBundle\Datagrid\ListMapper $listMapper
     * @return void
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('news')
            ->add('zone')
            ->add('position');
    }
}
