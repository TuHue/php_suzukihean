<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class WorkshopProcess extends Model
{
    use HasFactory, HasActionColumn;

    protected $table = 'workshop_process';

    protected $fillable = [
        'workshop_id',
        'compact_product_id',
        'compact_id',
        'name',
        'note',

        'amount',
        'amount_gam',
        'unit',
        'rate',
        'packet',
        /*
         * 0 - Mới chuyển,
         * 1 - Đang xử lý,
         * 2 - Hoàn thành,
         * 3 - Không nhận
         * */
        'status',
        'process',

        'color_group_id',
        'color_id',
        'type_id',
        'category_id',
        'standard_id',
        'size_id',

        /*Ngày hoàn thành dự kiến*/
        'estimated_date',
        'completed_date',
        'received_date',
        'cancel_date',
    ];

    public function compact_product(){
        return $this->belongsTo(CompactProduct::class, 'compact_product_id', 'id');
    }

    public function compact(){
        return $this->belongsTo(Compact::class, 'compact_id', 'id');
    }

    public function workshop(){
        return $this->belongsTo(Workshop::class, 'compact_id', 'id');
    }

    public static function getDatatables($request)
    {
        $categories = ProductCategory::pluck('code', 'id')->toArray();
        $sizes = ProductSize::pluck('code', 'id')->toArray();
        $types = ProductType::pluck('code', 'id')->toArray();
        $standards = ProductStandard::pluck('code', 'id')->toArray();
        $color_groups = ProductColorGroup::pluck('name', 'id')->toArray();
        $colors = ProductColor::pluck('name', 'id')->toArray();
        $workshops = Workshop::pluck('name', 'id')->toArray();

        $workshop_process = static::with('compact_product', 'compact', 'workshop');
//        $workshop_process = static::query();

        return DataTables::of($workshop_process)
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name')!==null) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->has('status') && $request->get('status')!==null) {
                    $query->where('status', $request->get('status'));
                }

                if ($request->has('category_id') && $request->get('category_id')!==null) {
                    $query->where('category_id', $request->get('category_id'));
                }
                if ($request->has('standard_id') && $request->get('standard_id')!==null) {
                    $query->where('standard_id', $request->get('standard_id'));
                }
                if ($request->has('type_id') && $request->get('type_id')!==null) {
                    $query->where('type_id', $request->get('type_id'));
                }
                if ($request->has('size_id') && $request->get('size_id')!==null) {
                    $query->where('size_id', $request->get('size_id'));
                }
                if ($request->has('color_group_id') && $request->get('color_group_id')!==null) {
                    $query->where('color_group_id', $request->get('color_group_id'));
                }
                if ($request->has('color_id') && $request->get('color_id')!==null) {
                    $query->where('color_id', $request->get('color_id'));
                }
                if ($request->has('workshop_id') && $request->get('workshop_id')!==null) {
                    $query->where('workshop_id', $request->get('workshop_id'));
                }
            })
            ->editColumn('status', function ($workshop_process) {
                return $workshop_process->getStatusText();
            })
            ->addColumn('compact_code', function ($workshop_process) {
                return $workshop_process->compact->code;
            })
            ->addColumn('name', function ($workshop_process) {
                return $workshop_process->name;
            })
            ->addColumn('color_group', function ($workshop_process) use ($color_groups){
                return isset($color_groups[$workshop_process->color_group_id])?$color_groups[$workshop_process->color_group_id]:'';
            })
            ->addColumn('color', function ($workshop_process)  use ($colors) {
                return isset($colors[$workshop_process->color_id])?$colors[$workshop_process->color_id]:'';
            })
            ->addColumn('process_check', function ($workshop_process) {
                return '';
            })
            ->addColumn('sale_note', function ($workshop_process)   {
                if($workshop_process->compact_product && $workshop_process->compact_product->product_note){
                    return '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('workshop_process.view_detail_note', $workshop_process->compact_product_id) . '"><i class="fa fa-eye text-primary"></i> Chi tiết</a>';
                }else{
                    return '';
                }
            })
            ->editColumn('created_at', function ($product_branch) {
                return $product_branch->created_at;
            })
            ->editColumn('updated_at', function ($product_branch) {
                return $product_branch->updated_at;
            })
            ->addColumn('action', function ($workshop_process) {
                return $workshop_process->generateActionColumn();
            })
            ->rawColumns(['status', 'action','sale_note'])
            ->make(true);
    }

    public function getStatusText()
    {
        $status = config('params.workshop_process.status');
        $status_label = config('params.workshop_process.status_label');

        if($this->status == 1) {
            return '<label class="badge bg-' . (isset($status_label[$this->status]) ? $status_label[$this->status] : '') . '">' . (isset($status[$this->status]) ? $status[$this->status] : '') . '</label> ' . ($this->completed) . '';
        }
        return '<label class="badge bg-' . (isset($status_label[$this->status]) ? $status_label[$this->status] : '') . '">' . (isset($status[$this->status]) ? $status[$this->status] : '') . '</label>';
    }

    protected function getActionColumnPermissions()
    {
        if(in_array($this->status,[1])){
            return [
                'workshop_process.receive' => '<a onClick="onClickChangeProcess($(this))" class="btn-vld-ajax btn btn-primary waves-effect waves-light mb-2" title="Chỉnh sửa" data-href="' . route('workshop_process.receive', [$this->id, $this->workshop_id]) . '">Nhận đơn</a> ',
                'workshop_process.deny' => '<a onClick="onClickChangeProcess($(this))" class="btn-vld-ajax btn btn-danger waves-effect  waves-light mb-2" title="Chỉnh sửa" data-href="' . route('workshop_process.deny', [$this->id, $this->workshop_id]) . '">Không nhận</a> ',
            ];
        }
        if(in_array($this->status,[2])){
            return [
                'workshop_process.finish' => '<a onClick="onClickChangeProcess($(this))" class="btn-vld-ajax btn btn-success waves-effect  waves-light mb-2" title="Chỉnh sửa" data-href="' . route('workshop_process.finish', [$this->id, $this->workshop_id]) . '">Hoàn thành</a> ',
            ];
        }
        return [];
    }

    public static function getWorkshopProcessList(){
        $result = Workshop::pluck('name', 'id')->toArray();
        if(!$result)return [];
        return $result;
    }

}
