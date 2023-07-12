<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\TopicController;
use app\Http\Controllers\CommentController;
use App\Comment;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('topics', 'TopicController');

Route::resource('comments', 'CommentController');

//Route::get('Ctopic',[TopicController::class,'create'])->name('formtopic');

//Route::get('Comment.delete',[CommentController::class,'delete']);
//Route::get('delete/{id}', [CommentController::class,'delete'])->name('comments.delete');

Route::get('delete/{id}', 'CommentController@delete')->name('comments.delete');
