<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('layout.tamplate');
    }

    public function product() {
        return view('product');
    }

    public function news($id) {
        return view('news')->with('id', $id);
    }

    public function program() {
        return view('program');
    }

    public function about() {
        return view('about-us');
    }

    public function contact() {
        return view('contact-us');
    }
}
