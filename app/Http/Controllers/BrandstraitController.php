<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ModelKontak;
use App\Http\Traits\BrandTraits;

class BrandstraitController extends Controller
{
    use BrandTraits;

    public function index()
    {
        return $this->brandsAll();
    }

    public function addProduct()
    {
        $brands = $this->brandsAll();
    }
}
