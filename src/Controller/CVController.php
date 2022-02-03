<?php

namespace App\Controller;

use App\Entity\Skills;
use App\Repository\SkillsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CVController extends AbstractController
{
    #[Route('/cv', name: 'cv')]
    public function index(SkillsRepository $skillsRepository): Response
    {
        $skillss = $skillsRepository->findAll();

        return $this->render('cv/index.html.twig', [
            'skillss' => $skillss,
        ]);
    }
}
