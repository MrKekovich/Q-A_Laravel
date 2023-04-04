<?php

namespace App\Models;

use App\Models\Interfaces\ModelInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model implements ModelInterface
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'body',
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }
}
