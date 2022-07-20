<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    #[Route('/project/', name: 'project_index')]
    public function index(): Response
    {
        return $this->render('project/index.html.twig', [
            'website' => 'Wild Series',
         ]);
    }
}