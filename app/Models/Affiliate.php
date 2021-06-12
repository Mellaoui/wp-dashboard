<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Affiliate extends Model
{
    use HasFactory;
    //protected $connection = 'wordpress';
    protected $table = 'wp_affiliate_wp_affiliates';

    public function wpuser(){
        
        return $this->belongsTo(Wpuser::class,'user_id');
    }
}
