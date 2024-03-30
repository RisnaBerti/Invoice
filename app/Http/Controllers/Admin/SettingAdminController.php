<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingAdminController extends Controller
{
     //fungsi index
     public function index()
     {
         return view(
             'admin.setting-admin',
             [
                 'title' => 'Setting',
                 'active' => 'Setting'
             ]
         );
     }
}
