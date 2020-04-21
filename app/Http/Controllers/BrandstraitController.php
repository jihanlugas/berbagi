<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelKontak;
use App\Http\Traits\BrandsTrait;

class BrandstraitController extends Controller
{
    use BrandsTrait;

    public function addProduct()
    {
        $brands = $this->brandsAll();
    }
}
