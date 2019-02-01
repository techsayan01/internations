<?php

namespace App\Controller\AdminGroup;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminGroupController {
	
	// /**
 //     * @Route("/group/create", methods={"POST"}, name="app_internations_post_user_add")
 //     */
 //    public function createGroup(Request $request){

 //    	$request->getPreferredLanguage(['en']);
 //    	$request->headers->get('host');
	//     $request->headers->get('content-type');

 //    	$payload = [
	// 		'groupName' => $request->request->get('groupName');
	// 		'username'  => $request->request->get('uname');
	// 	];

	// 	// $payload['isAdmin'] = (!empty($payload['isAdmin'])) ? $payload['isAdmin'] : 0;

	// 	$groupObject = new GroupDetails();
	// 	$entityManager = $this->getDoctrine()->getManager();

 //    	try {

 //    		$groupObject->setGroupName($payload['groupName']);
 //    		$entityManager->flush();

 //    		return new JsonResponse([
 //         		'success' => true,
 //            	'message'    => "Created successfully!" // Your data here
 //        	]);
 //    	}
 //    	catch(\Exception $exception) {
    		
 //    		return new JsonResponse([
 //            	'success' => false,
 //            	'code'    => $exception->getCode(),
 //            	'message' => $exception->getMessage(),
 //        	]);
 //    	}
 //    }
}