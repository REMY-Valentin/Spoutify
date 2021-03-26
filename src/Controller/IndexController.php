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
}
