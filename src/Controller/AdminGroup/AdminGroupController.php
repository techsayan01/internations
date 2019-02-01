<?php

namespace App\Controller\AdminGroup;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use App\Entity\Groupdetails;
use App\Entity\Audit;


class AdminGroupController extends AbstractController {
	
	/**
     * @Route("/group/create", methods={"POST"}, name="app_internations_post_group_add")
     */
    public function createGroup(Request $request){

    	$request->getPreferredLanguage(['en']);
    	$request->headers->get('host');
	    $request->headers->get('content-type');

    	$payload = [
			'groupName' => $request->request->get('groupName'),
			'username'  => $request->request->get('uname')
		];

		// $payload['isAdmin'] = (!empty($payload['isAdmin'])) ? $payload['isAdmin'] : 0;

		$groupObject = new Groupdetails();
		$entityManager = $this->getDoctrine()->getManager();

    	try {

    		$groupObject->setGroupName($payload['groupName']);
    		$entityManager->persist($groupObject);

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
}