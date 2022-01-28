<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatItem extends Model
{
    use HasFactory;
    protected $guarded = (['id']);

    public function bat()
    {
        return $this->belongsTo(Bat::class);
    }
}
