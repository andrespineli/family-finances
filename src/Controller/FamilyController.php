<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Family;
use App\Form\NewFamilyFormType;
use Symfony\Component\HttpFoundation\Request;

class FamilyController extends AbstractController
{
    /**
     * @Route("/family/new", name="new_family")
     */
    public function new(Request $request)
    {
        $family = new Family;
        $form = $this->createForm(NewFamilyFormType::class, $family);
        $form->handleRequest($request);       

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($family);
            $em->flush();
        }

        return $this->render('family/new.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/family/join", name="join_family")
     */
    public function join()
    {
        return $this->render('family/join.html.twig', [
            'controller_name' => 'FamilyController',
        ]);
    }
}
