<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    public static function getCountryList(){
        $result = self::where([
            'status' => 1
        ])->pluck('name', 'id')->toArray();
        if($result){
            return $result;
        }
        return [];
    }
}
