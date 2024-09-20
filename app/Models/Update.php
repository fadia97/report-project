<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Update extends Model
{
    use HasFactory;

    protected $fillable = ['report_id', 'content'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
