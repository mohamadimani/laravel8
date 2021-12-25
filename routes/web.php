<?php

use Illuminate\Support\Facades\Route;

 

// Route::get('/', function () {
//     return view('index');
// });
Route::view('/', 'index');

Route::get('/posts', 'PostController@index')->name('posts');
// Route::get('/posts', function () {
//     return view('posts.index');
// });


Route::get('/posts/newpost', 'PostController@newPost')->name('newPost');
Route::get('/posts/editpost/{postId}', 'PostController@editPost')->name('editPost');
// Route::get('/posts/create', function () {
    //     return view('posts.create');
    // });
    
    Route::post('/posts/insert_posts', 'PostController@insertPost')->name('insertPost');
    Route::put('/posts/updatepost/{postId}', 'PostController@updatePost')->name('updatePost');
    Route::delete('/posts/deletepost/{postId}', 'PostController@deletePost')->name('deletePost');
    
    Route::get('/gallery', 'GalleryController@index')->name('gallery');