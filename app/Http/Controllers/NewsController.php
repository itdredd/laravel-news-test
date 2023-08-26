<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Services\NewsService;

class NewsController extends Controller
{
    private NewsService $newsService;

    public function __construct(NewsService $newsService)
    {
        $this->newsService = $newsService;
    }

    public function create(NewsRequest $request): void
    {
        $this->newsService->create($request->input('title'), $request->input('description'));
    }

    public function list(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->newsService->list();
    }

    public function update(News $news, NewsRequest $request): bool|News
    {
        return $this->newsService->update($news->id, $request->all());
    }

    public function delete(News $news): bool
    {
        return $this->newsService->delete($news->id);
    }
}
