<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideItem extends Model
{
    use HasFactory;

    protected $table = 'slide_item';


    protected $fillable = [
        'name',
        'value',
        'description',
        'type',
        'status',
        'image',
        'created_by',
        'updated_by',
        'group_id',
    ];

}
