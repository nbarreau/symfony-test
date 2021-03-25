<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

//extends Abstract Controller nous permet d'utiliser un template
// penser à rajouter l'appel en haut du fichier: use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentController extends AbstractController 
{
    /**
    * @Route("/comments/{id}/vote/{direction<up|down>}", methods="POST")
    */
    public function commentVote($id, $direction, LoggerInterface $logger)
    {
        // todo - use id to query the database (en utilisant une bdd)

        // use real logic here to save this to the database (sans utiliser de bdd)
        if ($direction === 'up') {
            $logger->info('Voting up!');
            $currentVoteCount = rand(7, 100);
        } else {
            $logger->info('Voting down!');
            $currentVoteCount = rand(0, 5);
        }
        return new JsonResponse(['votes' => $currentVoteCount]);
        // ou return $this->json(['votes' => $currentVoteCount]);

        // copier/coller url dans navigateur pour tester: .../comments/{id}/vote/{direction} 
        // et remplacer les éléments entre crochets par ex : .../comments/10/vote/up
    }

}