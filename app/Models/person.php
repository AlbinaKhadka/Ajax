<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\profiles;
use App\Models\posts;


class person extends Model

    {
        protected $table = 'person';
protected $fillable=['fullname','email','password'];
     public function profile()
        {
            return $this->hasOne(profiles::class);
        }
        public function posts()
    {
        return $this->hasMany(posts::class);
    }
    
    }
    

