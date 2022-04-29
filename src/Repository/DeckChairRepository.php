<?php

namespace App\Repository;

use App\Entity\Beach;
use App\Entity\DeckChair;
use App\Entity\Pair;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DeckChair|null find($id, $lockMode = null, $lockVersion = null)
 * @method DeckChair|null findOneBy(array $criteria, array $orderBy = null)
 * @method DeckChair[]    findAll()
 * @method DeckChair[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DeckChairRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DeckChair::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(DeckChair $entity, bool $flush = true): void
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
    public function remove(DeckChair $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return DeckChair[] Returns an array of DeckChair objects
    //  */

    public function findByCompanyId($companyId, $beachId)
    {
        return $this->createQueryBuilder('deckChair')
            ->innerJoin('deckChair.pair', 'pair')
            ->addSelect('pair')
            ->innerJoin('pair.beach', 'beach')
            ->addSelect('beach')
            ->innerJoin('beach.company', 'company')
            ->addSelect('company')
            //->innerJoin('deckChair.bookings', 'bookings')
            //->addSelect('bookings')
            //->andWhere('bookings.company = :val')
            ->andWhere('company = :val')
            ->andWhere('pair.beach = :val2')
            ->setParameter('val', $companyId)
            ->setParameter('val2', $beachId)
            ->orderBy('deckChair.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getArrayResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?DeckChair
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
