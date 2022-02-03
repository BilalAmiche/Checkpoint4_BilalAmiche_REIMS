<?php

namespace App\Controller;

use App\Entity\Project;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProjectRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ProjectType;

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

    #[Route('/project/new', name: 'project_new')]
    public function createAction(Request $request, EntityManagerInterface $entityManager) : Response
    {
        $this->denyAccessUnlessGranted("ROLE_ADMIN");
        $user = $this->getUser();

        $project = new Project();
        $form = $this->createForm(ProjectType::class, $project);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
          $entityManager->persist($project);
          $entityManager->flush();
          return $this->redirectToRoute('project_index');
        }
        return $this->render('project/new.html.twig', [
            'form' => $form->createView(),
            'user' => $user,
        ]);
    }

    #[Route('/project/{id}', name: 'project_show')]
    public function show(Project $project): Response
    {
        return $this->render('project/show.html.twig', ['project' => $project]);
    }
}
