<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlbumItem extends Model
{
    use HasFactory;

    protected $table='album_item';


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

    public static function getListFileByAlbum($id){
        $result = [];
        $listFile = self::query()->where([
            'group_id' => $id
        ])->get();
        if ($listFile){
            foreach ($listFile as $item){
                $result[] = [
                    'name' => basename($item->image),
                    'size' => 125,
                    'url' => $item->image,
                    'item_id' => $item->id,
                ];
            }
        }
        return json_encode($result);
    }
}
