<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NonItemRequest extends Model
{
    use HasFactory;

        protected $table = 'non_item_production';

    // public function kota(){
    //     return $this->belongsTo(Kota::class , 'kota_id' , 'id');
    // }

    // public function provinsi(){
    //     return $this->belongsTo(Provinsi::class , 'provinsi_id' , 'id');
    // }

    public function divisi(){
        return $this->belongsTo(Divisi::class , 'divisi_id' , 'id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }

}
