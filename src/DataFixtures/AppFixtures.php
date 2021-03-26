<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use App\Entity\Disque;
use App\Entity\Genre;
use App\Entity\Producteur;
use App\Entity\Rayon;
use App\Repository\AuteurRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectManager;
use Faker;
use Doctrine\ORM\EntityManagerInterface;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        
        $genre = ['blues', 'disco', 'funk', 'country', 'folk', 'jazz', 'rock', 'reggae'];
        for($i = 0; $i < 8; $i++) {
            $g = new Genre();
            $g->setName($genre[$i]);
            $manager->persist($g);
        }

        for($i = 0; $i < 10; $i++) {
            $prod = new Producteur();
            $prod->setName($faker->name);
            $manager->persist($prod);
        }
        
        for($i = 0; $i < 5; $i++) {
            $rayon = new Rayon();
            $rayon->setName($faker->firstName);
            $manager->persist($rayon);
        }

        //making author
        for($i = 0; $i < 10; $i++) {
            $auteur = new Auteur();
            $auteur->setName($faker->name);
            $manager->persist($auteur);
        }

        $manager->flush();
        
        for($i = 0; $i < 20; $i++) {
            $disque = new Disque();
            $disque->setName($faker->word);
            $disque->setDate($faker->dateTime);

            //get data
            $auteur = $manager->getRepository(Auteur::class)->findAll();
            $rayon = $manager->getRepository(Rayon::class)->findAll();
            $prod = $manager->getRepository(Producteur::class)->findAll();
            $genre = $manager->getRepository(Genre::class)->findAll();

            //add data
            $disque->addAuteurId($auteur[rand(0,9)]);
            $disque->setRayonId($rayon[rand(0,4)]);
            $disque->addProducteurId($prod[rand(0,7)]);
            $disque->addGenreId($genre[rand(0,7)]);
            $manager->persist($disque);
        }

        $manager->flush();

    }
}
