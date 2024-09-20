<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'status'];

public function attachments()
{
    return $this->hasMany(Attachment::class);
}

}