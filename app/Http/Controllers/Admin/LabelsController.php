<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class LabelsController extends Controller
{
    public function index()
    {
        return view('content.admin.pages.labels.list');
    }
}
