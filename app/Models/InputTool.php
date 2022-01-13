<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputTool extends Model
{
    use HasFactory;
    protected $table = 'input_tools';
    protected $guarded = (['id']);
}
