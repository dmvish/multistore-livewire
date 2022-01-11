<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class EmailRepliesController extends Controller
{
    public function index()
    {
        return view('content.admin.pages.email-replies.list');
    }
}
