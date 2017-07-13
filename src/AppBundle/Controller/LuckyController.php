<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**         
 * Description of LuckyController
 *
 * @author Pilathraj A
 */
class LuckyController extends Controller {
    /**
     * @Route(" lucky/number")
     */
    public function numberAction()
    {
        $number = mt_rand(0,100);
        /*return  new Response(
            '<html><body>Lucky number:'.$number.'</body></html>'
            );
        */
        
        return $this->render('lucky/number.html.twig', [
            'number' => $number,
        ]);
        
    }
}
