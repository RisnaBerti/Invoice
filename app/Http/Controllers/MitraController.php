<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    //fungsi index
    //fungsi view mitra owner
    public function index()
    {
        return view('owner.mitra-owner',
            [
                'title' => 'Mitra owner'
            ]
        );
    }

    //fung create mitra owner
    public function create()
    {
        return view('owner.create-mitra-owner',
            [
                'title' => 'Mitra owner'
            ]
        );
    }
}
