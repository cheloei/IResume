<?php

namespace App\Models;

use App\Models\grammer;
use App\Models\education;
use App\Models\portfolio;
use App\Models\experience;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class resume extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function persion(){
        return $this->hasOne(personInfo::class, 'resume');
    }

    public function callData(){
        return $this->hasOne(callData::class, 'resume');
    }

    public function education(){
        return $this->hasMany(education::class, 'resume');
    }

    public function skill(){
        return $this->hasMany(skill::class, 'resume');
    }

    public function experience(){
        return $this->hasMany(experience::class, 'resume');
    }

    public function portfolio(){
        return $this->hasMany(portfolio::class, 'resume');
    }

    public function grammer(){
        return $this->hasMany(grammer::class, 'resume');
    }

    public function messages(){
        return $this->hasMany(message::class, 'resume');
    }

    public function blogComments(){
        return $this->hasMany(BlogComment::class, 'resume');
    }
}
