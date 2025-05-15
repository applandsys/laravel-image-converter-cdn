<?php

namespace App\Http\Controllers;

use App\Models\ImageList;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $imageList = ImageList::orderBy('created_at', 'desc')->paginate(50);
        return view('home', compact('imageList'));
    }
}
