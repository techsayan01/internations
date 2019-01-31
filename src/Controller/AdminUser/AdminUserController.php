<?php


namespace App\Controller\AdminUser;
// use App\Controller\AdminUserController;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping as ORM;

use App\Entity\User;
use App\Entity\Audit;

class AdminUserController extends AbstractController {

	/**
     * @Route("/user/add", methods={"POST"}, name="app_internations_post_user_add")
     */
    public function addUser(Request $request){

    	$request->getPreferredLanguage(['en']);
    	$request->headers->get('host');
	    $request->headers->get('content-type');
    	// $var = $request->request->get('test');
    	$payload = [
			'username' => $request->request->get('uname'),
			'isAdmin'  => $request->request->get('isAdmin')
		];

		$payload['isAdmin'] = (!empty($payload['isAdmin'])) ? $payload['isAdmin'] : 0;

		$user = new User();
		$audit = new Audit();
		$entityManager = $this->getDoctrine()->getManager();

    	try {

    		$user->setUsername($payload['username']);
    		$user->setIsAdmin($payload['isAdmin']);

    		// $audit->setCreatedAt();
			$audit->setIsDeleted(0);
			
    		$entityManager ->persist($user);
			$entityManager->persist($audit);

    		$entityManager->flush();

    		return new JsonResponse([
         		'success' => true,
            	'message'    => "Created successfully!" // Your data here
        	]);
    	}
    	catch(\Exception $exception) {
    		
    		return new JsonResponse([
            	'success' => false,
            	'code'    => $exception->getCode(),
            	'message' => $exception->getMessage(),
        	]);
    	}
    }


    /**
     * @Route("/user/delete", methods={"POST"}, name="app_internations_post_user_delete")
     */
    public function deleteUser(Request $request){

    	$request->getPreferredLanguage(['en']);
    	$request->headers->get('host');
	    $request->headers->get('content-type');
    	$payload = [
			'user_ids' => $request->request->get('user_ids'),
		];

		$entityManager = $this->getDoctrine()->getManager();

    	try {
    		if(is_array($payload["user_ids"]) && $payload["user_ids"])
    			foreach ($payload["user_ids"] as $ukey => $user_id) {

    				$audit = new Audit();
    				$audit->setCreatedAt("NOW()");
    				$audit->setIsDeleted(1);
    				$audit_id = $audit->getAuditId();
    				
    				$entityManager->persist($audit);
    				$entityManager->flush();
    				
    				$user = $entityManager->getRepository(User::class)->find($user_id);
    				$user->setAuditId($audit_id);
    				$entityManager->persist($user);

    				$entityManager->flush();
    				
    			}

    		return new JsonResponse([
         		'success' => true,
            	'message'    => "Users deleted successfully!" // Your data here
        	]);
    	}
    	catch(\Exception $exception) {
    		
    		return new JsonResponse([
            	'success' => false,
            	'code'    => $exception->getCode(),
            	'message' => $exception->getMessage(),
        	]);
    	}
    }


    /**
     * @Route("/user/all", methods={"GET"}, name="app_internations_post_user_all")
     */
    public function allUser(Request $request){

    	$request->getPreferredLanguage(['en']);
    	$request->headers->get('host');
	    $request->headers->get('content-type');

		$user = new User();
		$entityManager = $this->getDoctrine()->getManager();

    	try {

  //   		$user->setUsername($payload['username']);
  //   		$user->setIsAdmin($payload['isAdmin']);

  //   		$entityManager ->persist($user);
  //   		$entityManager->flush();

    		return new JsonResponse([
         		'success' => true,
            	'message'    => "User List",
            	'data'    => [] // Your data here
        	]);
    	}
    	catch(\Exception $exception) {
    		
    		return new JsonResponse([
            	'success' => false,
            	'code'    => $exception->getCode(),
            	'message' => $exception->getMessage(),
        	]);
    	}
    }


    /**
     * @Route("/user", methods={"POST"}, name="app_internations_post_user")
     */
    public function user(Request $request){

    	$request->getPreferredLanguage(['en']);
    	$request->headers->get('host');
	    $request->headers->get('content-type');
    	$payload = [
			'user_id' => $request->request->get('user_id')
		];

		$user = new User();
		$entityManager = $this->getDoctrine()->getManager();

    	try {

  //   		$user->setUsername($payload['username']);
  //   		$user->setIsAdmin($payload['isAdmin']);

  //   		$entityManager ->persist($user);
  //   		$entityManager->flush();

    		return new JsonResponse([
         		'success' => true,
            	'message'    => "User Details",
            	'data'    => []
        	]);
    	}
    	catch(\Exception $exception) {
    		
    		return new JsonResponse([
            	'success' => false,
            	'code'    => $exception->getCode(),
            	'message' => $exception->getMessage(),
        	]);
    	}
    }
	
}