<?php

namespace App\Models;

use App\Models\Interfaces\ModelInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Question extends Model implements ModelInterface
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'p_t',
        'p_b'
    ];

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class, 'question_id', 'id');
    }
}
