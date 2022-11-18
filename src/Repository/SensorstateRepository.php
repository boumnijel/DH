<?php

namespace App\Repository;

use App\Entity\Sensorstate;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Sensorstate|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sensorstate|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sensorstate[]    findAll()
 * @method Sensorstate[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SensorstateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Sensorstate::class);
    }

    // /**
    //  * @return Sensorstate[] Returns an array of Sensorstate objects
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
    public function findOneBySomeField($value): ?Sensorstate
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
