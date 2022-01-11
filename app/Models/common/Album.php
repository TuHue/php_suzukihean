<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class Album extends Model
{
    use HasFactory, HasActionColumn;

    protected $table='album';

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

    public static function getDatatables($request)
    {
        $album = static::select('*');
        $types = config('params.config.type');

        return DataTables::of($album)
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name')!==null) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->has('status') && $request->get('status')!==null) {
                    $query->where('status', $request->get('status'));
                }
                if ($request->has('type') && $request->get('type')!==null) {
                    $query->where('type', $request->get('type'));
                }
            })
            ->editColumn('image', function ($product) {
                return $product->image ? '<img src="'.$product->image.'" width="100px" />' : '';
            })
            ->editColumn('type', function ($product) use ($types){
                return isset($types[$product->type])?$types[$product->type]:'';
            })
            ->editColumn('created_at', function ($product) {
                return $product->created_at;
            })
            ->editColumn('updated_at', function ($product) use ($types){
                return $product->updated_at;
            })
            ->editColumn('status', function ($album) {
                return $album->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->addColumn('action', function ($album) {
                return $album->generateActionColumn();
            })
            ->rawColumns(['status', 'action', 'image','description'])
            ->make(true);
    }

    protected function getActionColumnPermissions()
    {
        return [
            'album.edit' => '<a class="table-action-btn"  href="' . route('album.edit', $this->id) . '"><i class="fa fa-pencil-alt text-primary font-size-18"></i></a>&nbsp;&nbsp;',
            'album.delete' => '<a class="get-form table-action-btn" href="javascript:void(0)" class="get-form" data-href="' . route('album.delete', $this->id) . '"><i class="fa fa-trash-alt text-danger font-size-18"></i></a>&nbsp;&nbsp;'
        ];
    }

    public static function getConfigurationList(){
        return self::pluck('value', 'name')->toArray();
    }
}
