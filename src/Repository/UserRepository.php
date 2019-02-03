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
<<<<<<< HEAD
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
=======
        
        // echo $test; die;
        $qb = $this->createQueryBuilder('p')
                ->where("$whereCondition");
        $result = $qb->getQuery()->getResult();
        $boolResult = false;

        if(!empty($result)) foreach ($result as $key => $value) {
            if($value['is_deleted'] == 0 && $value['is_admin'] == 1){
                $boolResult = true;
            }
        }

        return $boolResult; 
>>>>>>> a9b15d3deb4b5521da88146f870ac30afed653f3
    }
}
