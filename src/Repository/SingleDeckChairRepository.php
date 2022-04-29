<?php

namespace App\Repository;

use App\Entity\SingleDeckChair;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SingleDeckChair|null find($id, $lockMode = null, $lockVersion = null)
 * @method SingleDeckChair|null findOneBy(array $criteria, array $orderBy = null)
 * @method SingleDeckChair[]    findAll()
 * @method SingleDeckChair[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SingleDeckChairRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SingleDeckChair::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(SingleDeckChair $entity, bool $flush = true): void
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
    public function remove(SingleDeckChair $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return SingleDeckChair[] Returns an array of SingleDeckChair objects
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
    public function findOneBySomeField($value): ?SingleDeckChair
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
