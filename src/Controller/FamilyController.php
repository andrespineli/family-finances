<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Family;
use App\Form\NewFamilyFormType;
use Symfony\Component\HttpFoundation\Request;
use App\Form\AddMemberFormType;

class FamilyController extends AbstractController
{
    /**
     * @Route("/family/new", name="new_family")
     */
    public function new(Request $request)
    {
        $family = new Family;
        $family->addUser($this->getUser());
        //print_r($family->getName());
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
     * @Route("/family/add", name="add_member")
     */
    public function add(Request $request)
    {
        $user = $this->getUser();

        $form = $this->createForm(AddMemberFormType::class);
        $form->handleRequest($request);
        
        return $this->render('family/add.html.twig', [
            'families' => $user->getFamilies(),
            'form' => $form->createView()
        ]);
    }
}
