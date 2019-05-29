<?php

namespace App\Http\Controllers;

use App\Box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $boxes = Auth::user()->boxes;

        $total = Box::where('user_id', Auth::id())
                        ->selectRaw('sum(ammount) total')
                        ->get();


        return view('home', [
            'boxes' => $boxes,
            'total' => $total
        ]);
    }
}
