<?php

namespace App\Controller;

use App\Entity\Disque;
use App\Entity\Auteur;
use App\Entity\Genre;
use App\Entity\Producteur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
       
        return $this->render('index/index.html.twig');
    }

    /**
     * @Route("/disque-detail/{id}", name="get-data")
     */
    public function disqueDetail (Int $id)
    {
        $disque = $this->getDoctrine()
                ->getRepository(Disque::class)
                ->find($id);
        //dd($disque);
        return $this->render('index/disqueDetail.html.twig',[
            'disque' => $disque
        ]);
    }

    /**
     * @Route("/navbar", name="get-navbar")
     */
    public function navbarInfo ()
    {
        $genre = $this->getDoctrine()
            ->getRepository(Genre::class)
            ->findAll();
        $auteur = $this->getDoctrine()
            ->getRepository(Auteur::class)
            ->findAll();
        $producteur = $this->getDoctrine()
            ->getRepository(Producteur::class)
            ->findAll();

        for($i = 0; $i < count($genre); $i++) {
            $a[] = [
                $genre[$i]->getId(),
                $genre[$i]->getName(),             
            ];
            
        };
        for($i = 0; $i < count($auteur); $i++) {
            $b[] = [
                $auteur[$i]->getId(),
                $auteur[$i]->getName(),             
            ];
            
        };
        for($i = 0; $i < count($producteur); $i++) {
            $c[] = [
                $producteur[$i]->getId(),
                $producteur[$i]->getName(),             
            ];
            
        };
        $data = ["genre" => $a, "auteur" => $b, "producteur" => $c];
        return $this->json($data);
        //dd($a, $b, $c);
    }
}
