<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProjectRepository;

class ProjectController extends AbstractController
{
    #[Route('/project', name: 'project')]
    public function index(ProjectRepository $projectRepository): Response
    {
        $projects = $projectRepository->findAll();

        return $this->render('project/index.html.twig', [
            'projects' => $projects,
        ]);
    }

    #[Route('/project/{id}', name: 'project_show')]
    public function show(Project $project): Response
    {
        return $this->render('project/show.html.twig', ['project' => $project]);
    }
}
