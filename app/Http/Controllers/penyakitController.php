<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Penyakit;
use App\Gejala;

class penyakitController extends Controller
{
  /*controller ini memiliki fungsi untuk management penyakit (CRUD penyakit)*/

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
      $penyakits =  Penyakit::orderBy('id', 'asc')->get();

      //return json_encode($penyakits);
      return view('admin.managePenyakit.index')->withPenyakits($penyakits);
  }

  public function createV(){
      return view('admin.managePenyakit.create');
  }

  public function create(Request $request)
  {
        $validator = Validator::make($request->all(), [
          'nama_penyakit'        => 'required|max:255',
          'deskripsi'            => 'required|max:255',
          'jenis_binatang'       => 'required|max:255'
      ]);

      if($validator->fails()) {
          $error = $validator->messages()->toJson();

          return response()->json(['status' => 'salah', 'message' => $error]);
      } else {

          $penyakit                  = new Penyakit;
          $penyakit->nama_penyakit   = $request->input('nama_penyakit');
          $penyakit->deskripsi       = $request->input('deskripsi');
          $penyakit->jenis_binatang  = $request->input('jenis_binatang');
          $result                    = $penyakit->save();

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
      $penyakit = Penyakit::find($id);
      $penyakit_has_gejala = Gejala::join('penyakit_has_gejala', 'penyakit_has_gejala.gejala_id', '=', 'gejalas.id')
                                      ->where('penyakit_has_gejala.penyakit_id', $id)
                                      ->select('gejalas.deskripsi_gejala')
                                      ->get();
      //return json_encode($penyakit);
      return view('admin.managePenyakit.show', compact('penyakit','penyakit_has_gejala'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    $penyakit = Penyakit::find($id);

    return view('admin.managePenyakit.update')->withPenyakit($penyakit);
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
              'nama_penyakit'       =>  'required|max:255',
              'deskripsi'           =>  'required|max:255',
          ]);
          if($validator->fails()) {
              $error  =   $validator->messages()->toJson();

              return response()->json(['status' => 'salah', 'message' => $error]);
          } else {
              $penyakit                   =   Penyakit::find($id);
              $penyakit->nama_penyakit    =   $request->input('nama_penyakit');
              $penyakit->deskripsi        =   $request->input('deskripsi');
              $penyakit->jenis_binatang   =   $request->input('jenis_binatang');
              $result                     =   $penyakit->save();

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
    $penyakit    =   Penyakit::findOrFail($id);

    $response  =   $penyakit->delete();

    //return redirect()->route('daerah');

    return response()->json(['status' => 'success', 'message' => 'Data was deleted']);
  }
}
