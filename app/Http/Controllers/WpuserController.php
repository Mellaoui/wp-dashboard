<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Wpuser;

use Inertia\Inertia;
class WpuserController extends Controller
{
    
    public function index(){
        return inertia('Dashboard/index',[
            'wp_users' => Wpuser::all()
        ]);
    }

}
