<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    //création de la classe du controller pour la route qu'on a défini dans config/routes.yaml
    //   => controller: App\Controller\FirstController::homepage

//extends Abstract Controller nous permet d'utiliser un template
// penser à rajouter l'appel en haut du fichier: use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
class FirstController extends AbstractController 
{
    /**
     * @Route ("/")
     * la route va correspondre à l'url
     */
    public function homepage()
    {
        return new Response('Hello');
    }

    /**
     * @Route ("/question/comment-faire-une-autre-page-avec-annotations")
     */
    public function show()
    {
        return new Response('Nouvelle page avec une question');
    }

    /**
     * @Route ("/questions/{slug}")
     * la même chose que la page d'avant sauf qu'on remplace la question par une 'carte' -> {ici slug} pour que quoi qu'on rentre dans l'url ça l'affiche
     * par exemple je mets dans l'url : https://localhost:8000/questions/any-question-to-ask
     * la page affichera: Future page to show the question "any question to ask"!
     */
    public function showAgain($slug)
    {

        $answers = [
            'réponse 1',
            'réponse 2',
            'réponse 3',       
        ];

        //uniquement possible car extends Abstract Controller "nommer par le nom du controller ici "first"
        //puis on crée un dossier dans templates-> first/show.html.twig dans lequel on définit ce qu'on veut
        return $this->render('first/show.html.twig' , [
            'question' => ucwords(str_replace("-", " ", $slug)),
            'answers' => $answers,
        ]);
        
        return new Response(sprintf(
            'Future page to show the question "%s"!', 
            str_replace("-", " ", $slug) 
            // avec str_replace juste pour faire plus joli à l'affichage :)
        ));
    }


}

