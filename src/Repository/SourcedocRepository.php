<?php

namespace App\Repository;

use App\Entity\Sourcedoc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sourcedoc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sourcedoc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sourcedoc[]    findAll()
 * @method Sourcedoc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SourcedocRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sourcedoc::class);
    }

    // /**
    //  * @return Sourcedoc[] Returns an array of Sourcedoc objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Sourcedoc
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
