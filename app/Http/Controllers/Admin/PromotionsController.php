<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class PromotionsController extends Controller
{
    public function index()
    {
        return view('content.admin.pages.promotions.list');
    }
}
