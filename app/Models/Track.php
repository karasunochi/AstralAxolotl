<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    use HasFactory;

    
    protected $fillable = ['album_id', 'title']; 

    public function album()
    {
        return $this->belongsTo(Album::class); 
    }
}
