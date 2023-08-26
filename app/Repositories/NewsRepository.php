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

    public function getAll(): \Illuminate\Database\Eloquent\Collection
    {
        return News::all();
    }

    public function update(int $id, array $data = []): bool|News
    {
        /** @var News $model */
        $model = News::find($id);

        if ($model->canEdit()) {
            $model->update($data);
            return $model;
        }
        
        return false;
    }

    public function delete(int $id): bool
    {
        /** @var News $model */
        $model = News::find($id);

        if ($model->canEdit()) {
            $model->delete();
            return true;
        }

        return false;
    }
}
