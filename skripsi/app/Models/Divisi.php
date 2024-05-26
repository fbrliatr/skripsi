<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;

    protected $table = 'divisi';

    // public function kota(){
    //     return $this->belongsTo(Kota::class , 'kota_id' , 'id');
    // }

    // public function pasar(){
    //     return $this->hasMany(MarketMaping::class , 'divisi_id' , 'id');
    // }

    // public function pabrik(){
    //     return $this->hasMany(ItemStock::class , 'divisi_id' , 'id');
    // }

    // public function agri(){
    //     return $this->hasMany(AgriMaping::class , 'divisi_id' , 'id');
    // }

    public function itemRequest(){
        return $this->hasMany(ItemRequest::class , 'divisi_id' , 'id');
    }

    public function nonItemRequest(){
        return $this->hasMany(NonItemRequest::class , 'divisi_id' , 'id');
    }
    
    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
