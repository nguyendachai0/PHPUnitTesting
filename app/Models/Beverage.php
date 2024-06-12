<?php

namespace App\Models;

use App\Exceptions\MinorCannotBuyAlcoholicBeverageException;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beverage extends Model
{
    use HasFactory;
    public function buy()
    {
        if (auth()->user()->isMinor()) {
            throw new MinorCannotBuyAlcoholicBeverageException();
        }
        return true;
    }
}
