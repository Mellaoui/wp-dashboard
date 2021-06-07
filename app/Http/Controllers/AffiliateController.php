<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function index(){
       
        
        $aff_userid = Wpuser::all('ID')->toArray();
        $aff_user = Wpuser::all('user_login')->toArray();
        //display earnings and visits from affiliate table 
        $wp_affiliates = Affiliate::select('earnings','visits','referrals')->where('user_id',$aff_userid)->get();
        //$username = $wp_affiliates->user_login;
        
        //dd($aff_user);
        return inertia('Myaffiliates/affiliate',[
            'wp_affiliates'=>$wp_affiliates, 
            'aff_user'=>$aff_user
        ]);
    }

}
