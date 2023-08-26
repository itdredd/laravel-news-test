<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsRequest;
use App\Services\NewsService;
use Illuminate\Http\Request;

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
