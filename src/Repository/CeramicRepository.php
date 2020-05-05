<?php

namespace App\Repository;

use App\Entity\Ceramic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Ceramic|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ceramic|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ceramic[]    findAll()
 * @method Ceramic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CeramicRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ceramic::class);
    }

    // /**
    //  * @return Ceramic[] Returns an array of Ceramic objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ceramic
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
