<?php

namespace App\Controller\AdminGroup;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\GroupDetails;
use App\Entity\User;
use App\Entity\UserGroupMap;

class AdminGroupController extends AbstractController {
	
    private function message($code = NULL){
        $returnResult = false;
        if($code != NULL || $code != ''){
            $message = [
                "401" => "Parameter mismatch",
                "402" => "Content Not Found",
                "403" => "Ran into exception",
                "200" => "Created Successfully",
                "201" => "Successfully Updated",
                "202" => "Successfully deleted",
                "203" => "User not present",
                "204" => "Group Deleted"
                "205" => "Group can't be deleted, user present"
            ];
            $returnResult = $message[$code];
        }
        return $returnResult;
    }

    private function isAdmin($username = NULL){
        $returnResult = false;
        if($username == NULL) return false;
        else{
          $isAdmin = $this->getDoctrine()
                          ->getRepository(User::class)
                          ->findByIsAdmin($username); 
                          // var_dump($isAdmin); die; 
          $returnResult = $isAdmin[0]->getIsDeleted();
        }
        return $returnResult;
    }

	/**
     * @Route("/group/create", methods={"POST"}, name="app_internations_post_group_add")
     */
    public function createGroup(Request $request){

    	$request->getPreferredLanguage(['en']);
    	$request->headers->get('content-type');

        $setData = [];

    	$payload = [
			'groupName'   => $request->request->get('groupName'),
			'adminUname'  => $request->request->get('adminUname')
		];

		$groupObject    = new GroupDetails();
        $userObject     = new User();
        if($this->isAdmin($payload['adminUname'])){
            try {
                $groupObject->setGroupName($payload['groupName']);
                $entityManager->persist($groupObject);
                $entityManager->flush();
                
                return new JsonResponse([
                    'success' => true,
                    'code'    => 200,
                    'message' => $this->message("200"),
                    'data'    => $setData  
                ]);
            }
            catch(\Exception $exception) {
                
                return new JsonResponse([
                    'success' => false,
                    'code'    => 402,
                    'message' => $exception->getMessage(),
                    'data'    => $setData
                ]);
            }
        }
    }

    /**
     * @Route("/group/addUser", methods={"POST"}, name="app_internations_post_group_addUser")
     */

    public function addUserToGroup(Request $request){

        $request->getPreferredLanguage(['en']);
        $request->headers->get('content-type');
        $setData = [];

        $payload = [
            'username'    => $request->request->get('uname'),
            'groupName'   => $request->request->get('groupName'),
            'adminUname'  => $request->request->get('adminUname')
        ];
        $userGroupMap = new UserGroupMap();

        $userMap = $this->getDoctrine()
                          ->getRepository(User::class)
                          ->findBy(['username' => $payload['username']]);
        $userId = count($userMap) > 0 ? $userMap[0]->getUserId() : false;

        $groupMap = $this->getDoctrine()
                        ->getRepository(GroupDetails::class)
                        ->findBy(['groupName' => $payload['groupName']]);
        $groupId = count($groupMap) > 0 ? $groupMap[0]->getGroupId() : false;
        if($userId && $groupId && $this->isAdmin($payload['adminUname'])){
            $userGroupMap->setGroupId($groupId);
            $userGroupMap->setUserId($userId);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userGroupMap);
            $entityManager->flush();

            try {                
                
                return new JsonResponse([
                    'success' => true,
                    'code'    => 200,
                    'message' => $this->message("200"),
                    'data'    => $setData  
                ]);
            }
            catch(\Exception $exception) {
                
                return new JsonResponse([
                    'success' => false,
                    'code'    => 402,
                    'message' => $exception->getMessage(),
                    'data'    => $setData
                ]);
            }
        }
    }
    
    /**
     * @Route("/group/remove/user/", methods={"POST"}, name="app_internations_post_group_user_remove")
     */

    public function deleteUserFromGroup(Request $request){
        $request->getPreferredLanguage(['en']);
        $request->headers->get('content-type');
        $setData = [];

        $payload = [
            'groupName'   => $request->request->get('groupName'),
            'adminUname'  => $request->request->get('adminUname'),
            'username'    => $request->request->get('uname')
        ];

        $user = $this->getDoctrine()
                        ->getRepository(User::class)
                        ->findByUsername($payload['username']);
        $group = $this->getDoctrine()
                        ->getRepository(GroupDetails::class)
                        ->findByGroup($payload['groupName']);

        if($user->getUsername() != null && $this->isAdmin($payload["adminUname"]) == true && $group[0]->getIsDeleted() == false ){
            $entityManager = $this->getDoctrine()->getManager();
            $userGroupMap = $this->getDoctrine()
                        ->getRepository(UserGroupMap::class)
                        ->findByUserAndGroup($user->getUserId(), $group[0]->getGroupId());
            $userGroupMap[0]->setIsDeleted(1);
            $entityManager->persist($userGroupMap[0]);
            $entityManager->flush();
            $code = 201;
        }
        else{
            $code = 203;
        }
        try {                   
                return new JsonResponse([
                    'success' => true,
                    'code'    => $code,
                    'message' => $this->message($code),
                    'data'    => $setData  
                ]);
            }
            catch(\Exception $exception) {
                
                return new JsonResponse([
                    'success' => false,
                    'code'    => 402,
                    'message' => $exception->getMessage(),
                    'data'    => $setData
                ]);
            }

    }

    /**
     * @Route("/group/delete/", methods={"POST"}, name="app_internations_post_group_remove")
     */


    public function deleteGroup(Request $request){
        $request->getPreferredLanguage(['en']);
        $request->headers->get('content-type');
        $setData = [];

        $payload = [
            'groupName'   => $request->request->get('groupName'),
            'adminUname'  => $request->request->get('adminUname')
        ];

        $group = $this->getDoctrine()
                        ->getRepository(GroupDetails::class)
                        ->findByGroup($payload['groupName']);

        if($this->isAdmin($payload["adminUname"]) && $group[0]->getGroupName() != null && ($group[0]->getIsDeleted() == 0 || $group[0]->getIsDeleted() == false) ){

            $groupMap = $this->getDoctrine()
                        ->getRepository(UserGroupMap::class)
                        ->countByGroup($group[0]->getGroupId());

            //delete the group if the count of users = 0

            if($groupMap[0]['count'] == 0){

                $group[0]->setIsDeleted(1);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($group[0]);
                $entityManager->flush();
                $code = 204;
            }
            else{
                $code = 205;
            }
        }
        else{
            $code = 401;
        }
        try {                   
                return new JsonResponse([
                    'success' => true,
                    'code'    => $code,
                    'message' => $this->message($message),
                    'data'    => $setData  
                ]);
            }
            catch(\Exception $exception) {
                
                return new JsonResponse([
                    'success' => false,
                    'code'    => 402,
                    'message' => $exception->getMessage(),
                    'data'    => $setData
                ]);
            }
    }

}