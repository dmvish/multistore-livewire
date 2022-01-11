<?php

namespace App\Http\Controllers\Admin;

class DashboardController extends Controller
{
    public function index()
    {
        return view('content.admin.pages.dashboard');
    }
}
