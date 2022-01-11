<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        return view('content.admin.pages.products.list');
    }
}
