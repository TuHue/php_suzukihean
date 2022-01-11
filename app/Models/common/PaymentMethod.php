<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class PaymentMethod extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'type',
        'rate',
        'content',
        'status',
        'created_by',
        'updated_by',
    ];

    public static function getDatatables($request)
    {
        $payment_method = static::select('*');
        $type = config('params.compact.payment_transer_type');

        return DataTables::of($payment_method)
            ->filter(function ($query) use ($request) {
                if ($request->has('name')) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->has('status')) {
                    $query->where('status', $request->get('status'));
                }
            })
            ->editColumn('status', function ($payment_method) {
                return $payment_method->status ? '<i class="ion ion-checkmark-circled text-primary"></i>' : '<i class="ion ion-close-circled text-default"></i>';
            })
            ->editColumn('type', function ($payment_method) use($type) {
                return isset($type[$payment_method->type]) ? $type[$payment_method->type] : '';
            })
            ->addColumn('action', function ($payment_method) {
                return '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('payment_methods.edit', $payment_method->id) . '"><i class="fa fa-pencil text-primary"></i></a>';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public static function getPaymentMethodList(){
        $result = PaymentMethod::where('status', 1)->pluck('name', 'id')->toArray();
        if($result){
            return $result;
        }
        return [];
    }

    public static function getAllPaymentMethodList(){
        $result = self::where('status', 1)->get();
        if($result){
            return $result;
        }
        return [];
    }

    public static function getAllPaymentMethodWithRate(){
        $list = self::query()->get();
        $result = [];
        if($list){
            foreach ($list as $item){
                $result[$item->id] = [
                    'type' => $item->type,
                    'rate' => $item->rate
                ];
            }
        }
        return $result;
    }
}
