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

    #[Route('/new', name: 'app_workers_new', methods: ['GET', 'POST'])]
    public function new(Request $request, WorkersRepository $workersRepository): Response
    {
        $worker = new Workers();
        $form = $this->createForm(WorkersType::class, $worker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $workersRepository->save($worker, true);

            return $this->redirectToRoute('app_workers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('workers/new.html.twig', [
            'worker' => $worker,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_workers_show', methods: ['GET'])]
    public function show(Workers $worker): Response
    {
        return $this->render('workers/show.html.twig', [
            'worker' => $worker,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_workers_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Workers $worker, WorkersRepository $workersRepository): Response
    {
        $form = $this->createForm(WorkersType::class, $worker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $workersRepository->save($worker, true);

            return $this->redirectToRoute('app_workers_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('workers/edit.html.twig', [
            'worker' => $worker,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_workers_delete', methods: ['POST'])]
    public function delete(Request $request, Workers $worker, WorkersRepository $workersRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$worker->getId(), $request->request->get('_token'))) {
            $workersRepository->remove($worker, true);
        }

        return $this->redirectToRoute('app_workers_index', [], Response::HTTP_SEE_OTHER);
    }
}
