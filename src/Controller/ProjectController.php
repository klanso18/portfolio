<?php

namespace App\Controller;

use App\Entity\Project;
use App\Repository\ImageRepository;
use App\Repository\ProjectRepository;
use App\Repository\StackRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    #[Route('project/{id}', name: 'project_show')]
    public function show(Project $project, ImageRepository $imageRepository, StackRepository $stackRepository): Response
    {
        $images = $imageRepository->findAll();
        $stacks = $stackRepository->findAll();
        return $this->render('project/show.html.twig', [
            'project' => $project,
            'images' => $images,
            'stacks' => $stacks
        ]);
    }
}