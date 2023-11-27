<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //direct product list page
    public function list()
    {
        return view('admin.product.list');
    }
}
