<?php

namespace App\Repository;

use App\Entity\Bitcoin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Bitcoin>
 */
class BitcoinRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bitcoin::class);
    }

public function findBycheques():array
{
 $sql="SELECT * from bitcoin where cheque is not null order by cheque desc";
 return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAllAssociative();
}
public function findBycomptes():array
{
 $comptes= "('ccsg','cc boursorama','cb boursorama','cvi philippe','cvi nicole')";
 $sql="SELECT compte, round(sum(credit - debit),2) as solde 
       from bitcoin 
       where compte in $comptes and banque is not null 
       group by compte";
 return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAllAssociative();
}

public function findBynull(string $compte): array
{
 $sql="SELECT * 
       from bitcoin 
       where compte='$compte' and banque is null  and date<now() + INTERVAL 20 DAY 
       order by date desc";
 return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAllAssociative();
}

public function findBynotnull(string $compte): array
{
 $sql = "select * from bitcoin where compte='$compte' and banque is not null order by date desc limit 20";
 return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAllAssociative();
}
public function findByBudget(string $budget): array
{
 $sql="SELECT * from bitcoin where budget='$budget' order by date asc";
 return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAllAssociative();
}
public function findByyear(int $year): array
{
 $sql = "select budget, round(sum(credit),2) as cr, round(sum(debit), 2) as de, round(sum(credit-debit), 2) as solde
  from bitcoin where budget like '%$year' group by budget";
 return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAllAssociative();
}
public function findAllyear(int $year): array
{
$sql="SELECT  SUBSTRING(budget, -4) as annee,  ROUND(SUM(credit), 2) as cr,  ROUND(SUM(debit), 2) as de,  ROUND(SUM(credit - debit), 2) as solde
      FROM bitcoin
      WHERE SUBSTRING(budget, -4) BETWEEN 2010 AND 2027
      GROUP BY annee
      ORDER BY annee ASC";
return $this->getEntityManager()->getConnection()->executeQuery($sql)->fetchAllAssociative();
}


    //    /**
    //     * @return Bitcoin[] Returns an array of Bitcoin objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Bitcoin
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
