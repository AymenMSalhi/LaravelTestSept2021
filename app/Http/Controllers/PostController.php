<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posts;
use DB;

class PostController extends Controller
{
    public function addPost(Request $request) {
        posts::create($request->all());

        return response()->json(["message" => "Post added Successfully!"]);
    }

    /* Second way to Store post in Database */
    
    
    /*public function addPost(Request $request) {
        $website_ident = $request->input('website_ident');
        $website_ident = $request->input('title');
        $website_ident = $request->input('description');

        $posts = new posts();

        $posts->website_ident = $website_ident;
        $posts->title = $title;
        $posts->description = $description;

        return response()->json(["message" => "Post added Successfully!"]);
    }*/

    
}
