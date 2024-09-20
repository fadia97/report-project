<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['update_id', 'content'];

    public function updatee()
    {
        return $this->belongsTo(Update::class);
    }
}
