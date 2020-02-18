<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyakit_has_gejala extends Model
{
    protected $table = 'penyakit_has_gejala';

    protected $fillable = ['penyakit_id', 'gejala_id'];

    public function penyakit(){
      return $this->belongsToMany('App\Penyakit');
    }

    public function gejala(){
      return $this->belongsToMany('App\Gejala');
    }
}
