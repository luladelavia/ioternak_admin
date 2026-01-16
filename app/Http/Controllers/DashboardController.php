<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data dummy sesuai tampilan "Pluto"
        $stats = [
            'welcome' => 2500,
            'avg_time' => 123.50,
            'collections' => 1805,
            'comments' => 54
        ];

        return view('dashboard', compact('stats'));
    }
}