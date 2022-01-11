<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        return view('content.admin.pages.customers.list');
    }
}
