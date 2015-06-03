<?php
namespace Lpi\NewsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class NewsAdmin extends Admin
{

    protected $translationDomain = 'LpiNewsBundle';

    protected function configureFormFields(FormMapper $form)
    {

        $form
            ->with($this->trans('Informations'), array('class' => 'col-md-7'))
            ->add('title')
            ->add('header')
            ->add('excerpt')
            ->add('date', 'sonata_type_datetime_picker', ['dp_language' => 'fr_FR'])
            ->add('content', 'sonata_formatter_type', array(
                'event_dispatcher' => $form->getFormBuilder()->getEventDispatcher(),
                'format_field' => 'contentFormatter',
                'source_field' => 'rawContent',
                'source_field_options' => array(
                    'horizontal_input_wrapper_class' => $this->getConfigurationPool()->getOption('form_type') == 'horizontal' ? 'col-lg-12' : '',
                    'attr' => array('class' => $this->getConfigurationPool()->getOption('form_type') == 'horizontal' ? 'span10 col-sm-10 col-md-10' : '', 'rows' => 20)
                ),
                'ckeditor_context' => 'news',
                'target_field' => 'content',
                'listener' => true,
            ))
            ->add('youtubeId')
            ->end()
            ->with($this->trans('Images'), array('class' => 'col-md-5'))
            ->add('image', 'sonata_type_model_list', ['required' => false], ['link_parameters' => ['context' => 'news']])
            ->add('image_slider', 'sonata_type_model_list', ['required' => false], ['link_parameters' => ['context' => 'slider']])
            ->add('gallery', 'sonata_type_model_list', ['required' => false], ['link_parameters' => ['context' => 'news']]);
    }

    protected function configureListFields(ListMapper $list)
    {
        $list->addIdentifier('title')->add('date');
    }

    protected function configureDatagridFilters(DatagridMapper $filter)
    {
        $filter->add('title');
    }

    protected function configureShowFields(ShowMapper $filter)
    {
        $filter->add('title');
    }


}