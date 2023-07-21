<?php

namespace App\Twig\Components;

use App\Repository\ServiceRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent('search_service')]
final class SearchServiceComponent
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?string $query = null;

    public function __construct(private ServiceRepository $serviceRepo)
    {
    }

    public function getServices(): array
    {
        return $this->serviceRepo->findBySearch($this->query);
    }
}
