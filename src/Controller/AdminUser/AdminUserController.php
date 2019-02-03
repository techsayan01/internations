<?php

namespace App\Controller\AdminUser;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\DateTime;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\User;
use App\Repository\UserRepository;


/// Datetime update check



class AdminUserController extends AbstractController {

	/**
     * @Route("/user/add", methods={"POST"}, name="app_internations_post_user_add")
     */
    public function addUser(Request $request){

    	$request->getPreferredLanguage(['en']);
    	$request->headers->get('host');
	    $request->headers->get('content-type');
    	$payload = [
			"username" 		=> $request->request->get("uname"),
			"isAdmin"  		=> $request->request->get("isAdmin"),
			"adminUserName" => $request->request->get("adminUname")
		];
		
        //Check if admin user or not
		$isAdmin = $this->getDoctrine()
		->getRepository(User::class)
		->findByIsAdmin($payload["adminUserName"]);

        $responseArray = [
            "success" => false,
            "message"    => "Error Occoured! Only admin can add new user" // Your data here
        ];

        if(!empty($isAdmin)) {

            $entityManager = $this->getDoctrine()->getManager();
            $user   = new User();
            $date   = new DateTime("now");
            
            $user->setUsername($payload["username"]);
            $user->setIsAdmin($payload["isAdmin"]);
            $entityManager->persist($user);
            $entityManager->flush();

            $responseArray["success"] = true;
            $responseArray["message"] = "User added successfully!";
        }

        return new JsonResponse($responseArray);
    }


      //   /**
      //    * @Route("/user/delete", methods={"POST"}, name="app_internations_post_user_delete")
      //    */
      //   public function deleteUser(Request $request){

      //   	$request->getPreferredLanguage(["en"]);
      //   	$request->headers->get('host');
    	 //    $request->headers->get('content-type');
      //   	$payload = [
    		// 	"user_ids" => $request->request->get("user_ids"),
      //           "adminUserName" => $request->request->get("adminUname")
    		// ];

    		// $entityManager = $this->getDoctrine()->getManager();

      //   	try {
      //   		if(is_array($payload["user_ids"]) && $payload["user_ids"])
      //   			foreach ($payload["user_ids"] as $ukey => $user_id) {

      //   				$audit = new Audit();
      //   				$audit->setCreatedAt("NOW()");
      //   				$audit->setIsDeleted(1);
      //   				$audit_id = $audit->getAuditId();
        				
      //   				$entityManager->persist($audit);
      //   				$entityManager->flush();
        				
      //   				$user = $entityManager->getRepository(User::class)->find($user_id);
      //   				$user->setAuditId($audit_id);
      //   				$entityManager->persist($user);

      //   				$entityManager->flush();
        				
      //   			}

      //   		return new JsonResponse([
      //        		'success' => true,
      //           	'message'    => "Users deleted successfully!" // Your data here
      //       	]);
      //   	}
      //   	catch(\Exception $exception) {
        		
      //   		return new JsonResponse([
      //           	'success' => false,
      //           	'code'    => $exception->getCode(),
      //           	'message' => $exception->getMessage(),
      //       	]);
      //   	}
      //   }


    /**
     * @Route("/user/all", methods={"POST"}, name="app_internations_post_user_all")
     */
    public function allUser(Request $request){

        $request->getPreferredLanguage(['en']);
        $request->headers->get('host');
        $request->headers->get('content-type');
        $payload = [
            // "username"      => $request->request->get("uname"),
            // "isAdmin"       => $request->request->get("isAdmin"),
            "adminUserName" => $request->request->get("adminUname")
        ];

        // print_r($request->request->param('adminUname')); die;
        
        //Check if admin user or not
        $isAdmin = $this->getDoctrine()
        ->getRepository(User::class)
        ->findByIsAdmin($payload["adminUserName"]);

        print_r($isAdmin); die;
        $responseArray = [
            "success" => false,
            "message"    => "Error Occoured! Only admin can view all users" // Your data here
        ];

        if(!empty($isAdmin)) {

        $users = $this->getDoctrine()->getRepository(User::class);
        
        $responseArray["success"] = true;
            $responseArray["user_data"] = $users;
        }

        return new JsonResponse($responseArray);
    
    }


    /**
     * @Route("/user", methods={"POST"}, name="app_internations_post_user")
     */
  //   public function user(Request $request){

  //   	$request->getPreferredLanguage(['en']);
  //   	$request->headers->get('host');
	 //    $request->headers->get('content-type');
  //   	$payload = [
		// 	'user_id' => $request->request->get('user_id')
		// ];

		// $user = new User();
		// $entityManager = $this->getDoctrine()->getManager();

  //   	try {

  //         //   		$user->setUsername($payload['username']);
  //         //   		$user->setIsAdmin($payload['isAdmin']);

  //         //   		$entityManager ->persist($user);
  //         //   		$entityManager->flush();

  //   		return new JsonResponse([
  //        		'success' => true,
  //           	'message'    => "User Details",
  //           	'data'    => []
  //       	]);
  //   	}
  //   	catch(\Exception $exception) {
    		
  //   		return new JsonResponse([
  //           	'success' => false,
  //           	'code'    => $exception->getCode(),
  //           	'message' => $exception->getMessage(),
  //       	]);
  //   	}
  //   }
	
}

