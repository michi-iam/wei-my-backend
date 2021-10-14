<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BackendController;
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
//     return view('frontend.startseite');
// });

// Route::prefix('')->group(function () {
 //   Route::get("", [FrontendController::class, "index"]);
// });

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('backend.dashboard');
// })->name('dashboard');



Route::get("/meinlogout", [BackendController::class, "meinlogout"])->name("meinlogout");

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    Route::get("", [FrontendController::class, "index"]);

    Route::get('/dashboard', [BackendController::class, "index"]);

    Route::post("/add_new_post", [BackendController::class, "add_new_post"])->name("add_new_post");
    Route::post("/add_new_image", [BackendController::class, "add_new_image"])->name("add_new_image");

    Route::post("/set_images_for_post", [BackendController::class, "set_images_for_post"])->name("set_images_for_post");

    Route::get("/edit_post", [BackendController::class, "edit_post"])->name("edit_post");
    Route::post("/update_post", [BackendController::class, "update_post"])->name("update_post");
    Route::post("/delete_post", [BackendController::class, "delete_post"])->name("delete_post");
    Route::post("/toggle_post_active", [BackendController::class, "toggle_post_active"])->name("toggle_post_active");
    
    Route::get("/edit_image", [BackendController::class, "edit_image"])->name("edit_image");
    Route::post("/update_image", [BackendController::class, "update_image"])->name("update_image");
    Route::post("/delete_image", [BackendController::class, "delete_image"])->name("delete_image");
    
    
    Route::post("/update_businesshours", [BackendController::class, "update_businesshours"])->name("update_businesshours");
    
    
    Route::post("/update_post_category", [BackendController::class, "update_post_category"])->name("update_post_category");

});