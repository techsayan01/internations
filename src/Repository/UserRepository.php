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
    public function findByIsAdmin($username = null): array
    {
        $test = "p.username = " . $username;
        
        // echo $username;
        $qb = $this->createQueryBuilder('p')
        		->andWhere('p.isAdmin = 1');
        // var_dump($qb);

        return $qb->getQuery()->getResult();
    }
}