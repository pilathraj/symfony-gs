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
}
