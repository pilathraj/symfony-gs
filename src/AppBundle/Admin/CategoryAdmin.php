<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use AppBundle\Entity\Category;
/**
 * Description of CategoryAdmin
 *
 * @author Pilathraj A
 */
class CategoryAdmin extends AbstractAdmin {
    
    protected function configureFormFields(FormMapper $form) {
       $form->add('name','text');
    }
    
    protected function configureDatagridFilters(DatagridMapper $filter) {
        $filter->add('name');
    }
    
    protected function configureListFields(ListMapper $list) {
        $list->add('name');
    }
    
    public function toString($object) {
       return $object instanceof Category
               ? $object->getName()
               : 'Category';
    }
    
    public function getDashboardActions()
    {
        $actions = parent::getDashboardActions();

        $actions['import'] = array(
            'label'              => 'Import',
            //'url'                => $this->generateUrl('import'),
            'url'                => '',
            'icon'               => 'import',
            'translation_domain' => 'SonataAdminBundle', // optional
            'template'           => 'SonataAdminBundle:CRUD:dashboard__action.html.twig', // optional
        );
        unset($actions['list']);  // To remove list form the admin list
        return $actions;
    }
}
