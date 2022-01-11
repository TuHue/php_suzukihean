<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class ProductImport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'dir',
        'process_lock',
        'status',
        'msg',
        'error',
        'total_success',
        'total_row',
        'type',
        'created_by',
        'updated_by',
    ];

    public static function getDatatables($request)
    {
        $import = static::select('*');
        $import_status = config('system.import_status');
        $import_types = config('system.import_types');

        return DataTables::of($import)
            ->filter(function ($query) use ($request) {
                if ($request->has('status')) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->editColumn('status', function ($import) use($import_status) {
                return isset($import_status[$import->status]) ? $import_status[$import->status] : '---';
            })
            ->editColumn('type', function ($import) use($import_types) {
                return isset($import_types[$import->type]) ? $import_types[$import->type] : '---';
            })
            ->addColumn('action', function ($import) {
                return '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('product_imports.show', $import->id) . '"><i class="fa fa-plus-circle text-primary"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
