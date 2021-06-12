<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Wpuser extends Model
{
    use HasFactory;
    //protected $connection = 'wordpress';
    protected $table = 'wp_users';

    public function affiliate(){

        return $this->hasOne(Affiliate::class);

    }

}
