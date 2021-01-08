<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WelcomeController extends Controller
{
    public function index()
    {
        $response = Http::get('https://api.kawalcorona.com/indonesia')->json();
        $provinsi = Http::get('https://api.kawalcorona.com/indonesia/provinsi')->json();
        return view('welcome', compact('response', 'provinsi'));
    }
}
