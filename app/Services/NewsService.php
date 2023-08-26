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

    public function list(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->newsRepository->getAll();
    }

    public function update(int $id, array $data = []): bool|\App\Models\News
    {
        return $this->newsRepository->update($id, $data);
    }

    public function delete(int $id): bool
    {
        return $this->newsRepository->delete($id);
    }
}
