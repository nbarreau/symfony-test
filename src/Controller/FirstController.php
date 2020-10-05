<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

    //création de la classe du controller pour la route qu'on a défini dans config/routes.yaml
    //   => controller: App\Controller\FirstController::homepage

class FirstController
{
    public function homepage()
    {
        return new Response('Hello');
    }
}

