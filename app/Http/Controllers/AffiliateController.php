<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Affiliate;
use App\Models\Wpuser;

use Inertia\Inertia;
class AffiliateController extends Controller
{
    
    public function index(){
        return inertia('Myaffiliates/affiliate',[
            
            'wp_affiliates'=>Affiliate::all()
        ]);
    }

}
