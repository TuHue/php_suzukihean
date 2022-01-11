<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class ProductType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['code', 'name', 'unit', 'content', 'status', 'name_vi', 'code_vi'];

    public static function getDatatables($request)
    {
        $product_type = static::select('*');
        $unit = config('params.compact.unit');
        $unit_label = config('params.compact.unit_label');

        return DataTables::of($product_type)
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name')!==null) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->has('status') && $request->get('status')!==null) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->editColumn('status', function ($product_type) {
                return $product_type->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->editColumn('unit', function ($product_type) use($unit, $unit_label) {
                return $product_type->getUnitText($unit, $unit_label);
            })
            ->editColumn('created_at', function ($product_branch) {
                return $product_branch->created_at;
            })
            ->editColumn('updated_at', function ($product_branch) {
                return $product_branch->updated_at;
            })
            ->addColumn('action', function ($product_type) {
                return '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('product_type.edit', $product_type->id) . '"><i class="fa fa-pen-alt text-primary"></i></a>';
            })
            ->rawColumns(['status', 'unit', 'action'])
            ->make(true);
    }

    function getUnitText($unit, $unit_label) {
        return '<label class="label label-' . (isset($unit_label[$this->unit]) ? $unit_label[$this->unit] : '') . '">' . (isset($unit[$this->unit]) ? $unit[$this->unit] : '') . '</label>';
    }

    public static function getProductTypeList(){
        return self::where([
            'status' => 1
        ])->pluck('name', 'id')->toArray();
    }
}
