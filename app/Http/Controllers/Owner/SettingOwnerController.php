<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingOwnerController extends Controller
{
    //fungsi index
    public function index()
    {
        return view(
            'owner.setting-owner',
            [
                'title' => 'Setting',
                'active' => 'Setting'
            ]
        );
    }
}
