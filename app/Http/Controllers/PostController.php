<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\posts;
use DB;

use Illuminate\Support\Facades\Mail;
use App\Mail\NotifMail;

class PostController extends Controller
{
    public function addPost(Request $request) {
        $website_ident = $request->input('website_ident');
        $title = $request->input('title');
        $description = $request->input('description');

        $subscribers = DB::table('subscribers')->where('website_ident', '=', $website_ident)->get();

        foreach ($subscribers as $key => $user) {
            Mail::to($user->email)->send(new NotifMail($title, $description));
        }

        posts::create($request->all());


        //return response()->json($subscribers);
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
