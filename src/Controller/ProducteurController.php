<?php

namespace App\Controller;

use App\Entity\Producteur;
use App\Form\ProducteurType;
use App\Repository\ProducteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/producteur")
 */
class ProducteurController extends AbstractController
{
    /**
     * @Route("/", name="producteur_index", methods={"GET"})
     */
    public function index(ProducteurRepository $producteurRepository): Response
    {
        $producteur = $this->getDoctrine()
            ->getRepository(Producteur::class)
            ->findAll();
        $data = [];
        for($i = 0; $i < count($producteur); $i++) {
            $data[] = [
                $producteur[$i]->getId(),
                $producteur[$i]->getName(),             
            ];
            
        };
        
        return $this->json($data);
    }

    /**
     * @Route("/new", name="producteur_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $producteur = new Producteur();
        $form = $this->createForm(ProducteurType::class, $producteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($producteur);
            $entityManager->flush();

            return $this->redirectToRoute('producteur_index');
        }

        return $this->render('producteur/new.html.twig', [
            'producteur' => $producteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="producteur_show", methods={"GET"})
     */
    public function show(Producteur $producteur): Response
    {
        return $this->render('producteur/show.html.twig', [
            'producteur' => $producteur,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="producteur_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Producteur $producteur): Response
    {
        $form = $this->createForm(ProducteurType::class, $producteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('producteur_index');
        }

        return $this->render('producteur/edit.html.twig', [
            'producteur' => $producteur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="producteur_delete", methods={"POST"})
     */
    public function delete(Request $request, Producteur $producteur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$producteur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($producteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('producteur_index');
    }
}
