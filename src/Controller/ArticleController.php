<?php
/**
 * Created by PhpStorm.
 * User: eketchabepa
 * Date: 27.07.2018
 * Time: 09:25
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    /**
     * @Route("/")
     */

    public function homepage ()
    {
        return new Response('That really works');
    }


    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {

        return new Response(sprintf(
           'Future page to show the article: %s',
           $slug
        ));
    }
}