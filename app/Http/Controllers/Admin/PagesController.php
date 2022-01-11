<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('content.admin.pages.static-pages.list');
    }
}
