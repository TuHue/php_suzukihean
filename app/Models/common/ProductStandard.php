<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class ProductStandard extends Model
{
    use HasFactory, HasActionColumn;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'code_vi',
        'name', 'name_vi',
        'content',
        'status',
        'delete',
        'delete_user_id',
    ];

    public static function getDatatables($request)
    {
        $product_standard = static::select('*');

        return DataTables::of($product_standard)
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name')!==null) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->has('status') && $request->get('status')!==null) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->editColumn('status', function ($product_standard) {
                return $product_standard->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->addColumn('action', function ($product_standard) {
                return $product_standard->generateActionColumn();
            })
            ->editColumn('created_at', function ($product_standard) {
                return $product_standard->created_at;
            })
            ->editColumn('updated_at', function ($product_standard) {
                return $product_standard->updated_at;
            })
            ->rawColumns(['status',  'action'])
            ->make(true);
    }

    public function branches()
    {
        return $this->hasMany(ProductStandardBranch::class, 'standard_id', 'id');
    }

    protected function getActionColumnPermissions()
    {
        return [
            'product_standard.edit' => '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('product_standard.edit', $this->id) . '"><i class="fa fa-pen-alt text-primary"></i></a>',
            'product_standard.destroy' => '<a class="table-action-btn" href="javascript:void(0)" title="Xóa" onclick="showDestroyForm(\'' . route('product_standard.destroy', $this->id) . '\')"><i class="fa fa-trash-alt text-danger"></i></a>',
        ];
    }

    public static function getProductStandardList(){
        return self::where([
            'status' => 1
        ])->pluck('name', 'id')->toArray();
    }
}
