<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WelcomeController extends Controller
{
    public function index()
    {
        $response =  cache()->remember('home', 60 * 60 * 60, function () {
            return Http::get('https://api.kawalcorona.com/indonesia')->json();
        });
        $provinsi =  cache()->remember('home-provinsi', 60 * 60 * 60, function () {
            return Http::get('https://api.kawalcorona.com/indonesia/provinsi')->json();
        });

        return view('welcome', compact('response', 'provinsi'));
    }
}
