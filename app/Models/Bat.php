<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bat extends Model
{

    use HasFactory;
    protected $guarded = (['id']);

    public function batitem()
    {
        return $this->hasMany(BatItem::class);
    }
}
