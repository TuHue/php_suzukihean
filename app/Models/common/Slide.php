<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class Slide extends Model
{
    use HasFactory, HasActionColumn;

    protected $table='slide';

    protected $fillable = [
        'name',
        'value',
        'description',
        'type',
        'status',
        'image',
        'created_by',
        'updated_by',
    ];

    public static function getDatatables($request)
    {
        $slide = static::select('*');
        $types = config('params.config.type');

        return DataTables::of($slide)
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
            ->editColumn('status', function ($slide) {
                return $slide->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->addColumn('action', function ($slide) {
                return $slide->generateActionColumn();
            })
            ->rawColumns(['status', 'action', 'image'])
            ->make(true);
    }

    protected function getActionColumnPermissions()
    {
        return [
            'slide.edit' => '<a class="get-form table-action-btn" href="javascript:void(0)" data-size="modal-xl" class="get-form" data-href="' . route('slide.edit', $this->id) . '"><i class="fa fa-pencil-alt text-primary font-size-18"></i></a>&nbsp;&nbsp;',
            'slide.delete' => '<a class="get-form table-action-btn" href="javascript:void(0)" data-size="modal-xl" class="get-form" data-href="' . route('slide.delete', $this->id) . '"><i class="fa fa-trash-alt text-danger font-size-18"></i></a>&nbsp;&nbsp;'
        ];
    }

    public static function getConfigurationList(){
        return self::pluck('value', 'name')->toArray();
    }
}
