<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class CartsController extends Controller
{
    public function index()
    {
        return view('content.admin.pages.carts.list');
    }
}
