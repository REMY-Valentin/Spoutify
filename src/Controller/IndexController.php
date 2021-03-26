<?php

namespace App\Controller;

use App\Entity\Disque;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $items = $this->getDoctrine()
            ->getRepository(Disque::class)
            ->findAll();
        //dump($items);
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'items' => $items

        ]);
    }

    /**
     * @Route("/get-data", name="get-data")
     */
    public function getData()
    {
        $items = $this->getDoctrine()
            ->getRepository(Disque::class)
            ->findAll();
        $data = [];
        for($i = 0; $i < count($items); $i++) {
            $data[] = [
                $items[$i]->getId(),
                $items[$i]->getName(),
                $items[$i]->getDate(),                
            ];
            
        };
        
        return $this->json($data);
    }
}
