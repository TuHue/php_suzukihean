<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DangKyLaiThu extends Model
{
    use HasFactory;

    protected $table = 'dang_ky_lai_thu';

    protected $fillable = [
        'name',
        'description',
        'status',
        'address',
        'email',
        'phone',
        'time_service',
        'product_id',
        'image',
        'status'
    ];


    public static function getDatatables($request)
    {
        $dang_ky_lai_thu = static::query();

        return DataTables::of($dang_ky_lai_thu)
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name')!==null) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->has('status') && $request->get('status')!==null) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->editColumn('status', function ($dang_ky_lai_thu) {
                return $dang_ky_lai_thu->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->editColumn('created_at', function ($product_branch) {
                return $product_branch->created_at;
            })
            ->editColumn('updated_at', function ($product_branch) {
                return $product_branch->updated_at;
            })
            ->addColumn('action', function ($dang_ky_lai_thu) {
                return '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('dang_ky_lai_thu.edit', $dang_ky_lai_thu->id) . '"><i class="fa fa-pen-alt text-primary"></i></a>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
}
