<?php

namespace App\Repository;

use App\Entity\GroupDetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class GroupDetailsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GroupDetails::class);
    }
    /**
     * @param $username
     * @return boolean
     */
    public function findByIsAdmin($username = null): array
    {
        //converting the 
        $qb = $this->createQueryBuilder('p')
        		->andWhere('p.isAdmin = :username');
        return $qb->getQuery()->getResult();
    }
}