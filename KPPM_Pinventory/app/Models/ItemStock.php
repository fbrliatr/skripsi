<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemStock extends Model
{
    use HasFactory;

    protected $fillable = [
       
        'number',
      
    ];
    protected $table = 'item_stock';

    // public function kota(){
    //     return $this->belongsTo(Kota::class , 'kota_id' , 'id');
    // }

    // public function provinsi(){
    //     return $this->belongsTo(Provinsi::class , 'provinsi_id' , 'id');
    // }

    // public function kecamatan(){
    //     return $this->belongsTo(Kecamatan::class , 'kecamatan_id' , 'id');
    // }

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

    public function item(){
        return $this->belongsTo(ItemCategory::class , 'item_id' , 'id');
    }
}
