<?php

namespace App\Controller\Register;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class RegisterController
{

	// public function __constructor
    /**
     * @Route("/register/{max}", name="app_internations_get_test")
     */
    public function test($max)
    {
        $number = random_int(0, $max);

        return new Response(json_encode($number));
    }

    /**
     * @Route("/postTest1", methods={"POST"}, name="app_internations_post_test")
     */

    public function postTest(Request $request){

    	$request->getPreferredLanguage(['en']);
    	$request->headers->get('host');
	    $request->headers->get('content-type');
    	$var = $request->request->get('test');
    	
    	try {

    		return new JsonResponse([
         		'success' => true,
            	'data'    => $var // Your data here
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
