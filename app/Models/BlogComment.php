<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
require_once 'jdf.php';
class BlogComment extends Model
{
    use HasFactory;

    protected $appends = ['ctime'];
    protected $guarded = [];

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope('status', function ($builder) {
            $builder->where('status', 1);
        });
    }

    public function getCtimeAttribute(){
        $date = explode('-', explode(' ', $this->updated_at)[0]);
        return gregorian_to_jalali($date[0], $date[1], $date[2], '/');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post(){
        return $this->belongsTo(BlogPost::class, 'post_id');
    }
}
