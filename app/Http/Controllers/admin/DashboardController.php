<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    public function content()
    {
        // Mark as logged-in for demo navigation state
        session(['is_logged_in' => true]);
        return view('dashboard.content');
    }
}
