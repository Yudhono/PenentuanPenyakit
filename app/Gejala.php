<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
  protected $table = 'gejalas';

  public function penyakit(){
    return $this->belongsToMany('App\Penyakit');
  }
}
