<?php

namespace App\Repositories;

use App\Models\News;

class NewsRepository
{
    public function create(string $title, string $description, int $authorId): void
    {
        News::create([
            'title' => $title,
            'description' => $description,
            'author_id' => $authorId
        ]);
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
