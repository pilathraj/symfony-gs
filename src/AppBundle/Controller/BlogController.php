<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Description of BlogController
 *
 * @author Pilathraj A
 */
class BlogController extends Controller {
    
    
    /**
     * @Route("/blog/{page}", name="blog_list", requirements={"page":"\d+"})
     */
    public function listAction($page = 1) {
        return new \Symfony\Component\HttpFoundation\Response("list");
    }
    
    
    /**
     * @Route("/blog/{show}", name="blog_show")
     */    
    public function showAction($show) {
        return new \Symfony\Component\HttpFoundation\Response("show");
    }
    
    /**
     * @Route("/page", name="page")
     */
    public function pageAction() {
        throw $this->createNotFoundException("Page not found");
    }
    
    /**
     * @Route("/json", name="json")
     * @return json
     */
    
    public function getJsonAction() {
        return $this->json(['name'=>"pilathraj", 'age'=> 22]);
    }
}
