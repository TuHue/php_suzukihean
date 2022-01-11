<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DangKyTuVan extends Model
{
    use HasFactory;

    protected $table = 'dang_ky_tu_van';

    protected $fillable = [
        'name',
        'description',
        'status',
        'address',
        'email',
        'phone',
        'time_service',
        'image',
        'status'
    ];


    public static function getDatatables($request)
    {
        $dang_ky_tu_van = static::query();

        return DataTables::of($dang_ky_tu_van)
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name')!==null) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->has('status') && $request->get('status')!==null) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->editColumn('status', function ($dang_ky_tu_van) {
                return $dang_ky_tu_van->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->editColumn('created_at', function ($product_branch) {
                return $product_branch->created_at;
            })
            ->editColumn('updated_at', function ($product_branch) {
                return $product_branch->updated_at;
            })
            ->addColumn('action', function ($dang_ky_tu_van) {
                return '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('dang_ky_tu_van.edit', $dang_ky_tu_van->id) . '"><i class="fa fa-pen-alt text-primary"></i></a>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
}
