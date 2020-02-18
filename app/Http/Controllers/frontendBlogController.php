<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Facades\Instagram;
use App\Http\Controllers\Controller;
use DB;
use App\Post;

class frontendBlogController extends Controller
{
    public function getIndex() {

      $posts = Post::orderBy('created_at', 'dsc')->paginate(3);

      $nama = [];
      $i = 0;
      foreach($posts as $post) {
        $nama[$i]['id']         = $post->id;
        $nama[$i]['title']      = $post->title;
        $nama[$i]['image']      = basename($post->image);
        $nama[$i]['created_at'] = $post->created_at;

        $i++;
      }

      $ig = Instagram::getPosts();
      $ig2 = \array_slice($ig, 0, 3, true);
      $ig3 = \array_slice($ig, 3, 3, true);

      return view('frontEnd.blog')
                    ->withPosts($posts)
                    ->withNama($nama)
                    ->with('postingan', $ig2)
                    ->with('postingan2', $ig3);
    }

    public function getSingle($id) {
      $post2 = Post::where('id', '=', $id)->first();

      $post = DB::table('posts')
                    ->join('categories', 'posts.category_id', '=', 'categories.id')
                    ->select('posts.id as idnya_posts',
                             'posts.title as title',
                             'posts.category_id as idnya_category',
                             'posts.image as image',
                             'posts.body as body',
                             'posts.created_by as created_by',
                             'posts.created_at as created_at',
                             'posts.updated_at as updated_at',
                             'categories.name as nama_category')
                   ->where('posts.id', '=', $id)->first();

      $nama['image']          = basename($post->image);
      $nama['title']          = basename($post->title);
      $nama['nama_category']  = basename($post->nama_category);
      $nama['body']           = $post->body;
      $nama['updated_at']     = basename($post->updated_at);
      $nama['created_at']     = basename($post->created_at);
      $nama['created_by']     = basename($post->created_by);
      $nama['idnya_posts']    = basename($post->idnya_posts);
      $nama['idnya_category'] = basename($post->idnya_category);

      $ig = Instagram::getPosts();
      $ig2 = \array_slice($ig, 0, 3, true);
      $ig3 = \array_slice($ig, 3, 3, true);
      //return response()->json($nama);
      return view('frontEnd.blogSingle')
                  ->withPost($post)
                  ->withNama($nama)
                  ->withPost2($post2)
                  ->with('postingan', $ig2)
                  ->with('postingan2', $ig3);
    }
}
