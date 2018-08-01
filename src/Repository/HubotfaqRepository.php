<?php

namespace App\Repository;

use App\Entity\Hubotfaq;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Hubotfaq|null find($id, $lockMode = null, $lockVersion = null)
 * @method Hubotfaq|null findOneBy(array $criteria, array $orderBy = null)
 * @method Hubotfaq[]    findAll()
 * @method Hubotfaq[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HubotfaqRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Hubotfaq::class);
    }

//    /**
//     * @return Hubotfaq[] Returns an array of Hubotfaq objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Hubotfaq
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
