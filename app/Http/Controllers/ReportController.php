<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
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
    }

    public function create(){
        return view('report/create');
    }

    public function save(Request $request){
        return dd($request->all());
    }

    public function detail($id){
        return "This is post".$id;
    }


}
