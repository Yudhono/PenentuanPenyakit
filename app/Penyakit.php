<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
  protected $table = 'penyakits';

  public function gejala(){
    return $this->belongsToMany('App\Gejala');
  }
}
