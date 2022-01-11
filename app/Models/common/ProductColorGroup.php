<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class ProductColorGroup extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'name_vi', 'code', 'code_vi', 'content', 'status'];

    public static function getDatatables($request)
    {
        $product_color_group = static::select('*');

        return DataTables::of($product_color_group)
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name')!==null) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->has('status') && $request->get('status')!==null) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->editColumn('status', function ($product_color_group) {
                return $product_color_group->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->addColumn('action', function ($product_color_group) {
                return '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('product_color_group.edit', $product_color_group->id) . '"><i class="fa fa-pen-alt text-primary"></i></a>';
            })
            ->editColumn('created_at', function ($product_branch) {
                return $product_branch->created_at;
            })
            ->editColumn('updated_at', function ($product_branch) {
                return $product_branch->updated_at;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public static function getProductColorGroupList(){
        return self::where([
            'status' => 1
        ])->pluck('name', 'id')->toArray();
    }
}
