<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectController extends AbstractController
{
    #[Route('/project', name: 'project_index')]
    public function index(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();
        return $this->render('project/index.html.twig', [
            'projects' => $projects
        ]);
    }
}