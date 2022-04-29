<?php

namespace App\Repository;

use App\Entity\ControlStat2Controller;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ControlStat2Controller|null find($id, $lockMode = null, $lockVersion = null)
 * @method ControlStat2Controller|null findOneBy(array $criteria, array $orderBy = null)
 * @method ControlStat2Controller[]    findAll()
 * @method ControlStat2Controller[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ControlStat2ControllerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ControlStat2Controller::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ControlStat2Controller $entity, bool $flush = true): void
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
    public function remove(ControlStat2Controller $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ControlStat2Controller[] Returns an array of ControlStat2Controller objects
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
    public function findOneBySomeField($value): ?ControlStat2Controller
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
