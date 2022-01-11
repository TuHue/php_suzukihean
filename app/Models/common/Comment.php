<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';

    protected $fillable = [
       'name',
       'note',
       'customer_id',
       'created_by',
       'updated_by',
    ];
}
