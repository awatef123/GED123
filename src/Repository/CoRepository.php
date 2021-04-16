<?php

namespace App\Repository;

use App\Entity\Co;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Co|null find($id, $lockMode = null, $lockVersion = null)
 * @method Co|null findOneBy(array $criteria, array $orderBy = null)
 * @method Co[]    findAll()
 * @method Co[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Co::class);
    }

    // /**
    //  * @return Co[] Returns an array of Co objects
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
    public function findOneBySomeField($value): ?Co
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
