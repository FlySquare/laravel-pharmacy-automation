<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index()
    {
        $data['drags_stock'] = \App\Models\drags::where('stock', '>', 0)->count('*');
        $data['drags_no_stock'] = \App\Models\drags::where('stock', '=', 0)->count('*');
        $data['orders'] = \App\Models\orders::count('*');
        return view('dashboard')->with('data', $data);
    }
}
