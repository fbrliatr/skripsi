<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'divisi_id',
        'item_id',
        'place_code',
        'tujuan',
        'description',
        'number',
        'status',
        'images', // Add 'images' to the fillable array
    ];

    protected $table = 'item_request_need';

    public function divisi(){
        return $this->belongsTo(Divisi::class , 'divisi_id' , 'id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function item(){
        return $this->belongsTo(ItemCategory::class , 'item_id' , 'id');
    }

    public function document(){
        return $this->belongsTo(ItemRequest::class, 'supported_document', 'id');
    }
    
}
