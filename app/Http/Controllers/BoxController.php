<?php

namespace App\Http\Controllers;

use App\Box;
use Illuminate\Http\Request;
use App\Http\Resources\BoxResource;
use Illuminate\Support\Facades\Auth;

class BoxController extends Controller
{

    public function index(Request $request)
    {
        return $request->user()->boxes;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'ammount' => 'required',
            'porcentage' => 'required',
        ]);

        $box = Box::create([
            'name' => $request->name,
            'ammount' => $request->ammount,
            'ammount_before' => 0,
            'porcentage' => $request->porcentage,
            'user_id' => Auth::id() 
        ]);

        return back();
    }

    public function show($box)
    {    
        $boxDetail = Box::where('id', $box)->with('accounts')->first();

        return view('box', compact('boxDetail'));
    }

    public function update(Request $request)
    {
        $box = Box::find($request->box);

        $box->ammount_before = $box->ammount;
        $box->ammount = $box->ammount + $request->ammount;

        $box->save();
        
        return back();
    }

    public function destroy(Box $box)
    {
        $box->accounts()->delete();

        $box->delete();

        return Response()->json(['message' => 'Eliminado correctamente']);
    }
}
