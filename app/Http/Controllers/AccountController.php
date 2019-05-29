<?php

namespace App\Http\Controllers;

use App\Box;
use App\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function store(Request $request)
    {
        $account = Account::create($request->all());

        $this->updateBox($request->ammount, $request->type, $request->box_id);

        return back();
    }

    public function updateBox($ammount, $type, $id)
    {
        $box = Box::find($id);

        $box->ammount_before = $box->ammount;

        if($type == "gasto"){
            $box->ammount = $box->ammount - $ammount;
        }else{
            $box->ammount = $box->ammount + $ammount;
        }

        $box->save();
    }

    public function update(Request $request, Account $account)
    {
        //
    }

}
