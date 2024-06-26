<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use Illuminate\Http\Request;

class BeverageController extends Controller
{
    public function index()
    {
        $beverages = Beverage::all();
        return view('beverage.index', compact('beverages'));
    }
    public function show(Beverage $beverage)
    {
        $beverage = Beverage::findOrFail($beverage->id);
        return view('beverage.show', compact('beverage'));
    }
}
