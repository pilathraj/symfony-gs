<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;  /* need for filter implementation*/
use Sonata\AdminBundle\Form\FormMapper;

use AppBundle\Entity\BlogPost;

/**
 * Description of BlogPostAdmin
 *
 * @author Pilathraj A
 */
class BlogPostAdmin  extends AbstractAdmin{
    
    protected function configureListFields(ListMapper $list) {
        $list->addIdentifier('title')  /* addIdentifier used to add the title with hyper link*/
                ->add('category.name') /* dot notation used to add the other model value */
               ->add('draft');
    }
    
    /**
     * 
     * @param FormMapper $form
     */
    protected function configureFormFields(FormMapper $form) {
        $form  ->tab('Post')
               ->with('Content',['class'=>'col-md-9'])
                ->add('title', 'text')
              ->add('body', 'textarea')
               ->end()
                ->with('Meta data',['class'=>'col-md-3'])
                /* add Category entity relation here */
              ->add('category',
                'sonata_type_model',
                [
                    'class' => 'AppBundle\Entity\Category',
                    'property' => 'name'
                ])
                ->end()
                ->end()
                ->tab('Info')
                ->add('draft','radio')
                ->end()
                ;
          
        
    }
    /**
     * 
     * @param BlogPost $object
     * @return type
     */
    public function toString($object) {
        return $object instanceof BlogPost
                ? $object->getTitle()
                : 'Blog Post';  // shown in the breadcrumb on the create view
    }
    
    public function configureDatagridFilters(DatagridMapper $filter) {
        $filter->add('title')
                ->add('category', null, array(), 'entity', array(
                'class'    => 'AppBundle\Entity\Category',
                'choice_label' => 'name', // In Symfony2: 'property' => 'name'
            ))
            ;
    }
}
