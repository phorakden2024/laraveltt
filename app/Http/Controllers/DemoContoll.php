<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DemoContoll extends Controller
{
    public function tag(){
        return view('tag');
    }
    public function category()
    {
        return 'this is cotegory page';
    }
    public function blog()
    {
        return 'this is blog page';
    }
}
