<?php

use App\Http\Controllers\EsseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//SEARCH//

Route::get('/dashboard/search', [SearchController::class, 'getSearch'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/search/createConversation', [SearchController::class, 'createConversation'])->middleware(['auth', 'verified'])->name('dashboard'); 

Route::get('/dashboard/search/editConversation/{conversation_id}', [SearchController::class, 'getSearchById'])->middleware(['auth', 'verified'])->name('editGroup');

Route::get('/dashboard/search/updateConversation/{conversation_id}', [SearchController::class, 'updateConversation'])->middleware(['auth', 'verified'])->name('editGroup');

Route::get('/dashboard/deleteParticipant/{conversation_id}/{user_id}', [SearchController::class, 'deleteParticipant'])->middleware(['auth', 'verified'])->name('editGroup');

//PROFILE// 

Route::get('/dashboard/userProfile', [UserProfileController::class, 'getProfile'])->middleware(['auth', 'verified'])->name('profile');

Route::get('/dashboard/userProfile/{user_id}', [UserProfileController::class, 'getProfileById'])->middleware(['auth', 'verified'])->name('profile');


//DASHBOARD//

Route::get('/dashboard', [EsseController::class, 'getPosts'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/{id}', [EsseController::class,'getPost'])->middleware(['auth','verified'])->name('conversation');

Route::get('/dashboard/sendMessage/{id}', [EsseController::class,'sendMessage'])->middleware(['auth','verified'])->name('conversation');

// Route::get('/dashboard/posts', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// <?php

// use App\Http\Controllers\EsseController;
// use App\Http\Controllers\FindController;
// use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\SearchController;
// use App\Http\Controllers\UserProfileController;
// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// //DASHBOARD//

// Route::get('/dashboard', [EsseController::class, 'getPosts'])->middleware(['auth', 'verified'])->name('dashboard');
// Route::get('/dashboard/{id}', [EsseController::class,'getPost']);
// Route::get('/dashboard/sendMessage/{conversation_id}', [EsseController::class,'sendMessage']);

// // SEARCH //

// Route::get('/dashboard/search', [SearchController::class, 'getSearch'])->middleware(['auth', 'verified'])->name('search');

// //PROFILE// 

// Route::get('/dashboard/userProfile', [UserProfileController::class, 'getProfile'])->middleware(['auth', 'verified'])->name('profile');
// Route::get('/dashboard/userProfile/{user_id}', [UserProfileController::class, 'getProfileById'])->middleware(['auth', 'verified'])->name('profile');

// //FIND// 

// Route::get('/dashboard/find', [FindController::class, 'getProfileById'])->middleware(['auth', 'verified'])->name('find');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
