<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Facades\Instagram;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Gejala;

class diagnosisController extends Controller
{
    function tampilkanGejalaUnggas() {
      $unggas = DB::table('gejalas')
                      ->select('id as id', 'deskripsi_gejala as deskripsi_gejala')
                      ->where('jenis_binatang', 'unggas')
                      ->get();

      $ig = Instagram::getPosts();
      $ig2 = \array_slice($ig, 0, 3, true);
      $ig3 = \array_slice($ig, 3, 3, true);

      return view('frontEnd.diagnosisUnggas')
                  ->withUnggas($unggas)
                  ->with('postingan', $ig2)
                  ->with('postingan2', $ig3);
    }

    function tampilkanGejalaRuminansia() {
      $ruminansia = DB::table('gejalas')
                      ->select('id as id', 'deskripsi_gejala as deskripsi_gejala')
                      ->where('jenis_binatang', 'ruminansia')
                      ->get();

      $ig = Instagram::getPosts();
      $ig2 = \array_slice($ig, 0, 3, true);
      $ig3 = \array_slice($ig, 3, 3, true);

      return view('frontEnd.diagnosisRuminansia')
                  ->withRuminansia($ruminansia)
                  ->with('postingan', $ig2)
                  ->with('postingan2', $ig3);
    }
}
