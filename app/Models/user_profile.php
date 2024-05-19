<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_profile extends Model
{
    use HasFactory;
    protected $fillable = ['education','location','skills','position','bio','user_id','avatar'];

    public function user(){
       return $this->belongsTo(User::class);
    }
    
}
