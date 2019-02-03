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
        $whereCondition = "p.username = '" . $username . "'";
        
        $qb = $this->createQueryBuilder('p')
                ->where("$whereCondition");
        $result = $qb->getQuery()->getResult();
        foreach ($result as $key => $value) {
            if($value['is_deleted'] == 0 && $value['is_admin'] == 1){
                $boolResult = true;
            }
        }
        return $boolResult; 
    }
}