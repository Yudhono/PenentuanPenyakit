<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Category;
use Purifier;
use Session;

class postsController extends Controller
{
  public function createV() {
    $ids = Category::all();

    return view('admin.managePost.create')->withIds($ids);
  }

  public function index()
  {
    $posts = DB::table('posts')
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
                 ->orderBy('posts.created_at', '=', 'dsc')->get();

    $nama = [];
    $i = 0;

    foreach($posts as $dia) {
      $nama[$i]['image']          = basename($dia->image);
      $nama[$i]['title']          = basename($dia->title);
      $nama[$i]['nama_category']  = basename($dia->nama_category);
      $nama[$i]['body']           = $dia->body;
      $nama[$i]['updated_at']     = basename($dia->updated_at);
      $nama[$i]['created_by']     = basename($dia->created_by);
      $nama[$i]['idnya_posts']    = basename($dia->idnya_posts);
      $nama[$i]['idnya_category'] = basename($dia->idnya_category);

      $i++;
    }

    //return response()->json($nama);
    return view('admin.managePost.index')->withPosts($posts)->withNama($nama);
  }

  public function show($post_id) {
    $post2 =  Post::find($post_id);

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
                 ->where('posts.id', '=', $post_id)->first();

    $nama['image']          = basename($post->image);
    $nama['title']          = basename($post->title);
    $nama['nama_category']  = basename($post->nama_category);
    $nama['body']           = $post->body;
    $nama['updated_at']     = basename($post->updated_at);
    $nama['created_at']     = basename($post->created_at);
    $nama['created_by']     = basename($post->created_by);
    $nama['idnya_posts']    = basename($post->idnya_posts);
    $nama['idnya_category'] = basename($post->idnya_category);
    
    //return response()->json($nama);
    return view('admin.managePost.show')
                ->withPost($post)
                ->withNama($nama)
                ->withPost2($post2);
  }

  public function create(Request $request) {
    $validator = Validator::make($request->all(), [
        'title'       => 'required',
        'category_id' => 'required',
        'image'       => 'required',
        'body'        => 'required',
        'created_by'  => 'required'
    ]);

    if($validator->fails()) {
          $error = $validator->messages()->toJson();

          return response()->json(['status' => 'salah', 'message' => $error]);
      } else {
          $file   =   time().'.'.$request->image->getClientOriginalExtension();
          $request->image->move(public_path('images/posts'), $file);
          $path   =   public_path('images/posts/'). $file;

          $posts                =   new Post;
          $posts->title         =   $request->input('title');
          $posts->category_id   =   $request->input('category_id');
          $posts->created_by    =   $request->input('created_by');
          $posts->body          =   Purifier::clean($request->input('body'));
          $posts->image         =   $path;
          $result               =   $posts->save();

          return redirect()->route('postIndeks');

          return response()->json(['status' => 'success', 'message' => $request->all()]);
      }
  }

  public function edit($id) {
    $post  = Post::find($id);

    $nama = DB::table('posts')
                ->join('categories', 'posts.category_id', '=', 'categories.id')
                ->where('posts.id', '=', $id)
                ->select('categories.name')->pluck('name')->first();

    $categories = Category::all();

    return view('admin.managePost.update')->withPost($post)->withNama($nama)->withCategories($categories);
  }

  public function update(Request $request, $post_id) {
    if (!empty($post_id)) {
          $validator  =   Validator::make($request->all(), [
              'title'        =>  'required|max:255',
              'body'         =>  'required',
              'category_id'  =>  'required',
              'created_by'   =>  'required'
          ]);
          if($validator->fails()) {
              $error  =   $validator->messages()->toJson();

              return response()->json(['status' => 'salah', 'message' => $error]);
          } else {
              $post               =   Post::find($post_id);
              $post->title        =   $request->input('title');
              $post->category_id  =   $request->input('category_id');
              $post->created_by   =   $request->input('created_by');
              $post->body         =   $request->input('body');
              $ex_name            =   $post->image;
              $new_name           =   substr($ex_name, -14);
              if($request->hasFile('image')) {
                  if (File::exists(base_path()) ."/public/images/posts/". $new_name) {
                    File::delete(base_path() ."/public/images/posts/". $new_name);
                  }
                  $file   =   time().'.'.$request->image->getClientOriginalExtension();
                  $request->image->move(public_path('images/posts'), $file);
                  $path   =   public_path('images/posts/'). $file;
                  $post->image = $path;
              }

              $result               =   $post->save();

              return redirect()->route('postIndeks');
              //return response()->json(['status' => 'success', 'message' => 'data was updated']);
          }
      } else {

          return response()->json(['status' => 'false', 'message' => 'No parameter Id selected']);
      }
  }

  public function destroy($id) {
    $post           =   Post::findOrFail($id);
    $filename       =   $post->image;
    $rest           =   substr($filename, -14);
    File::delete(base_path() ."/public/images/posts/". $rest);
    $response       =   $post->delete();

    return redirect()->route('postIndeks');

    //return response()->json(['status' => 'success', 'message' => 'Data was deleted']);
  }
}
