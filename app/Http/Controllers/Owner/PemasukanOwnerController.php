<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PemasukanOwnerController extends Controller
{
    //fungsi view pemasukan owner
    public function pemasukan_owner()
    {
        return view(
            'owner.pemasukan-owner',
            [
                'title' => 'Pemasukan Owner',
                'acrive' => 'pemasukan'
            ]
        );
    }
}
