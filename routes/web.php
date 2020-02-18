<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', function () {
    return view('frontEnd.halamanLogin');
})->name('halLog');

Route::get('/hasilDI', function () {
    return view('frontEnd.hasilDiagnosis');
});


Route::group(['middleware' => ['auth', 'instagram']], function() {
    //Route::get('/', 'AppController@index');

    Route::get('/search', 'AppController@search');

    Route::get('/instagram', 'InstagramController@redirectToInstagramProvider');

    Route::get('login/instagram/callback', 'InstagramController@handleProviderInstagramCallback');

    Route::resource('roles','RoleController');
    Route::resource('users','UserController');

    Route::get('/tes', 'identifikasiController@create');
    // Route::get('/', function () {
    //     return view('welcome');
    // });
    Route::get('/about', 'aboutFEController@index')->name('about');
    Route::get('/landing', 'frontEndAuthController@viewLanding')->name('landing');
    Route::get('/khususD', 'frontEndAuthController@viewKhususDiagnosa')->name('khususD');

    //-- route untuk menampilan view diagnosis yang menampilkan semua gejala
    Route::get('/diagnosisUnggas', 'diagnosisController@tampilkanGejalaUnggas')->name('diagUnggas');
    Route::get('/diagnosisRuminansia', 'diagnosisController@tampilkanGejalaRuminansia')->name('diagRuminansia');

    //-- route untuk menampilkan view managePenyakitHasGejala (Create penyakit apa mempunyai gejala apa)
    Route::get('/createPenyakitandGejala', 'identifikasiController@create')->name('identifikasi');
    //-- route untuk menyimpan penyakit apa mempunyai gejala apa
    Route::post('simpan', 'identifikasiController@store')->name('simpan');
    //-- route yang digunakan untuk menampilkan penyakit dan gejala berdasarkan id
    Route::get('/tampilPenyakit/{id?}', 'identifikasiController@show')->name('tampilPenyakit');

    //-- route yang digunakan untuk menampilakn view penentuan/diagnosa penyakit
    Route::get('/penentuan_penyakit', 'identifikasiController@tampilkan');
    //-- route yang digunakan untuk memproses diagnosa penyakit
    Route::post('proses', 'identifikasiController@proses')->name('proses');

    //=====================Routenya gejalaController====================================
    Route::get('/viewCreateG', 'gejalaController@createV')->name('viewG');

    Route::post('create', 'gejalaController@create')->name('gejalaInput');
    Route::get('indeks', 'gejalaController@index')->name('gejalaIndeks');
    Route::delete('create/delete/{id}', 'gejalaController@destroy')->name('gejalaDelete');
    Route::get('create/{id?}', 'gejalaController@show')->name('gejalaLihat');
    Route::get('edit/{id?}', 'gejalaController@edit')->name('gejalaEdit');
    Route::post('create/{id?}', 'gejalaController@update')->name('gejalaUpdate');
    //====================================================================================

    //=====================Routenya penyakitController====================================
    Route::get('/viewCreateP', 'penyakitController@createV')->name('viewP');

    Route::post('createPenyakit', 'penyakitController@create')->name('penyakitInput');
    Route::get('indeksPenyakit', 'penyakitController@index')->name('penyakitIndeks');
    Route::delete('createPenyakit/delete/{id}', 'penyakitController@destroy')->name('penyakitDelete');
    Route::get('createPenyakit/{id?}', 'penyakitController@show')->name('penyakitLihat');
    Route::get('editPenyakit/{id?}', 'penyakitController@edit')->name('penyakitEdit');
    Route::post('createPenyakit/{id?}', 'penyakitController@update')->name('penyakitUpdate');
    //====================================================================================
    Route::get('/blog', 'frontendBlogController@getIndex')->name('blog');
    Route::get('/blogSingle/{id?}', 'frontendBlogController@getSingle')->name('blogSingle');
    //=====================Routenya postsController=======================================
    Route::get('/viewCreatePost', 'postsController@createV')->name('viewPost');

    Route::post('createPost', 'postsController@create')->name('postInput');
    Route::get('indeksPost', 'postsController@index')->name('postIndeks');
    Route::delete('createPost/delete/{id}', 'postsController@destroy')->name('postDelete');
    Route::get('createPost/{id?}', 'postsController@show')->name('postLihat');
    Route::get('editPost/{id?}', 'postsController@edit')->name('postEdit');
    Route::post('createPost/{id?}', 'postsController@update')->name('postUpdate');
    //====================================================================================

    //=====================Routenya categoryController====================================
    Route::get('/viewCreateCat', 'categoryController@createV')->name('viewCat');

    Route::post('createCat', 'categoryController@create')->name('catInput');
    Route::get('indeksCat', 'categoryController@index')->name('catIndeks');
    Route::delete('createCat/delete/{id}', 'categoryController@destroy')->name('catDelete');
    Route::get('createCat/{id?}', 'categoryController@show')->name('catLihat');
    Route::get('editCat/{id?}', 'categoryController@edit')->name('catEdit');
    Route::post('createCat/{id?}', 'categoryController@update')->name('catUpdate');
    //====================================================================================

    //=====================Routenya buat comment==========================================
    Route::post('comments/{post_id}', ['uses' => 'commentController@store', 'as' => 'comments.store']);
    Route::get('comments/{id}/edit', ['uses' => 'commentController@edit', 'as' => 'comments.edit']);
    Route::post('comments/rubah/{id}', ['uses' => 'commentController@update', 'as' => 'comments.update']);
    Route::delete('comments/{id}', ['uses' => 'commentController@destroy', 'as' => 'comments.destroy']);
    Route::get('comments/{id}/delete', ['uses' => 'commentController@delete', 'as' => 'comments.delete']);
    //====================================================================================

});
