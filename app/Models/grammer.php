<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class grammer extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected function lang(): Attribute
    {
        return Attribute::make(
            get: function ($value){
                $title = null;
                switch ($value) {
                    case 1:
                        $title = 'آذری';
                    break;
                    case 2:
                        $title = 'آلمانی';
                    break;
                    case 3:
                        $title = 'ارمنی';
                    break;
                    case 4:
                        $title = 'اسپانیایی';
                    break;
                    case 5:
                        $title = 'انگلیسی';
                    break;
                    case 6:
                        $title = 'ایتالیایی';
                    break;
                    case 7:
                        $title = 'ترکی استانبولی';
                    break;
                    case 8:
                        $title = 'چینی';
                    break;
                    case 9:
                        $title = 'روسی';
                    break;
                    case 10:
                        $title = 'ژاپنی';
                    break;
                    case 11:
                        $title = 'سوئدی';
                    break;
                    case 12:
                        $title = 'عربی';
                    break;
                    case 13:
                        $title = 'فارسی';
                    break;
                    case 14:
                        $title = 'فرانسوی';
                    break;
                    case 15:
                        $title = 'فنلاندی';
                    break;
                    case 16:
                        $title = 'کردی';
                    break;
                    case 17:
                        $title = 'کره ای (هانگول)';
                    break;
                    case 18:
                        $title = 'هلندی';
                    break;
                    case 19:
                        $title = 'هندی';
                    break;
                    
                    default:
                        # code...
                        break;
                }
                return [
                    'orginal' => $value,
                    'name' => $title
                ];
            }
        );
    }

    protected function level(): Attribute
    {
        return Attribute::make(
            get: function ($value){
                $title = null;
                switch ($value) {
                    case 1:
                        $title = 'مبتدی';
                    break;
                    case 2:
                        $title = 'متوسط';
                    break;
                    case 3:
                        $title = 'حرفه ای';
                    break;
                    case 4:
                        $title = 'زبان مادری';
                    break;
                    
                    default:
                        # code...
                        break;
                }
                return [
                    'orginal' => $value,
                    'name' => $title
                ];
            }
        );
    }
}
