<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArchivePhoto  extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'file_path', 'category'];
}
