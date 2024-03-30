<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengeluaranAdminController extends Controller
{
    //fungsi index
    public function index()
    {
        return view(
            'admin.pengeluaran-admin',
            [
                'title' => 'Pengeluaran Admin'
            ]
        );
    }

    //fung create pengeluaran admin
    public function create()
    {
        return view(
            'admin.create-pengeluaran-admin',
            [
                'title' => 'Pengeluaran Admin'
            ]
        );
    }
}
