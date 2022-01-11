<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class Partner extends Model
{
    use HasFactory;

    protected $table = 'partner';

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
        $partner = static::query();

        return DataTables::of($partner)
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name')!==null) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->has('status') && $request->get('status')!==null) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->editColumn('status', function ($partner) {
                return $partner->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->editColumn('created_at', function ($product_branch) {
                return $product_branch->created_at;
            })
            ->editColumn('updated_at', function ($product_branch) {
                return $product_branch->updated_at;
            })
            ->addColumn('action', function ($partner) {
                return '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('partner.edit', $partner->id) . '"><i class="fa fa-pen-alt text-primary"></i></a>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

//    public static function getWorkshopList(){
//        $result = [];
//        $list = self::where([
//            'status'=>1
//        ])->pluck('name','id')->toArray();
//        if($list){
//            foreach ($list as $id => $partner){
//                $total_compact = DB::table('compact_products')->where(
//                    [
//                        'partner_id' => $id,
//                    ]
//                )->whereIn('status', [1,2])->count();
//                $list[$id] = $partner . ' ('.$total_compact.' sản phẩm)';
//            }
//            $result = $list;
//        }
//        return $result;
//    }
}
