<?php

namespace App\Repository;

use App\Entity\Twitt;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Twitt|null find($id, $lockMode = null, $lockVersion = null)
 * @method Twitt|null findOneBy(array $criteria, array $orderBy = null)
 * @method Twitt[]    findAll()
 * @method Twitt[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TwittRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Twitt::class);
    }

    // /**
    //  * @return Twitt[] Returns an array of Twitt objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Twitt
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
