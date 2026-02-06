<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Mengambil user dengan hitungan jumlah device yang dimiliki
        $users = User::withCount('devices')
                     ->latest('created_at')
                     ->get();

        return view('pages.users.index', compact('users'));
    }
}