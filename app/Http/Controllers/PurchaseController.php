<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class PurchaseController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function buy(Request $request)
    {
        Purchase::create($request->all());
        return response(null, 201);
    }
}
