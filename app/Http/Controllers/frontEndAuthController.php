<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Facades\Instagram;
use App\Http\Controllers\Controller;
use Session;

class frontEndAuthController extends Controller
{
      /**method contructor untuk construct method middleware menentukan method mana saja dalam
    controller ini yaang digunakan untuk masing masing role berdasarkan permissionnya**/
    // function __construct()
    // {
    //      //-- permission mengizinkan semua method untuk dapat digunakan
    //      $this->middleware('permission:role-list');
    //      //-- permission mengizinkan hanya method createV() dan store() yang boleh digunakan oleh role
    //      $this->middleware('permission:role-create', ['only' => ['viewLanding', 'viewDiagnosisUnggas', 'viewDiagnosisRuminansia']]);
    //      //-- permission mengizinkan hanya method edit() dan update() yang boleh digunakan oleh role
    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      //-- permission mengizinkan hanya method destroy
    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }

    function viewLanding() {
      $ig = Instagram::getPosts();
      $ig2 = \array_slice($ig, 0, 3, true);
      $ig3 = \array_slice($ig, 3, 3, true);

      return view('frontEnd.landing')->with('postingan', $ig2)->with('postingan2', $ig3);
    }

    function viewKhususDiagnosa(){
      $ig = Instagram::getPosts();
      $ig2 = \array_slice($ig, 0, 3, true);
      $ig3 = \array_slice($ig, 3, 3, true);

      return view('frontEnd.khususDiagnosa')->with('postingan', $ig2)->with('postingan2', $ig3);
    }

    function viewDiagnosisUnggas() {
      return view('frontEnd.diagnosisUnggas');
    }

    function viewDiagnosisRuminansia() {
      return view('frontEnd.diagnosisRuminansia');
    }
}
