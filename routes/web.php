<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','App\Http\Controllers\ClientController@home');
Route::get('/retirer_produit/{id}','App\Http\Controllers\ClientController@retirer_produit');
Route::get('/select_par_cat/{name}','App\Http\Controllers\ClientController@select_par_cat');
Route::get('/shop','App\Http\Controllers\ClientController@shop');
Route::get('/panier','App\Http\Controllers\ClientController@panier');
Route::get('/client_login','App\Http\Controllers\ClientController@client_login');
Route::get('/signup','App\Http\Controllers\ClientController@signup');
Route::get('/paiement','App\Http\Controllers\ClientController@paiement');
Route::get('/logout','App\Http\Controllers\ClientController@logout');
Route::post('/creer_compte','App\Http\Controllers\ClientController@creer_compte');
Route::post('/acceder_compte','App\Http\Controllers\ClientController@acceder_compte');
Route::post('/modifier_qty/{id}','App\Http\Controllers\ClientController@modifier_panier');
Route::post('/payer','App\Http\Controllers\ClientController@payer');
Route::get('/ajouter_au_panier/{id}','App\Http\Controllers\ClientController@ajouter_au_panier');
Route::get('/produitbyid/{id}','App\Http\Controllers\ClientController@produitbyid');

Route::get('/voir_pdf/{id}','App\Http\Controllers\PdfController@voir_pdf');
Route::get('/admin','App\Http\Controllers\AdminController@dashboard');
Route::get('/commandes','App\Http\Controllers\AdminController@commandes');
Route::get('/ajoutercategorie','App\Http\Controllers\CategorieController@ajoutercategorie');
Route::get('/edit_categorie/{id}','App\Http\Controllers\CategorieController@edit_categorie');
Route::post('/modifiercategorie','App\Http\Controllers\CategorieController@modifiercategorie');
Route::post('/sauvercategorie','App\Http\Controllers\CategorieController@sauvercategorie');
Route::get('/categories','App\Http\Controllers\CategorieController@categories');
Route::get('/supprimercategorie/{id}','App\Http\Controllers\CategorieController@supprimercategorie');
Route::post('/sauverproduit','App\Http\Controllers\ProductController@sauverproduit');
Route::post('/modifierproduit','App\Http\Controllers\ProductController@modifierproduit');
Route::get('/ajouterproduit','App\Http\Controllers\ProductController@ajouterproduit');
Route::get('/supprimerproduit/{id}','App\Http\Controllers\ProductController@supprimerproduit');
Route::get('/edit_produit/{id}','App\Http\Controllers\ProductController@edit_produit');
Route::get('/activer_produit/{id}','App\Http\Controllers\ProductController@activer_produit');
Route::get('/desactiver_produit/{id}','App\Http\Controllers\ProductController@desactiver_produit');
Route::get('/produits','App\Http\Controllers\ProductController@produits');
Route::get('/totalproduct','App\Http\Controllers\ProductController@totalproduct');

Route::get('/editproduit','App\Http\Controllers\ProductController@produits');
Route::get('/sliders','App\Http\Controllers\SliderController@sliders');
Route::get('/ajouterslider','App\Http\Controllers\SliderController@ajouterslider');
Route::post('/sauverslider','App\Http\Controllers\SliderController@sauverSlider');
Route::post('/modifierslider','App\Http\Controllers\SliderController@modifierslider');
Route::get('/edit_slider/{id}','App\Http\Controllers\SliderController@edit_slider');
Route::get('/supprimerslider/{id}','App\Http\Controllers\SliderController@supprimerslider');
Route::get('/desactiver_slider/{id}','App\Http\Controllers\SliderController@desactiver_slider');
Route::get('/activer_slider/{id}','App\Http\Controllers\SliderController@activer_slider');


Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index']);
