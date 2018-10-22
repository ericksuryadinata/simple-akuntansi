<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;

class AccountApi extends Controller
{
    public function account(){
        $accounts = Account::latest()->get();
        return response()->json(compact('accounts'));
    }
}
