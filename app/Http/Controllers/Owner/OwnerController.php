<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    //fungsi dashboard view
    public function owner() {
        return view('owner.dashboard-owner',
        [
            'title' => 'Dashboard Owner',
            'active' => 'dashboard-owner'
        ]);
    }

    
}
