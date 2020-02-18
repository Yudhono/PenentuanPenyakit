<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Gejala;

class gejalaController extends Controller
{
  /*controller ini berfungsi untuk management gejala (CRUD gejala)*/

  /**method contructor untuk construct method middleware menentukan method mana saja dalam
    controller ini yaang digunakan untuk masing masing role berdasarkan permissionnya**/
    // function __construct()
    // {
    //      //-- permission mengizinkan semua method untuk dapat digunakan
    //      $this->middleware('permission:role-list');
    //      //-- permission mengizinkan hanya method createV() dan store() yang boleh digunakan oleh role
    //      $this->middleware('permission:role-create', ['only' => ['createV', 'store']]);
    //      //-- permission mengizinkan hanya method edit() dan update() yang boleh digunakan oleh role
    //      $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
    //      //-- permission mengizinkan hanya method destroy
    //      $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }

  public function index()
  {
      $gejalas =  Gejala::orderBy('id', 'asc')->get();

      //return json_encode($gejalas);
      return view('admin.manageGejala.index')->withGejalas($gejalas);
  }

  public function createV(){
      return view('admin.manageGejala.create');
  }

  public function create(Request $request)
  {
        $validator = Validator::make($request->all(), [
          'deskripsi_gejala'        => 'required|max:255',
          'jenis_binatang'          => 'required|max:255'
      ]);

      if($validator->fails()) {
          $error = $validator->messages()->toJson();

          return response()->json(['status' => 'salah', 'message' => $error]);
      } else {

          $gejala                     =   new Gejala;
          $gejala->deskripsi_gejala   =   $request->input('deskripsi_gejala');
          $gejala->jenis_binatang     =   $request->input('jenis_binatang');
          $result                     =   $gejala->save();

          return back();

          return response()->json(['status' => 'success', 'message' => $request->all()]);
      }


  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      //
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
      $gejala = Gejala::find($id);

      //return json_encode($gejala);
      return view('admin.manageGejala.show')->withGejala($gejala);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $gejala = Gejala::find($id);

    return view('admin.manageGejala.update')->withGejala($gejala);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
        if (!empty($id)) {
          $validator  =   Validator::make($request->all(), [
              'deskripsi_gejala'       =>  'required|max:255',
          ]);
          if($validator->fails()) {
              $error  =   $validator->messages()->toJson();

              return response()->json(['status' => 'salah', 'message' => $error]);
          } else {
              $gejala                      =   Gejala::find($id);
              $gejala->deskripsi_gejala    =   $request->input('deskripsi_gejala');
              $gejala->jenis_binatang      =   $request->input('jenis_binatang');

              $result                      =   $gejala->save();

              //return back();

              return response()->json(['status' => 'success', 'message' => 'data was updated']);
          }
      } else {

          return response()->json(['status' => 'false', 'message' => 'No parameter Id selected']);
      }
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $gejala    =   Gejala::findOrFail($id);

    $response  =   $gejala->delete();

    //return redirect()->route('daerah');

    return response()->json(['status' => 'success', 'message' => 'Data was deleted']);
  }
}
