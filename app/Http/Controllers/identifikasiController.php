<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Facades\Instagram;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Validator;
use App\Penyakit_has_gejala;
use App\Penyakit;
use App\Gejala;

class identifikasiController extends Controller
{
    /*controller ini memiliki fungsi untuk:
      1. menyimpan (create) penyakit apa dan memiliki gejala apa saja
      2. menampilkan semua penyakit dan gejala yang dimilikinya
      3. menampilkan penyakit berdasarkan id dan gejala yang dimilikinya
      4. menentukan (diagnosa) penyakit berdasarkan inputan dari checkbox*/

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

    public function create() {
      $gejalas = Gejala::get();
      $penyakits = Penyakit::get(); //-- get penyakit_id

      $unggas = DB::table('gejalas')
                      ->select('id as id', 'deskripsi_gejala as deskripsi_gejala')
                      ->where('jenis_binatang', 'unggas')
                      ->get();

      $ruminansia = DB::table('gejalas')
                      ->select('id as id', 'deskripsi_gejala as deskripsi_gejala')
                      ->where('jenis_binatang', 'ruminansia')
                      ->get();

      return view('admin.managePenyakitHasGejala.create')
                    ->withGejalas($gejalas)
                    ->withPenyakits($penyakits)
                    ->withUnggas($unggas)
                    ->withRuminansia($ruminansia);
    }

    //-- tampilkan semua gejala ke view-penentuan penyakits
    public function tampilkan(){
      $gejalas = Gejala::get();

      return view('admin.penentuan_penyakit')->withGejalas($gejalas);
    }

    //-- simpan inputan penyakit beserta gejalanya
    public function store(Request $request){
          $validator = Validator::make($request->all(), [
            'penyakit_id'   => 'required',
            'gejala_id'     => 'required',
        ]);

        if($validator->fails()) {
            $error = $validator->messages()->toJson();

            return response()->json(['status' => 'salah', 'message' => $error]);
        } else {

          $values = $request->input('gejala_id');

          if (is_array($values) || is_object($values))
            {
              foreach ($request->input('gejala_id') as $gejala){
                $add_gejala = new Penyakit_has_gejala;
                $id_penyakit = $request->input('penyakit_id');
                $add_gejala->penyakit_id =   $request->input('penyakit_id');
                $add_gejala->timestamps = false;
                $jumlah_gejala = $request->input('gejala_id');
                $add_gejala->gejala_id = $gejala;

                $result                    =   $add_gejala->save();
              }
              $jum = count($jumlah_gejala);

              $response = DB::table('penyakits')
                            ->where('id', $id_penyakit)
                            ->update(array('jumlah_gejala' => $jum));

            }


            //return redirect()->route('daerah');

            return response()->json(['status' => 'success', 'message' => $request->all()]);
        }
    }
    //-- fungsi ini digunakan untuk menampilkan penyakit dengan semua gejalanya berdasarkan id penyakit
    public function show($id){
      $penyakit = Penyakit::find($id);
      $penyakit_has_gejala = Gejala::join('penyakit_has_gejala', 'penyakit_has_gejala.gejala_id', '=', 'gejalas.id')
                                      ->where('penyakit_has_gejala.penyakit_id', $id)
                                      ->select('gejalas.deskripsi_gejala')
                                      ->get();
      //return json_encode($penyakit_has_gejala);
      return view('admin.managePenyakitHasGejala.show',compact('penyakit','penyakit_has_gejala'));
    }

    //-- fungsi untuk menampilkan semua penyakit dan gejalanya
    public function getAllDesease() {
      $penyakit_has_gejala = DB::table('penyakit_has_gejala')
                                  ->join('penyakits', 'penyakit_has_gejala.penyakit_id', '=', 'penyakits.id')
                                  ->join('gejalas', 'penyakit_has_gejala.gejala_id', '=', 'gejalas.id')
                                  ->select('penyakits.nama_penyakit as nama_penyakit',
                                           'gejalas.deskripsi_gejala as gejala')
                                  ->get();

    }

    //-- proses penentuan penyakit berdasarkan inputan checkbox
    public function proses(Request $request){
      //-- get data from instagram API
      $ig = Instagram::getPosts();
      $ig2 = \array_slice($ig, 0, 3, true);
      $ig3 = \array_slice($ig, 3, 3, true);

      //-- get data penyakit dan gejala dari database
      $penyakit_has_gejala = DB::table('penyakit_has_gejala')
                                  ->join('penyakits', 'penyakit_has_gejala.penyakit_id', '=', 'penyakits.id')
                                  ->join('gejalas', 'penyakit_has_gejala.gejala_id', '=', 'gejalas.id')
                                  ->select('penyakits.jumlah_gejala as jumlah',
                                           'penyakits.nama_penyakit as nama_penyakit',
                                           'penyakits.deskripsi as diskripsi',
                                           'gejalas.deskripsi_gejala as gejala')
                                  ->get();

      //-- return jumlah gejala berdasarkan penyakit
      $jumlah_gej_per_penyakit = DB::table('penyakit_has_gejala')
                                  ->join('penyakits', 'penyakit_has_gejala.penyakit_id', '=', 'penyakits.id')
                                  ->join('gejalas', 'penyakit_has_gejala.gejala_id', '=', 'gejalas.id')
                                  ->select(DB::raw('count(gejalas.deskripsi_gejala) as total_gejala'),
                                          'penyakits.nama_penyakit as nama_penyakit',
                                           'gejalas.deskripsi_gejala as gejala')
                                  ->groupBy('penyakits.nama_penyakit')
                                  ->get();

//dd($jumlah_gej_per_penyakit);
      $merged = $jumlah_gej_per_penyakit->merge($penyakit_has_gejala);
      //$result = $merged->all();

      $yangMempunyaiGejalaSama = [];
      $res_array = [];
      $dia = [];
      $final = [];
      //-- get inputan dari checkbox
      $myCheckboxes = $request->input('gejala_id');

      $jumlah_item = count($myCheckboxes); //--menghitung jumlah item pada checkbox
      //-- mencari gejala yang sama di checkbox dengan gejala yang sama pada database,
      //-- jika menemukan gejala yang sama maka simpan nama_penyakit, gejala, dan jumlah_gejala
      //-- pada array $yangMempunyaiGejalaSama[]
      for ($i=0; $i < count($penyakit_has_gejala) ; $i++) {
        for ($j=0; $j < count($myCheckboxes) ; $j++) {
          if ( $myCheckboxes[$j] == $penyakit_has_gejala[$i]->gejala ) {
            $yangMempunyaiGejalaSama[$i]['nama_penyakit'] = $penyakit_has_gejala[$i]->nama_penyakit;
            $yangMempunyaiGejalaSama[$i]['deskripsi'] = $penyakit_has_gejala[$i]->diskripsi;
            $yangMempunyaiGejalaSama[$i]['gejala'] = $penyakit_has_gejala[$i]->gejala;
            $yangMempunyaiGejalaSama[$i]['jumlah_gejala'] = $penyakit_has_gejala[$i]->jumlah;
          }
      }
    }

      //-- reset array index biar tidak rancu pada saat looping
      $res_array = array_values($yangMempunyaiGejalaSama);

      //-- mencari jumlah_gejala yang sama pada array $res_array[] dengan jumlah gejala pada checkbox
      //-- jika terdapat yang sama maka masukan array $dia[]
      //-- pada proses ini terdapat kasus jumlah_gejala memang sama dengan checkbox tetapi
      //-- isi gejalanya tidak sama dengan checkbox
      for ($i=0; $i < count($res_array) ; $i++) {
        if ( $res_array[$i]['jumlah_gejala'] == count($myCheckboxes)) {
          $dia[$i]['namaPe'] = $res_array[$i]['nama_penyakit'];
          $dia[$i]['desk'] = $res_array[$i]['deskripsi'];
          $dia[$i]['geja'] = $res_array[$i]['gejala'];
          //-- ini hasil akhir diagnosis

        }
      }
      //-- memberikan index pada array $dia
      $rst = array_values($dia);
      $hitung = 0;

      //-- menghitung nama penyakit yang sama dan memberikan jumlah pada penyakit itu
      //-- kemudian membandingkan jumlah nama penyakit yang sama dengan jumlah gejala pada checkbox
      //-- karena jumlah nama penyakit yang sama merepresentasikan jumlah gejala
      for ($i=0; $i < count($rst) ; $i++) {
        for ($j=0; $j < count($rst) ; $j++) {
          if ( $rst[$i]['namaPe'] == $rst[$j]['namaPe']) {
            $hitung = $hitung + 1;
            $rst[$i]['jumlah'] = $hitung;

          } else {
            $hitung = 0;


          }
        }
      }

      for ($i=0; $i < count($rst) ; $i++) {
        if ( $rst[$i]['jumlah'] == count($myCheckboxes) ) {
          $final[$i]['penyakit'] = $rst[$i]['namaPe'];
          $final[$i]['desc']     = $rst[$i]['desk'];
        }
      }

      if (!$final) {
        $desName = $hasilAkhir['penyakit'] = "Tidak ada penyakit yang cocok";
        $desDesc = $hasilAkhir['desc'] = "";
      } else {
        $hasilAkhir = min($final);

        $desName = $hasilAkhir['penyakit'];
        $desDesc = $hasilAkhir['desc'];
      }

      return view('frontEnd.hasilDiagnosis')
                  ->withDesName($desName)
                  ->withDesDesc($desDesc)
                  ->with('postingan', $ig2)
                  ->with('postingan2', $ig3);
    }
}
