<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class RtuController extends Controller
{
    public function index()
    {
        $data = ([
            'halaman' => 'List',
            'tools' => Tool::all(),
        ]);
        return view('user.rtu.index', $data);
    }
}
