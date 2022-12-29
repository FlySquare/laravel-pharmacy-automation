<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    public function drag()
    {
        return $this->belongsTo('App\Models\drags', 'drag_id', 'id');
    }
}
