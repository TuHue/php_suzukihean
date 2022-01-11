<?php

namespace App\Models\common;

use Carbon\Carbon;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class Compact extends Model
{
    use HasFactory, HasActionColumn;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'code',
        'tracking',
        'name',
        'email',
        'phone',
        'address',

        'zipcode',
        'city',
        'bang',
        'country_id',
        'customer_type',
        'source',
        'contact',

        'feedback',
        'feedback_date',
        'feedback_store',
        'feedback_store_date',

        'content',
        'note_invoice',
        'customer_id',
        'start_store_date',
        'move_store_date',
        'estimate_date_1',
        'estimate_date_2',
        'priority_date',
        'pick_user',
        'discount',
        'discount_note',
        'note',
        'ship_note',
        'price',
        'user_id',
        'status',
        'type',
        'completed',
        'is_accountant_confirm',

        'method_ship',
        'method_amount',
        'method_note',
        'priority',
        'parent_id',

        'created_by',
        'updated_user_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function documents()
    {
        return $this->hasMany(CompactDocument::class, 'compact_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(CompactPayment::class, 'compact_id', 'id')->where('status', '<>', 0);
    }

    public function fees()
    {
        return $this->hasMany(CompactFee::class, 'compact_id', 'id');
    }

    public function accessories()
    {
        return $this->hasMany(CompactAccessory::class, 'compact_id', 'id');
    }

    public function types()
    {
        return $this->hasMany(CompactProduct::class, 'compact_id', 'id');
    }

    public function created_user()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_create()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

//    public function unit()
//    {
//        return $this->belongsTo(Unit::class);
//    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function get_total_weight() {
        return CompactProduct::select(DB::raw('SUM(IF(unit=1, amount, amount * convert_kg_pc)) AS c'))->where('compact_id', $this->id)->first()->c;
    }

    public function get_branch_name() {
        return $this->user && $this->user->product_branch ? $this->user->product_branch->name : '';
    }

    public function get_fee_debt() {
        return round((\App\Models\common\Compact::select(
            DB::raw('IFNULL(SUM(price - (SELECT IFNULL(SUM(p.amount), 0) FROM compact_payments p WHERE p.status=1 AND p.compact_id=compacts.id)), 0) AS c')
        )->where('id', '<', $this->id)->where('customer_id', $this->customer_id)->first()->c), 2);
    }

    public function get_debt() {
        return round(($this->price - CompactPayment::select(DB::raw('IFNULL(SUM(amount_receive), 0) AS c'))->where('compact_id', $this->id)->first()->c), 2);
    }

    public function get_payment() {
        return CompactPayment::select(DB::raw('FORMAT(IFNULL(SUM(IFNULL(amount_receive, 0)), 0), 2) AS c'))->where('compact_id', $this->id)->first()->c . '/' . CompactPayment::select(DB::raw('FORMAT(IFNULL(SUM(amount), 0), 2) AS c'))->where('compact_id', $this->id)->first()->c;
    }

    public function get_amount_receive_payment() {
        return CompactPayment::select(DB::raw('FORMAT(IFNULL(SUM(IFNULL(IF(amount_receive < 1, amount, amount_receive), amount)), 0), 2) AS c'))->where('compact_id', $this->id)->first()->c;
    }

    public function get_price_code() {
        return round((CompactProduct::select(DB::raw('IFNULL(SUM(price * amount), 0) AS c'))->where('compact_id', $this->id)->first()->c), 2);
    }

    public function get_transfer_fee() {
        return round((CompactPayment::select(DB::raw('IFNULL(SUM(amount * fee_percent/100), 0) AS c'))->where('compact_id', $this->id)->first()->c), 2);
    }

    public function get_saler($is_html = true) {
        if($this->user_id == $this->created_by) {
            if($is_html)
                return '<span class="text-default">' . ($this->user ? $this->user->name : '') . '</span>';
            return $this->user ? $this->user->name : '';
        }

        $html = '';
        if($this->user_create) {
            $roles = $this->user_create->roles()->pluck('id')->toArray();
            if(in_array(env('ID_QUYEN_TRUONG_NHOM_BAN_HANG'), $roles)) {
                if($is_html)
                    $html .= '<span class="text-primary">' . ($this->user_create ? $this->user_create->name : '') . '</span>, ';
                else
                    $html .= ($this->user_create ? $this->user_create->name : '') . ', ';
            } else {
                if($is_html)
                    $html .= '<span class="text-default">' . ($this->user_create ? $this->user_create->name : '') . '</span>, ';
                else
                    $html .= ($this->user_create ? $this->user_create->name : '') . ', ';
            }
        }
        if($this->user) {
            $roles = $this->user->roles()->pluck('id')->toArray();
            if(in_array(env('ID_QUYEN_TRUONG_NHOM_BAN_HANG'), $roles)) {
                if($is_html)
                    $html .= '<span class="text-primary">' . ($this->user ? $this->user->name : '') . '</span>';
                else
                    $html .= $this->user ? $this->user->name : '';
            } else {
                if($is_html)
                    $html .= '<span class="text-default">' . ($this->user ? $this->user->name : '') . '</span>';
                else
                    $html .= $this->user ? $this->user->name : '';
            }
        }
        return $html;
    }

    public function setCode()
    {
        $compact = static::where('id', '<>', $this->id)
            ->where('created_at', '>=', date('Y-m-01 00:00:00'))
            ->orderBy('id', 'DESC')->first();

        if($compact){
            $this->code = '' . ($compact->code + 1);
        } else {
            $this->code = '' . date('ym') . sprintf("%04d", 1);
        }
        return $this;
    }

    public static function find($id)
    {
        $user = Sentinel::getUser();
        $compact = static::where('id', $id);
        $roles = $user->roles()->pluck('id')->toArray();
        if(in_array(env('ID_QUYEN_NHAN_VIEN_BAN_HANG'), $roles)) {
            // $users = User::where('manager_id', $user->id)
            // ->orWhere('id', $user->id)
            // ->pluck('id')
            // ->all();

            $compact->where(function($q) use($user) {
                $q->where('created_by', $user->id)
                    ->orWhere('user_id', $user->id)
                    ->orWhereRaw('(customer_id IN (SELECT id FROM customers WHERE `created_by` = ' . $user->id . ' OR `user_id` = ' . $user->id . '))');
            });
        } else if(in_array(env('ID_QUYEN_XUONG_SAN_XUAT'), $roles)) {
            $compact->where('status', '<>', 0);
        }
        return $compact->first();
    }

    protected function getActionColumnPermissions()
    {
        return [
//            'compact.show' => '<a class="table-action-btn" href="' . route('compact.show', $this->id) . '"><i class="fa fa-search-plus text-primary"></i></a> ' . $this->id,
             'compact.edit' =>  '<a class="table-action-btn" href="' . route('compact.edit', $this->id) . '"><i class="fa fa-pen-alt text-primary"></i></a>'
        ];
    }

    public function getPriorityText()
    {
        $priority = config('params.compact.priority');
        $priority_label = config('params.compact.priority_label');

        return '<label class="label label-' . (isset($priority_label[$this->priority]) ? $priority_label[$this->priority] : '') . '">' . (isset($priority[$this->priority]) ? $priority[$this->priority] : '') . '</label>';
    }

    public function getStatusText()
    {
        $status = config('params.compact.status');
        $status_label = config('params.compact.status_label');

        if($this->status == 1) {
            return '<label class="badge bg-' . (isset($status_label[$this->status]) ? $status_label[$this->status] : '') . '">' . (isset($status[$this->status]) ? $status[$this->status] : '') . '</label> ' . ($this->completed) . '%';
        }
        return '<label class="badge bg-' . (isset($status_label[$this->status]) ? $status_label[$this->status] : '') . '">' . (isset($status[$this->status]) ? $status[$this->status] : '') . '</label>';
    }

    public static function getWhere(&$query, $request)
    {
        $user = Sentinel::getUser();

        $roles = $user->roles()->pluck('id')->toArray();
        if(in_array(env('ID_QUYEN_NHAN_VIEN_BAN_HANG'), $roles)) {
            // $users = User::where('manager_id', $user->id)
            // ->orWhere('id', $user->id)
            // ->pluck('id')
            // ->all();

            $query->where(function($q) use($user) {
                $q->where('created_by', $user->id)
                    ->orWhere('user_id', $user->id)
                    ->orWhereRaw('(customer_id IN (SELECT id FROM customers WHERE `created_by` = ' . $user->id . ' OR `user_id` = ' . $user->id . '))');
            });
        } else if(in_array(env('ID_QUYEN_XUONG_SAN_XUAT'), $roles)) {
            $query->where('status', '<>', 0);
        }

        if ($request->has('code')) {
            $query->where(function($q) use ($request) {
                $q->where('code', 'like', '%' . $request->get('code') . '%')
                    ->orWhere('email', 'like', '%' . $request->get('code') . '%')
                    ->orWhere('name', 'like', '%' . $request->get('code') . '%')
                    ->orWhere('phone', 'like', '%' . $request->get('code') . '%')
                    ->orWhere('address', 'like', '%' . $request->get('code') . '%');
            });
        }
        if ($request->has('from_date')) {
            $query->where('created_at', '>=', Carbon::createFromFormat('d/m/Y', $request->from_date)->toDateString());
        }
        if ($request->has('to_date')) {
            $query->where('created_at', '<=', Carbon::createFromFormat('d/m/Y', $request->to_date)->toDateString());
        }
        if ($request->has('created_by')) {
            $query->where(function($q) use($request) {
                $q->where('created_by', $request->get('created_by'))
                    ->orWhere('user_id', $request->get('created_by'));
            });
        }
        if ($request->has('customer_id')) {
            $query->where('customer_id', $request->get('customer_id'));
        }
        if ($request->has('status')) {
            $query->where('status', $request->get('status'));
        }
        if ($request->has('priority')) {
            $query->where('priority', $request->get('priority'));
        }
        if ($request->has('date')) {
            try {
                $dateRange = explode(' - ', $request->get('date'));
                $query->where('start_store_date', '>=', Carbon::createFromFormat('d/m/Y', $dateRange[0])->toDateString() . ' 00:00:00');
                $query->where('start_store_date', '<=', Carbon::createFromFormat('d/m/Y', $dateRange[1])->toDateString() . ' 23:59:59');
            } catch (\Exception $e) {

            }
        }
        return $query;
    }

    public static function getDatatables($request)
    {
        $compact = static::with('customer', 'user', 'user_create', 'country')->select('*',
            DB::raw('IFNULL((SELECT IFNULL(SUM(IF(unit=1, amount, amount * convert_kg_pc)), 0) FROM compact_products p WHERE compacts.id=p.compact_id), 0) AS weight'),
            DB::raw('IFNULL((SELECT IFNULL(SUM(p.price * p.amount), 0) FROM compact_products p WHERE compacts.id=p.compact_id), 0) AS price_code'),
            DB::raw('IFNULL((SELECT FORMAT(IFNULL(SUM(p.amount_receive), 0), 2) FROM compact_payments p WHERE compacts.id=p.compact_id), 0) AS payment'),
            DB::raw('IFNULL((SELECT FORMAT(IFNULL(SUM(p.amount), 0), 2) FROM compact_payments p WHERE compacts.id=p.compact_id), 0) AS amount_payment'),
            DB::raw('IFNULL(compacts.price - IFNULL((SELECT SUM(p.amount_receive) FROM compact_payments p WHERE compacts.id=p.compact_id), 0), 0) AS debt')
        );

        return DataTables::of($compact)
            ->filter(function ($query) use ($request) {
//                static::getWhere($query, $request);
            })
            ->editColumn('type', function ($compact) {
                return $compact->type ? $compact->type : $compact->type;
            })
            ->editColumn('user_id', function ($compact) {
                return $compact->get_saler();
            })
            ->editColumn('created_by', function ($compact) {
                return $compact->created_user ? $compact->created_user->name : '';
            })
            ->editColumn('estimate_date_1', function ($compact) {
                return $compact->estimate_date_2 ? $compact->estimate_date_2 : $compact->estimate_date_1;
            })
            ->editColumn('priority', function ($compact) {
                return $compact->getPriorityText();
            })
            ->editColumn('status', function ($compact) {
                return $compact->getStatusText();
            })
            ->editColumn('is_accountant_confirm', function ($compact) {
                return $compact->is_accountant_confirm ? '<i class="ion ion-checkmark-circled text-primary"></i>' : '<i class="ion ion-close-circled text-default"></i>';
            })
            ->editColumn('address', function ($compact) {
                return $compact->name . ' - ' . $compact->phone . ($compact->country ? (' - ' . $compact->country->name) : '');
            })
            ->addColumn('action', function ($compact) {
                return $compact->generateActionColumn();
            })
            ->addColumn('branch', function ($compact) {
                return '';
            })
            ->editColumn('payment', function ($compact) {
                return $compact->payment . '/' . $compact->price;
            })
            ->editColumn('content', function ($compact) {
                $sentence = preg_replace("/<[^>]+\>/i", " ", $compact->content);
                if(!$sentence) {
                    return '';
                }
                $html = $sentence;
                if (count(explode(' ', $sentence)) > 10) {
                    $html = implode(' ', array_slice(explode(' ', $sentence), 0, 10)) . '...';
                }
                $html = '<div class="title-tooltip">' . $html;
                $html .= '<div class="tooltiptext hidden">';
                $html .= '<p>' . $sentence . '</p>';
                $html .= '</div>';
                return $html.'</div>';
            })
            ->editColumn('feedback', function ($compact) {
                $sentence = preg_replace("/<[^>]+\>/i", " ", $compact->feedback);
                if(!$sentence) {
                    return '';
                }
                $html = $sentence;
                if (count(explode(' ', $sentence)) > 10) {
                    $html = implode(' ', array_slice(explode(' ', $sentence), 0, 10)) . '...';
                }
                $html = '<div class="title-tooltip">' . $html;
                $html .= '<div class="tooltiptext hidden">';
                $html .= '<p>' . $sentence . '</p>';
                $html .= '</div>';
                return $html.'</div>';
            })
            ->rawColumns(['status', 'address', 'action', 'content', 'feedback', 'priority', 'user_id'])
            ->make(true);
    }

    public static function getDatatableFeedbacks($request)
    {
        $compact = static::where('feedback', '<>', '')->whereNotNull('feedback');

        $user = Sentinel::getUser();
        $roles = $user->roles()->pluck('id')->toArray();
        if(in_array(env('ID_QUYEN_NHAN_VIEN_BAN_HANG'), $roles)) {
            $compact->where(function($q) use($user) {
                $q->where('created_by', $user->id)
                    ->orWhere('user_id', $user->id);
            });
        } else if(in_array(env('ID_QUYEN_XUONG_SAN_XUAT'), $roles)) {
            $compact->where('status', '<>', 0);
        }

        return Datatables::of($compact)
            ->filter(function ($query) use ($request) {
                if ($request->has('code')) {
                    $query->where(function($q) use ($request) {
                        $q->where('feedback', 'like', '%' . $request->get('code') . '%');
                    });
                }
                if ($request->has('date')) {
                    $date = explode('/', $request->get('date'));
                    try {
                        $dateRange = explode(' - ', $request->get('date'));
                        $query->where('feedback_date', '>=', Carbon::createFromFormat('d/m/Y', $dateRange[0])->toDateString() . ' 00:00:00');
                        $query->where('feedback_date', '<=', Carbon::createFromFormat('d/m/Y', $dateRange[1])->toDateString() . ' 23:59:59');
                    } catch (Exception $e) {

                    }
                }
            })
            ->editColumn('code', function ($compact) {
                return '<a href="' . route('compact.show', $compact->id) . '">' . $compact->code . ' - ' . $compact->created_by . '</a>';
            })
            ->editColumn('feedback', function ($compact) {
                $sentence = preg_replace("/<[^>]+\>/i", " ", $compact->feedback);
                if(!$sentence) {
                    return '';
                }
                $html = $sentence;
                if (count(explode(' ', $sentence)) > 10) {
                    $html = implode(' ', array_slice(explode(' ', $sentence), 0, 10)) . '...';
                }
                $html = '<div class="title-tooltip">' . $html;
                $html .= '<div class="tooltiptext hidden">';
                $html .= '<p>' . $sentence . '</p>';
                $html .= '</div>';
                return $html.'</div>';
            })
            ->rawColumns(['status', 'address', 'action', 'feedback', 'code'])
            ->make(true);
    }

    public static function exportToExcel($request)
    {
        $compact = static::with('customer', 'country', 'user', 'user.product_branch', 'types', 'types.process');
        static::getWhere($compact, $request);
        $list = $compact->get();
        $fileName = 'don_hang_' . date('Y_m_d_His');

        \Maatwebsite\Excel\Facades\Excel::create($fileName, function ($excel) use ($list) {
            $excel->sheet('Danh sách đơn hàng', function ($sheet) use ($list) {
                $sheet->cell('A1', function ($cell) {
                    $cell->setValue('Danh sách đơn hàng');
                    $cell->setFontWeight('bold');
                });
                $status = config('params.compact.status');
                $priority = config('params.compact.priority');
                $sheet->loadView('excels.orders', compact('list', 'status', 'priority'));
            });
        })->download('xlsx');
    }

    public static function getCompactList(){
        $result = self::where([
            'status' , '<>' , -2
        ])->pluck('code','id')->toArray();
        if($result){
            return $result;
        }
        return [];
    }
}
