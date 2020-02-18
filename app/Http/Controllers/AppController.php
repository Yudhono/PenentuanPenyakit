<?php

namespace App\Http\Controllers;

use App\Facades\Instagram;
use Illuminate\Http\Request;


class AppController extends Controller
{
    public function index()
    {
      $ig = Instagram::getPosts();
      $ig2 = \array_slice($ig, 0, 6, true);

        return view('index')
            ->with('user', Instagram::getUser())
            ->with('posts', $ig2);
    }

    public function search(Request $request){
        return view('search')
            ->with('posts', Instagram::getTagPosts($request->tag));
    }
}
