<?php

namespace App\Controller;

use App\Entity\Workers;
use App\Form\WorkersType;
use App\Repository\WorkersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/workers')]
class WorkersController extends AbstractController
{
    #[Route('/', name: 'app_workers_index', methods: ['GET'])]
    public function index(WorkersRepository $workersRepository): Response
    {
        return $this->render('workers/index.html.twig', [
            'workers' => $workersRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_workers_show', methods: ['GET'])]
    public function show(Workers $worker): Response
    {
        return $this->render('workers/show.html.twig', [
            'worker' => $worker,
        ]);
    }

}
