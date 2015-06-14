<?php
namespace Lpi\NewsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class FacebookVideoContentAdmin extends Admin
{

    protected $translationDomain = 'LpiNewsBundle';

    protected function configureFormFields(FormMapper $form)
    {

        $form

            ->add('title', null, ['label'=>'Titre'])
            ->add('link', null, ['label'=>'Lien'])
            ->add('isEnabled', null, ['label'=>'Est active'])
            ->end();

    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('title')
            ->add('isEnabled',null, ['label' => 'Est active', 'editable'=>true]);
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter
            ->add('title', null, ['label'=>'Titre'])
            ->add('isEnabled', null, ['label'=>'Est active']);
    }

    protected function configureShowFields(ShowMapper $filter)
    {
        $filter->add('title');
    }


}