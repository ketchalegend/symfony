<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class WelcomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        return $this->render('home.html.twig', array (
            'title' => 'Hubot m3connect',
            'menu_title'   =>  'Hubot FAQ',
            'menu2' =>  'Hubot Commands',
            'menu3' =>  'Login',

        ));
    }

}
