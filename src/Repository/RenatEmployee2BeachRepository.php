<?php

namespace App\Repository;

use App\Entity\RenatEmployee2Beach;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RenatEmployee2Beach|null find($id, $lockMode = null, $lockVersion = null)
 * @method RenatEmployee2Beach|null findOneBy(array $criteria, array $orderBy = null)
 * @method RenatEmployee2Beach[]    findAll()
 * @method RenatEmployee2Beach[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RenatEmployee2BeachRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RenatEmployee2Beach::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(RenatEmployee2Beach $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(RenatEmployee2Beach $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return RenatEmployee2Beach[] Returns an array of RenatEmployee2Beach objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RenatEmployee2Beach
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
