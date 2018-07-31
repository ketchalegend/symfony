<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HubotCommandsController extends Controller
{
    /**
     * @Route("/commands", name="hubot_commands")
     */
    public function hubot_commands()
    {
        return $this->render('hubot_commands.html.twig', array (
            'title' => 'Hubot commands',

        ));
    }
}
