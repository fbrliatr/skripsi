<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';

    public function document(){
        return $this->belongsTo(Image::class, 'filename', 'id');
    }

    public function itemRequest(){
        return $this->hasMany(ItemRequest::class , 'request_id' , 'id');
    }
}

