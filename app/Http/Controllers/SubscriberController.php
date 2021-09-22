<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subscribers;
use DB;

class SubscriberController extends Controller
{
    public function SubscribeUser(Request $request) {
        $email = $request->input('email');
        $website_ident = $request->input('website_ident');

        $verif = subscribers::where([
            ['email', '=', $email],
            ['website_ident', '=', $website_ident]
        ])->first();

        if(empty($verif)) {
            subscribers::create($request->all());
            return response()->json(["message" => "Congratulations! you successfully subscribed to our website"]);
        } else {
            return response()->json(["message" => "Welcome back! You already subscribed to our website."]);
        }
    }
}
