<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index()
    {
        return view('content.admin.pages.orders.list');
    }
}
