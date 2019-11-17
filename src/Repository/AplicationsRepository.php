<?php

namespace App\Repository;

use App\Entity\Aplications;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Aplications|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aplications|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aplications[]    findAll()
 * @method Aplications[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AplicationsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aplications::class);
    }

    // /**
    //  * @return Aplications[] Returns an array of Aplications objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aplications
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
