<?php

namespace App\Models;

use App\Models\Interfaces\ModelInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model implements ModelInterface
{
    use HasFactory;
}
