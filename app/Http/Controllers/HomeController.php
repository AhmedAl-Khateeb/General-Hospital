<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $sections = Section::count();
        return view('Dashboard.Admin.dashboard', compact('sections'));
    }
}
