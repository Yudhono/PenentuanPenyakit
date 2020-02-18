<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facades\Instagram;

class aboutFEController extends Controller
{
    public function index() {
      $ig = Instagram::getPosts();
      $ig2 = \array_slice($ig, 0, 3, true);
      $ig3 = \array_slice($ig, 3, 3, true);

      return view('frontEnd.main')
                    ->with('postingan', $ig2)
                    ->with('postingan2', $ig3);
    }
}
