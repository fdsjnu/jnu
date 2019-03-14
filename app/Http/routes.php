<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

if (version_compare(PHP_VERSION, '7.2.0', '>=')) {
    // Ignores notices and reports all other kinds... and warnings
    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    // error_reporting(E_ALL ^ E_WARNING); // Maybe this is enough
}

Route::get('/', [
    'uses' => 'BlogController@index',
    'as'   => 'blog'
]);

Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as'   => 'blog.show'
]);

Route::post('/blog/{post}/comments', [
    'uses' => 'CommentsController@store',
    'as'   => 'blog.comments'
]);

Route::get('/category/{category}', [
    'uses' => 'BlogController@category',
    'as'   => 'category'
]);

Route::get('/author/{author}', [
    'uses' => 'BlogController@author',
    'as'   => 'author'
]);

Route::get('/tag/{tag}', [
    'uses' => 'BlogController@tag',
    'as'   => 'tag'
]);

Route::post('/blog/{post}/comments', [
    'uses' => 'CommentsController@store',
    'as' => 'blog.comments'
]);

Route::auth();

Route::get('/home', 'Backend\HomeController@index');
Route::get('/edit-account', 'Backend\HomeController@edit');
Route::put('/edit-account', 'Backend\HomeController@update');

Route::put('/backend/blog/restore/{blog}', [
    'uses' => 'Backend\BlogController@restore',
    'as'   => 'backend.blog.restore'
]);
Route::delete('/backend/blog/force-destroy/{blog}', [
    'uses' => 'Backend\BlogController@forceDestroy',
    'as'   => 'backend.blog.force-destroy'
]);
Route::resource('/backend/blog', 'Backend\BlogController');

Route::resource('/backend/categories', 'Backend\CategoriesController');

Route::get('/backend/users/confirm/{users}', [
    'uses' => 'Backend\UsersController@confirm',
    'as' => 'backend.users.confirm'
]);
Route::resource('/backend/users', 'Backend\UsersController');

Route::get('/backend/categories/search', [
    'uses' => 'Backend\CategoriesController@search',
    'as'   => 'backend.categories.search'
]);

Route::get('/backend/categoriessearch/search', [
    'uses' => 'Backend\CategoriesController@search',
    'as'   => 'backend.categories.search'
]);


Route::get('/backend/categoriessearch/search', 'Backend\CategoriesController@search');


Route::resource('/backend/departments', 'Backend\DepartmentController');

Route::get('/backend/departments/search', [
    'uses' => 'Backend\DepartmentController@search',
    'as'   => 'backend.departments.search'
]);

//Designations
Route::get('/backend/designations/search', [
    'uses' => 'Backend\Designations@search',
    'as'   => 'backend.designations.search'
]);
Route::resource('/backend/designations', 'Backend\Designations'); 

//JobPOst
Route::get('/backend/jobposts/search', [
    'uses' => 'Backend\JobPosts@search',
    'as'   => 'backend.jobposts.search'
]);
Route::get('/backend/editjobcategory/{jobid}/{postid}', [
    'uses' => 'Backend\JobPosts@editjobcategory',
    'as'   => 'backend.jobposts.editjobcategory'
]);
Route::put('/backend/updatejobcategory/{jobid}', [
    'uses' => 'Backend\JobPosts@updatejobcategory',
    'as'   => 'backend.jobposts.updatejobcategory'
]);


Route::resource('/backend/jobposts', 'Backend\JobPosts'); 
