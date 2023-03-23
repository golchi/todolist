<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\listItem;

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
        // For now let's get all Items
        $allItems = listItem::all();
        return view('home',['allItems' => $allItems]);
    }
}
