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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/reports', function(){
    $posts = [
        ['id' => 1, 'title' => 'Post 1', 'body' => 'This is post 1'],
        ['id' => 2, 'title' => 'Post 2', 'body' => 'This is post 2'],
        ['id' => 3, 'title' => 'Post 3', 'body' => 'This is post 3'],
        ['id' => 4, 'title' => 'Post 4', 'body' => 'This is post 4']
    ];

    echo '<ul>';
    foreach($posts as $post){
        echo '<li><a href="/report/'.$post["id"].'">'.$post["title"].'</a></li>';
    }
    echo '</ul>';
});

Route::get('/report/{id}', function($id){
    return "This is post".$id;
});

Route::get('/about', function(){
    return "Developers";
});
