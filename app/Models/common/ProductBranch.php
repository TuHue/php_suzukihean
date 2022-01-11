<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class ProductBranch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'code_vi', 'name', 'name_vi', 'content', 'status'];

    public static function getDatatables($request)
    {
        $product_branch = static::select('*');

        return DataTables::of($product_branch)
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name')!==null) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->has('status') && $request->get('status')!==null) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->editColumn('status', function ($product_branch) {
                return $product_branch->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->editColumn('created_at', function ($product_branch) {
                return $product_branch->created_at;
            })
            ->editColumn('updated_at', function ($product_branch) {
                return $product_branch->updated_at;
            })
            ->addColumn('action', function ($product_branch) {
                return '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('product_branch.edit', $product_branch->id) . '"><i class="fa fa-pencil-alt text-primary"></i></a>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public static function getProductBranchList(){
        return self::where([
            'status' => 1
        ])->pluck('name', 'id')->toArray();
    }
}
