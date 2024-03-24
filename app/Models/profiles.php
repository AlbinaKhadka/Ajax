<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    protected $fillable = ['contact', 'address', 'user_id'];
    public function person()
    {
        return $this->belongsTo(person::class);
    }
}
