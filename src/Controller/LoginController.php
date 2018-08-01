<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $utils)
    {
        $error = $utils->getLastAuthenticationError();

        $lastusername = $utils->getLastUsername();

        return $this->render('login/login.html.twig', [
            'title' => 'Hubot | Login',
            'error' => $error,
            'last_username' => $lastusername
        ]);
    }
    /**
     * @Route("/logout", name="logout")
     */

    public function logout()
    {

    }
}
