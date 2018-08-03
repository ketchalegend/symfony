<?php
namespace App\Controller;

use App\Entity\Hubotfaq;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;






class DataController extends Controller
{
    /**
     * @Route("/data", name="data")
     */
    public function data()
    {

        $hubotfaq= $this->getDoctrine()->getRepository(Hubotfaq::class)->findAll();


        return $this->render('data/data.html.twig', array(

            'hubotfaq'  =>  $hubotfaq

        ));
    }

    /**
     * @Route("/", name="create")
     * @Method({"GET", "POST"})
     */
    public function home(Request $request)
    {

        $hubotfaq = new Hubotfaq();

        $form = $this->createFormBuilder($hubotfaq)
            ->add('email', TextType::class, [
                'attr' => [
                    'class' => 'form-control form-control-lg',
                    'placeholder' => 'Please enter your m3connect email'
                ]

            ])
            ->add('question', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control form-control-lg',
                    'placeholder' => 'wie deploy ich conn4 ?'
                ]

            ])
            ->add('answer', TextareaType::class,[
                'attr' => [
                    'class' => 'form-control form-control-lg',
                    'placeholder' => 'dazu musst du bitte folgende dokumentation beachten...'
                ]

            ])
            ->add('submit', SubmitType::class, array(
                'label' => 'Erstellen',
                'attr'  => array('class' => 'btn btn primary mt-3 btn btn-success')
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $hubotfaq = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hubotfaq);
            $entityManager->flush();

            $this->addFlash('success', 'The form was sent successfully. Thankyou!');

            return $this->redirectToRoute('create');


        }


        return $this->render('home.html.twig', array(
            'form' => $form->createView()


        ));
    }

    /**
     * @Route("/edit/{id}", name="edit")
     * @Method({"GET", "POST"})
     */

    public function edit(Request $request, $id)
    {

        $hubotfaq = new Hubotfaq();
        $hubotfaq = $this->getDoctrine()->getRepository(Hubotfaq::class)->find($id);

        $form = $this->createFormBuilder($hubotfaq)
            ->add('email', EmailType::class, array(
                'attr' =>
                    array('class' => 'form-control')
            ))
            ->add('question', TextareaType::class, array(
                'attr' =>
                    array('class' => 'form-control')
            ))
            ->add('answer', TextareaType::class, array(
                'attr' =>
                    array('class' => 'form-control')
            ))
            ->add('submit', SubmitType::class, array(
                'label' => 'Update',
                'attr'  => array('class' => 'btn btn primary mt-3')
            ))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();


            return $this->redirectToRoute('data');


        }

        return $this->render('edit.html.twig', array(
            'form' => $form->createView()


        ));
    }
    /**
     * @Route("/delete/{id}")
     * @Method({"DELETE"})
     */

    public function delete(Request $request, $id)
    {
        $hubotfaq = $this->getDoctrine()->getRepository(Hubotfaq::class)->find($id);


        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($hubotfaq);
        $entityManager->flush();

        $response = new Response();
        $response->send();


    }



//    /**
//     * @Route("/hubotfaq/save")
//     */
//    public function save() {
//        $entityManager  =   $this->getDoctrine()->getManager();
//
//        $hubotfaq   =  new Hubotfaq();
//
//        $hubotfaq->setEmail('kbepa1@yahoo.com');
//        $hubotfaq->setQuestion('deploy ich conn4');
//        $hubotfaq->setAnswer('dokumentation beachten');
//
//        $entityManager->persist($hubotfaq);
//
//        $entityManager->flush();
//
//        return new Response('Saves an FAQ with the id of '.$hubotfaq->getID());
//    }

}
