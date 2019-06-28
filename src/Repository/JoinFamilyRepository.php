<?php

namespace App\Repository;

use App\Entity\JoinFamily;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method JoinFamily|null find($id, $lockMode = null, $lockVersion = null)
 * @method JoinFamily|null findOneBy(array $criteria, array $orderBy = null)
 * @method JoinFamily[]    findAll()
 * @method JoinFamily[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoinFamilyRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, JoinFamily::class);
    }

    // /**
    //  * @return JoinFamily[] Returns an array of JoinFamily objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('j.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?JoinFamily
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
