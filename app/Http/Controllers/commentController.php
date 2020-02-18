<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;
use App\Comment;
use App\Post;
use Response;

class commentController extends Controller
{
    public function store(Request $request, $post_id) {
        $validator = Validator::make($request->all(), [
          'name'      =>  'required|max:255',
          'email'     =>  'required|email|max:255',
          'comment'   =>  'required|min:1|max:2000'

        ]);

        if($validator->fails()) {
            $error = $validator->messages()->toJson();

            return response()->json(['status' => 'salah', 'message' => $error]);
        } else {
            $post = Post::find($post_id);

            $commen            =   new Comment;
            $commen->name      =   $request->input('name');
            $commen->email     =   $request->input('email');
            $commen->comment   =   $request->input('comment');
            $commen->approved  = true;

            $commen->post()->associate($post);

            $result             =   $commen->save();

          return redirect()->route('blogSingle', ['$post' => $post_id]);
      }
    }

    public function edit($id) {
      $comment = Comment::find($id);

      return view('admin.manageComment.edit')->withComment($comment);
    }

    public function update(Request $request, $comment_id){
        if (!empty($comment_id)) {
          $validator  =   Validator::make($request->all(), [
            'comment'   =>  'required|min:1|max:2000'

          ]);
          if($validator->fails()) {
              $error  =   $validator->messages()->toJson();

              return response()->json(['status' => 'salah', 'message' => $error]);
          } else {
              $comment              =   Comment::find($comment_id);
              $comment->comment     =   $request->input('comment');

              $result               =   $comment->save();

              //return response()->json(['status' => 'success', 'message' => 'data was updated']);
              return redirect()->route('postLihat', $comment->post->id);
          }
      } else {

          return response()->json(['status' => 'false', 'message' => 'No parameter Id selected']);
      }
    }

    public function delete($id){
        $comment = Comment::find($id);
        return view('admin.manageComment.delete')->withComment($comment);
    }

    public function destroy($id){
        $comment = Comment::find($id);
        $post_id = $comment->post->id;
        $comment->delete();

        //return response()->json(['status' => 'success', 'message' => 'Data was deleted']);
        return redirect()->route('postLihat', ['$comment' => $post_id]);
    }
}
