<?php

namespace App\Models;

use App\Models\Interfaces\ModelInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model implements ModelInterface
{
    use HasFactory;
}
