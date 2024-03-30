<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //fungsi view dashboard admin
    public function admin()
    {
        return view('admin.dashboard-admin',[
            'title' => 'Dashboard Admin',
            'active' => 'dashboard-admin'
        ]);
    }
}
