<?php

namespace App\Controller;

use App\Entity\Disque;
use App\Form\DisqueType;
use App\Repository\DisqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/disque")
 */
class DisqueController extends AbstractController
{
    /**
     * @Route("/", name="disque_index", methods={"GET"})
     */
    public function index(DisqueRepository $disqueRepository): Response
    {
        $idRange =  $this->getDoctrine()
            ->getRepository(Disque::class)
            ->findAll();
        //dd($idRange));
        for ($i = 0; $i < count($idRange); $i++) {
            $disque[] = $this->getDoctrine()
                ->getRepository(Disque::class)
                ->findWithFullData($idRange[$i]->getId());
        }
        
        //dd($disque[0]->getRayonId()->getId());
        $data = [];
        for($i = 0; $i < count($disque); $i++) {
            $data[] = [
                $disque[$i]->getId(),
                $disque[$i]->getName(),
                $disque[$i]->getDate(),   
                [
                    $disque[$i]->getAuteurId()->toArray()[0]->getId(),
                    $disque[$i]->getAuteurId()->toArray()[0]->getName(),
                ],
                [
                    $disque[$i]->getProducteurId()->toArray()[0]->getId(),
                    $disque[$i]->getProducteurId()->toArray()[0]->getName(),
                ],
                [
                    $disque[$i]->getRayonId()->getId(),
                    $disque[$i]->getRayonId()->getName(),
                ],
                [
                    $disque[$i]->getGenreId()->toArray()[0]->getId(),
                    $disque[$i]->getGenreId()->toArray()[0]->getName(),
                ],         
            ];
            
        };
        //dd($data);
        return $this->json($data);
    }

    /**
     * @Route("/new", name="disque_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $disque = new Disque();
        $form = $this->createForm(DisqueType::class, $disque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($disque);
            $entityManager->flush();

            return $this->redirectToRoute('disque_index');
        }

        return $this->render('disque/new.html.twig', [
            'disque' => $disque,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="disque_show", methods={"GET"})
     */
    public function show(Disque $disque): Response
    {
        return $this->render('disque/show.html.twig', [
            'disque' => $disque,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="disque_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Disque $disque): Response
    {
        $form = $this->createForm(DisqueType::class, $disque);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('disque_index');
        }

        return $this->render('disque/edit.html.twig', [
            'disque' => $disque,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="disque_delete", methods={"POST"})
     */
    public function delete(Request $request, Disque $disque): Response
    {
        if ($this->isCsrfTokenValid('delete'.$disque->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($disque);
            $entityManager->flush();
        }

        return $this->redirectToRoute('disque_index');
    }
}
