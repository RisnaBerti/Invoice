<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemasukanAdminController extends Controller
{
    //fungsi view pemasukan admin
    public function index()
    {
        return view('admin.pemasukan-admin',
            [
                'title' => 'Pemasukan Admin'
            ]
        );
    }

    //fung create pemasukan admin
    public function create()
    {
        return view('admin.create-pemasukan-admin',
            [
                'title' => 'Pemasukan Admin'
            ]
        );
    }
}
