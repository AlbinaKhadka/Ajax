<?php

use Illuminate\Support\Facades\Route;
use App\Models\person;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\CreatePostController;

Route::get('/person', function () {
    return view('person');
});

Route::get('/profile', function () {
    return view('profile'); 
})->name('profile');
Route::get('/Post', function () {
    return view('Posts'); 
});
Route::get('/list', function () {
    
    return view('list'); 
});
// Route::resource('posts', PostController::class);
// Route::get('/create', function () {
//     return view('create'); 
// });



Route::post('/person', [PersonController::class, 'store']);
Route::get('/latest-person', [PersonController::class, 'latestPerson']);
Route::post('/Post', [PostController::class, 'store']);
Route::get('/posts/latest-person', 'PostController@getPostsForLatestPerson');
Route::get('/posts/latest', [PostController::class, 'showPostsForLatestPerson'])->name('posts.latest');
Route::get('/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'delete'])->name('posts.delete');
Route::get('/list', [PostController::class, 'index'])->name('posts.list');//posts lists....
Route::get('/persons', [PersonController::class, 'persons'])->name('persons.list');//to show a one to one relationship
Route::put('/posts/update/{id}', [PostController::class, 'update'])->name('posts.update');

Route::get('/posts', [PostController::class, 'indexs'])->name('posts.list');
Route::get('/persons', [PersonController::class, 'showPersons'])->name('persons.list');

Route::get('/create', [CreatePostController::class, 'create'])->name('create');
Route::post('/create', [CreatePostController::class, 'store'])->name('store');
Route::get('/onetoone', [CreatePostController::class, 'showForm'])->name('onetoone.showForm');


