<?php

namespace App\Repository;

use App\Entity\Disque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Disque|null find($id, $lockMode = null, $lockVersion = null)
 * @method Disque|null findOneBy(array $criteria, array $orderBy = null)
 * @method Disque[]    findAll()
 * @method Disque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DisqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Disque::class);
    }

    public function findWithFullData($id)
    {
        $builder = $this->createQueryBuilder('disque');
        $builder->where("disque.id=:id");
        $builder->setParameter('id', $id);
        //add join auteur
        $builder->leftJoin('disque.AuteurId', 'auteur');
        $builder->addSelect('auteur');
        //add join auteur
        $builder->leftJoin('disque.ProducteurId', 'producteur');
        $builder->addSelect('producteur');
        //add join auteur
        $builder->leftJoin('disque.RayonId', 'rayon');
        $builder->addSelect('rayon');
        //add join auteur
        $builder->leftJoin('disque.GenreId', 'genre');
        $builder->addSelect('genre');

        $query = $builder->getQuery();
        $result = $query->getOneOrNullResult();

        return $result;

    }
}
