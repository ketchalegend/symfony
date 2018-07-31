<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact")
     */
    public function contact(Request $request, \Swift_Mailer $mailer)
    {
        $form   =   $this->createForm(ContactType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

           $contactFormData =   $form->getData();

           dump($contactFormData);

           // Send email

            $message = (new \Swift_Message('Hubot FAQ'))
                ->setFrom($contactFormData['email'])
                ->setTo('e.ketchabepa@m3connect.de')
                ->setBody(
                    $contactFormData['question'],

                    'text/plain'

                )
            ;


            $mailer->send($message);

            $this->addFlash( 'success', 'Your message was sent successfully');

            return $this->redirectToRoute('contact');


        }

        return $this->render('contact/contact.html.twig', [
            'our_form'  =>  $form->createView()
        ]);
    }
}
