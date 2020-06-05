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

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

Route::get('/services', 'PagesController@services');

Route::resource('posts', 'PostsController');

Route::resource('user', 'UserController');

Route::resource('questionbank', 'QuestionBankController');

Route::resource('editor', 'CKEditorController');

Route::post('ckeditor/image_upload', 'CKEditorController@upload')->name('upload');


Route::get('/searchQuestions', 'QuestionBankController@search');

// Route::get('/users/{id}', function ($id) {
//     return 'This is user ' . $id;
// });


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/search', 'LiveSearch@action');

Route::post('/searchpapers', 'LiveSearch@actionPapers');

Route::post('/searchposts', 'LiveSearch@actionPosts');

//MultiUserLevel Routes

Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');

Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');

Route::post('/login/admin', 'Auth\LoginController@adminLogin');

Route::post('/register/admin', 'Auth\RegisterController@createAdmin');

Route::resource('admin', 'AdminController');

Route::resource('adminUser', 'AdminUserController');

Route::resource('adminPost', 'AdminPostsController');

Route::resource('adminQuestionBank', 'AdminQuestionBankController');

Route::resource('adminComment', 'AdminCommentController');

Route::resource('pastpapers', 'PastPapersController');