<?php

namespace App\Repository;

use App\Entity\MedicijnController;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MedicijnController|null find($id, $lockMode = null, $lockVersion = null)
 * @method MedicijnController|null findOneBy(array $criteria, array $orderBy = null)
 * @method MedicijnController[]    findAll()
 * @method MedicijnController[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MedicijnControllerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MedicijnController::class);
    }

    // /**
    //  * @return MedicijnController[] Returns an array of MedicijnController objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MedicijnController
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
