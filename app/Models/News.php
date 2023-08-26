<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $author_id
 * @property int $created_at
 * @property int $updated_at
 */
class News extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'author_id'];

    public function canEdit(): bool
    {
        return auth()->user()->getAuthIdentifier() === $this->author_id;
    }
}
