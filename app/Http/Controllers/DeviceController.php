<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index()
{
    $devices = \App\Models\Device::with('owner')->latest('created_at')->get();
    
    return view('pages.devices.index', compact('devices'));
}
}