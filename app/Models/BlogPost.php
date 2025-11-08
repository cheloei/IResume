<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

require_once 'jdf.php';

class BlogPost extends Model
{
    use HasFactory;

    protected $appends = ['ctime', 'tcategory'];
    protected $guarded = [];
    
    public function getCtimeAttribute(){
        $date = explode('-', explode(' ', $this->updated_at)[0]);
        return gregorian_to_jalali($date[0], $date[1], $date[2], '/');
    }

    public function getTcategoryAttribute(){
        return BlogCategory::find($this->category)->title;
    }
}
