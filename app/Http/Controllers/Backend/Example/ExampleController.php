<?php

namespace App\Http\Controllers\Backend\Example;

use App\Http\Controllers\Controller;

class ExampleController extends Controller
{
    public function index()
    {
        return view('example.form');
    }
}
