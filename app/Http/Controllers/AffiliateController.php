<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use App\Models\Affiliate;
use App\Models\Wpuser;

use Inertia\Inertia;
class AffiliateController extends Controller
{

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index( Wpuser $aff_user){
        
        $wp_affiliates = Affiliate::all();
      
        
       
        $aff_user = Wpuser::select('user_nicename')->cursor();
        
        return inertia('Myaffiliates/affiliate',[
            'wp_affiliates'=>$wp_affiliates, 'aff_user'=>$aff_user
        ]);
    }

}
