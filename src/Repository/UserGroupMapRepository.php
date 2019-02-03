<?php 

namespace App\Repository;

use App\Entity\UserGroupMap;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UserGroupMapRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserGroupMap::class);
    }

    public function getMembersInGroup($groupName = null){
    	$returnResult   = false;
    	if($groupName == null) return $returnResult;
    	else{
    		
    	}
    }
}