<?php

namespace App\Controller\Register;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class RegisterController
{
    /**
     * @Route("/register/{max}", name="app_internations")
     */
    public function test($max)
    {
        $number = random_int(0, $max);

        return new Response(json_encode($number));
    }
}
