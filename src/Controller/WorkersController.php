<?php

namespace App\Controller;

use App\Entity\Workers;
use App\Form\WorkersType;
use App\Repository\WorkersRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/workers')]
class WorkersController extends AbstractController
{

    #[Route('/{id}', name: 'app_workers_show', methods: ['GET'])]
    public function show(Workers $worker): Response
    {
        return $this->render('workers/show.html.twig', [
            'worker' => $worker,
        ]);
    }

    #[IsGranted("ROLE_USER")]
    #[Route('/{id}/follow', name: 'follow', methods: ['GET'])]
    public function followWorker(Workers $workers, WorkersRepository $workersRepository ): JsonResponse
    {
        $currentStatus = $workers->isFollowed();
        $workers->setFollowed(!$currentStatus);
        $workersRepository->save($workers, true);

        return new JsonResponse(['isFollowed' => $workers->isFollowed()]);
    }

}
