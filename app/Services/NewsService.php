<?php

namespace App\Services;

use App\Repositories\NewsRepository;

class NewsService extends AbstractService
{
    private NewsRepository $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function create(string $title, string $description): void
    {
        $userId = $this->getUserId();
        $this->newsRepository->create($title, $description, $userId);
    }

    public function list()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
