<?php

namespace App\Repository;

use App\Entity\Record;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Record|null find($id, $lockMode = null, $lockVersion = null)
 * @method Record|null findOneBy(array $criteria, array $orderBy = null)
 * @method Record[]    findAll()
 * @method Record[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecordRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Record::class);
    }

    /**
     * @return Record[] Returns an array of Record objects
    */
    public function searchRecords($params)
    {
        $qb = $this->createQueryBuilder('r')->orderBy('r.id', 'ASC')->setMaxResults(10);
        if(isset($params['id'])){
            $qb->andWhere('r.id = :id')->setParameter('id', $params['id']);
        }
        if(isset($params['title'])){
            $qb->andWhere('r.title = :title')->setParameter('title', $params['title']);
        }
        if(isset($params['description'])){
            $qb->andWhere('r.description LIKE :description')->setParameter('description', '%'.$params['description'].'%');
        }
        if(isset($params['created_at'])){
            $qb->andWhere('r.created_at = :created_at')->setParameter('created_at', $params['created_at']);
        }
        return $qb->getQuery()->getArrayResult();
    }

    // /**
    //  * @return Record[] Returns an array of Record objects
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
    public function findOneBySomeField($value): ?Record
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
