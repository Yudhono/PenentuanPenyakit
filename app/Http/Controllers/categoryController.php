<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;
use App\category;
use Session;

class categoryController extends Controller
{
    public function createV() {
      return view('admin.manageCategory.create');
    }

    public function index() {
      $categories = Category::orderBy('created_at', 'asc')->get();

      //return response()->json($categories);
      return view('admin.manageCategory.index')->withCategories($categories);
    }

    public function create(Request $request) {
      $validator = Validator::make($request->all(), [
            'name'        => 'required|max:255',
        ]);

        if($validator->fails()) {
            $error = $validator->messages()->toJson();

            return response()->json(['status' => 'salah', 'message' => $error]);
        } else {

            $category              =   new Category;
            $category->name        =   $request->input('name');
            $result                =   $category->save();

            return redirect()->route('catIndeks');

            return response()->json(['status' => 'success', 'message' => $request->all()]);
        }
    }

    public function show($id) {
      $category = Category::find($id);

      return json_encode($category);
      //return view('admin.manageCategory.show')->withCategory($category);
    }

    public function update(Request $request, $id) {
      if (!empty($id)) {
            $validator  =   Validator::make($request->all(), [
                'name'       =>  'required|max:255',
            ]);
            if($validator->fails()) {
                $error  =   $validator->messages()->toJson();

                return response()->json(['status' => 'salah', 'message' => $error]);
            } else {
                $category              =   Category::find($id);
                $category->name        =   $request->input('name');
                $result                =   $category->save();

                return redirect()->route('catIndeks');

                return response()->json(['status' => 'success', 'message' => 'data was updated']);
            }
        } else {

            return response()->json(['status' => 'false', 'message' => 'No parameter Id selected']);
        }
    }

    public function destroy($id) {
      $category  =   Category::findOrFail($id);

      $response  =   $category->delete();

      return redirect()->route('catIndeks');

      return response()->json(['status' => 'success', 'message' => 'Data was deleted']);
    }
}
