<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;


class ProductSize extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'code_vi', 'name', 'name_vi', 'content', 'status', 'type'];

    public static function getDatatables($request)
    {
        $product_size = static::select('*');

        return DataTables::of($product_size)
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name')!==null) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->has('status') && $request->get('status')!==null) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->editColumn('status', function ($product_size) {
                return $product_size->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->editColumn('type', function ($product_size) {
                $type = config('params.product_size_type');
                return isset($type[$product_size->type]) ? $type[$product_size->type] : '';
            })
            ->editColumn('created_at', function ($product_branch) {
                return $product_branch->created_at;
            })
            ->editColumn('updated_at', function ($product_branch) {
                return $product_branch->updated_at;
            })
            ->addColumn('action', function ($product_size) {
                return '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('product_size.edit', $product_size->id) . '"><i class="fa fa-pen-alt text-primary"></i></a>';
            })
            ->rawColumns(['status',  'action'])
            ->make(true);
    }

    public static function getProductSizeList(){
        return self::where([
            'status' => 1
        ])->pluck('name', 'id')->toArray();
    }
}
