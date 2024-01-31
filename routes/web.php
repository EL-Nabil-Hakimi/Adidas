<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//l'affichage des pages
Route::get('/Product', [ProductController::class , 'index'])->name("ProductView");
Route::get('/Client', [ClientController::class , 'index'])->name("ClientView");
Route::get('/Categorie', [CategorieController::class , 'index'])->name("CategorieView");

//l'affichage des page D'ajout
Route::get('/addclient', [ClientController::class , 'AddClientPage'])->name("AddclientView");
Route::get('/addproduit', [ProductController::class , 'AddProduitPage'])->name("AddProduitView");
Route::get('/addcategorie', [CategorieController::class , 'AddCategoriePage'])->name("AddCategorieView");

//l'affichage des page De Modification
Route::get('/modifyclient', [ClientController::class , 'modifyClientPage'])->name("modifyclientView");
Route::get('/modifyproduit', [ProductController::class , 'modifyProduitPage'])->name("modifyProduitView");
Route::get('/modifycategoriepage', [CategorieController::class , 'modifyCategoriePage'])->name("modifyCategorieView");

// Traitemment d'ajout
Route::post('/Add_Client', [ClientController::class, 'Add_Client'])->name("Add_Client");
Route::post('/Add_Pdouit', [ProductController::class, 'Add_Produit'])->name("Add_Pdouit");
Route::post('/addcategorie', [CategorieController::class, 'AddCategorie'])->name("AddCategorie");

// Traitemment de Supprission


Route::get('/delete_client', [ClientController::class, 'Delete_Client'])->name("/delete_client");
Route::get('/Delete_Produit', [ProductController::class, 'Delete_Produit'])->name("Delete_Produit");
Route::get('/DeleteCategorie', [CategorieController::class, 'DeleteCategorie'])->name("DeleteCategorie");

// Traitemment De Modification
Route::post('/Modify_Client', [ClientController::class , 'Modify_Client'])->name("modify_client");
Route::post('/Modify_Pdouit', [ProductController::class , 'Modify_Produit'])->name("Modify_Pdouit");
Route::post('/modifycategorie', [CategorieController::class , 'modifyCategorie']);