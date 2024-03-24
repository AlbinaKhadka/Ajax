<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
        protected $fillable = ['title', 'description','person_id' ];
        public function person()
        {
            return $this->belongsTo(person::class);
        }
    }
    
