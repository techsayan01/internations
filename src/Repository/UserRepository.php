<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * @param $username
     * @return boolean
     */
    public function findByIsAdmin($username = null): ?bool
    {
        $returnResult   = false;
        $whereCondition = "p.username = '" . $username . "'";
        if($username == null) return $returnResult;
        $qb = $this->createQueryBuilder('p')
                   ->where("$whereCondition");
        $queryObject = $qb->getQuery()->getResult();
        $returnResult = ($queryObject[0]->getIsAdmin() == true && $queryObject[0]->getIsDeleted() == false) ? true : false;
        return $returnResult; 
    }

    public function findByUsername($username = null): array
    {
        $returnResult   = false;
        $whereCondition = "p.username = '" . $username . "'"; 
        if($username == null) return $returnResult;
        else{
            $qb = $this->createQueryBuilder('p')
                       ->where("$whereCondition");
            $queryObject = $qb->getQuery()->getResult();
            $returnResult = $queryObject[0]->getIsDeleted() ? $queryObject : false;
        }
        return $returnResult;   
    }
}
