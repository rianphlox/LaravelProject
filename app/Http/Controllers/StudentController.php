<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function index() {
        dd('index');
    }

    public function store(Request $request, $mat) {
        dd('store');
    }
}
