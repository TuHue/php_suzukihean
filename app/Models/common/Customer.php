<?php

namespace App\Models\common;

use Carbon\Carbon;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class Customer extends Model
{
    use HasFactory, HasActionColumn;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'zipcode',
        'city',
        'bang',
        'country_id',
        'content',
        'type',
        'is_new',
        'source',
        'contact',
        'status',
        'user_id',
        'product_branch_id',
        'created_by',
        'updated_by',
    ];

    public function compacts()
    {
        return $this->hasMany(Compact::class, 'customer_id', 'id');
    }

    public function product_branch()
    {
        return $this->belongsTo(ProductBranch::class);
    }

    public function user_care()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function get_saler($is_html = true) {
        if($this->user_id == $this->created_by) {
            if($is_html)
                return '<span class="text-default">' . ($this->user_care ? $this->user_care->name : '') . '</span>';
            return $this->user_care ? $this->user_care->name : '';
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
        if($this->user_care) {
            $roles = $this->user_care->roles()->pluck('id')->toArray();
            if(in_array(env('ID_QUYEN_TRUONG_NHOM_BAN_HANG'), $roles)) {
                if($is_html)
                    $html .= '<span class="text-primary">' . ($this->user_care ? $this->user_care->name : '') . '</span>';
                else
                    $html .= $this->user_care ? $this->user_care->name : '';
            } else {
                if($is_html)
                    $html .= '<span class="text-default">' . ($this->user_care ? $this->user_care->name : '') . '</span>';
                else
                    $html .= $this->user_care ? $this->user_care->name : '';
            }
        }
        return $html;
    }

    protected function getActionColumnPermissions()
    {
        return [
            'customer.edit' => '<a class="table-action-btn" title="Chỉnh sửa" href="' . route('customer.edit', $this->id) . '"><i class="fa fa-pen-alt text-primary"></i></a>',
//            'customer.products' => '<a class="table-action-btn" title="Sản phẩm" href="' . route('customer.products', $this->id) . '"><i class="fa fa-list text-primary"></i></a> ',
//            'compacts.index' => '<a class="table-action-btn" title="Đơn hàng" href="' . route('compacts.index', ['customer_id' => $this->id]) . '"><i class="fa fa-shopping-cart text-primary"></i></a> ' . $this->id
        ];
    }

    public static function getDatatables($request)
    {
        $customer = static::with('country', 'product_branch', 'user_care', 'user')->select('*',
            DB::raw('IFNULL((SELECT SUM(IF(cp.unit=1, cp.amount, cp.amount * convert_kg_pc)) FROM compact_products cp JOIN compacts c ON c.id=cp.compact_id WHERE c.customer_id=customers.id and c.status NOT IN (0, -1)), 0) AS total_kg'),
            DB::raw('IFNULL((SELECT SUM(c.price - IFNULL((SELECT SUM(p.amount_receive) FROM compact_payments p WHERE c.id=p.compact_id), 0)) FROM compacts c WHERE c.customer_id=customers.id and c.status NOT IN (0, -1)), 0) AS debt'),
            DB::raw('(SELECT MAX(c.created_at) FROM compacts c WHERE c.customer_id=customers.id and c.status NOT IN (0, -1)) AS last_buy'),
            DB::raw('IFNULL((SELECT COUNT(1) FROM compacts c WHERE c.customer_id=customers.id and c.status NOT IN (0, -1)), 0) AS total_compact')
        );
        $source = config('params.customer.source');

        return DataTables::of($customer)
            ->filter(function ($query) use ($request) {
                static::getWhere($query, $request);
            })
            ->addColumn('action', function ($customer) {
                return $customer->generateActionColumn();
            })
            // ->addColumn('last_buy', function ($customer) {
            // return $customer->get_last_buy();
            // })
            // ->addColumn('total_kg', function ($customer) {
            // return $customer->get_total_kg();
            // })
            // ->addColumn('debt', function ($customer) {
            // return $customer->get_debt();
            // })
            // ->editColumn('total_compact', function ($customer) {
            // return $customer->compacts()->count();
            // })
            ->editColumn('product_branch_id', function ($customer) {
                return $customer->product_branch ? $customer->product_branch->name : '';
            })
            ->editColumn('type', function ($customer) {
                return $customer->getIsNewText() . ' ' . $customer->getTypeText();
            })
            ->editColumn('source', function ($customer) use ($source) {
                return isset($source[$customer->source]) ? $source[$customer->source] : '';
            })
            ->editColumn('status', function ($customer) {
                return $customer->getStatusText();
            })
            ->editColumn('country', function ($customer) {
                return $customer->country ? $customer->country->name : '';
            })
            ->editColumn('created_by', function ($customer) {
                return $customer->user ? $customer->user->name : '';
            })
            ->editColumn('user_id', function ($customer) {
                return $customer->get_saler();
            })
            ->editColumn('created_at', function ($customer) {
                return $customer->created_at ? date('d/m/Y H:i:s', strtotime($customer->created_at)) : '';
            })
            ->editColumn('updated_at', function ($customer) {
                return $customer->updated_at ? date('d/m/Y H:i:s', strtotime($customer->updated_at)) : '';
            })
            ->editColumn('content', function ($customer) {
                $sentence = preg_replace("/<[^>]+\>/i", " ", $customer->content);
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
            ->editColumn('name', function ($customer) {
                $html = '<div class="title-tooltip">' . $customer->name;
                $html .= '<div class="tooltiptext hidden">';
                $html .= '<p>' . $customer->email . '</p>';
                $html .= '<p>' . $customer->phone . '</p>';
                $html .= '<p>' . $customer->address . '</p>';
                $html .= '</div>';
                return $html.'</div>';
            })
            // ->editColumn('address', function ($customer) {
            // $sentence = preg_replace("/<[^>]+\>/i", " ", $customer->address);
            // $html = $sentence;
            // if (count(explode(' ', $sentence)) > 10) {
            // $html = implode(' ', array_slice(explode(' ', $sentence), 0, 10)) . '...';
            // }
            // return '<div class="" data-toggle="tooltip" data-html="true" title=\''.(str_replace("'", "\'", $sentence)).'\'>'.$html.'</div>';
            // })
            ->rawColumns(['status', 'type', 'content', 'address', 'name', 'user_id', 'action'])
            ->make(true);
    }

    public static function exportToExcel($request)
    {
        $customer = static::with('country', 'product_branch', 'user_care', 'user', 'compacts');
        static::getWhere($customer, $request);
        $list = $customer->get();
        $fileName = 'khach_hang_' . date('Y_m_d_His');

        \Maatwebsite\Excel\Facades\Excel::create($fileName, function ($excel) use ($list) {
            $excel->sheet('Danh sach khách hàng', function ($sheet) use ($list) {
                $sheet->mergeCells('A1:I1');

                $sheet->cell('A1', function ($cell) {
                    $cell->setValue('Danh sach khách hàng');
                    $cell->setFontWeight('bold');
                });

                $result = [];
                $status = config('params.customer.status');
                $source = config('params.customer.source');
                $types = config('params.customer.type');
                $users = User::pluck('name', 'id');

                foreach ($list as $key => $value) {
                    $compacts = Compact::where('customer_id', $value->id)->get();
                    $result[] = [
                        'ID' => $value->id,
                        'Tên' => $value->name,
                        'Email' => $value->email,
                        'Số điện thoại' => $value->phone,
                        'Địa chỉ' => $value->address,
                        'Quốc gia' => $value->country ? $value->country->name : '',
                        'Sale' => $value->user_care ? $value->user_care->name : '',
                        'Thương hiệu' => $value->product_branch ? $value->product_branch->name : '',
                        'Số đơn' => $value->compacts()->count(),
                        'Số kg' => $value->get_total_kg(),
                        'Công nợ' => $value->get_debt(),
                        'Loại khách hàng' => isset($types[$value->type]) ? $types[$value->type] : '',
                        'Trạng thái' => isset($status[$value->status]) ? $status[$value->status] : '',
                        'Lần mua hàng cuối cùng' => $value->get_last_buy(),
                        'Nguồn' => isset($source[$value->source]) ? $source[$value->source] : '',
                        'Liên hệ' => $value->contact,
                        'Ghi chú' => $value->content,
                    ];
                }
                $sheet->fromArray($result, null, 'A2', false, true);
            });
        })->download('xlsx');
    }

    public function get_last_buy()
    {
        $tmp = Compact::where('customer_id', $this->id)->where('status', '<>', -1)->first();
        return $tmp ? $tmp->created_at : '';
    }

    public function get_total_kg()
    {
        $tmp = CompactProduct::select(\DB::raw('SUM(IF(unit=1, amount, amount * convert_kg_pc)) AS c'))->whereIn('compact_id', $this->compacts()->pluck('id'))->first();
        return $tmp ? $tmp->c : '';
    }

    public function get_debt()
    {
        $tmp = Compact::select(\DB::raw('SUM(price - IFNULL((SELECT SUM(amount_receive) FROM compact_payments p WHERE compacts.id=p.compact_id), 0)) AS c'))
            ->where('customer_id', $this->id)
            ->first();
        return $tmp ? $tmp->c : '';
    }

    public static function find($id)
    {
        $user = Sentinel::getUser();
        $customer = static::where('id', $id);
//        if (!$user->isSuperAdmin()) {
//            // $users = User::where('manager_id', $user->id)
//            // ->orWhere('id', $user->id)
//            // ->pluck('id')
//            // ->all();
//            $customer->where(function($q) use($user) {
//                $q->where('created_by', $user->id)->orWhere('user_id', $user->id);
//            });
//        }
        return $customer->first();
    }

    public function getTypeText()
    {
        $types = config('params.customer.type');
        $type_label = config('params.customer.status_label');

        return '<label class="label label-' . (isset($type_label[$this->type]) ? $type_label[$this->type] : '') . '">' . (isset($types[$this->type]) ? $types[$this->type] : '') . '</label>';
    }

    public function getIsNewText()
    {
        $types = config('params.customer.is_new');
        $type_label = config('params.customer.is_new_label');

        return '<label class="label label-' . (isset($type_label[$this->is_new]) ? $type_label[$this->is_new] : '') . '">' . (isset($types[$this->is_new]) ? $types[$this->is_new] : '') . '</label>';
    }

    public function getStatusText()
    {
        $status = config('params.customer.status');
        $status_label = config('params.customer.status_label');

        return '<label class="label label-' . (isset($status_label[$this->status]) ? $status_label[$this->status] : '') . '">' . (isset($status[$this->status]) ? $status[$this->status] : '') . '</label>';
    }

    public static function getWhere(&$query, $request)
    {
        $user = Sentinel::getUser();
//        if (!$user->isSuperAdmin()) {
//            $query->where(function($q) use($user) {
//                $q->where('created_by', $user->id)->orWhere('user_id', $user->id);
//            });
//        }

        if ($request->has('name') && $request->get('name')!==null) {
            $query->where(function($q) use ($request) {
                $q->where('name', 'like', '%' . $request->get('name') . '%')
                    ->orWhere('phone', 'like', '%' . $request->get('name') . '%')
                    ->orWhere('email', 'like', '%' . $request->get('name') . '%')
                    ->orWhere('address', 'like', '%' . $request->get('name') . '%');
            });
        }
        if ($request->has('status') && $request->get('status')!==null) {
            $query->where('status', $request->get('status'));
        }
        if ($request->has('source') && $request->get('source')!==null) {
            $query->where('source', $request->get('source'));
        }
        if ($request->has('country_id') && $request->get('country_id')!==null) {
            $query->where('country_id', $request->get('country_id'));
        }
        if ($request->has('user_id') && $request->get('user_id')!==null) {
            $query->where('created_by', $request->get('user_id'));
        }
        if ($request->has('from_date') && $request->get('from_date')!==null) {
            $query->where('created_at', '>=', Carbon::createFromFormat('d/m/Y', $request->from_date)->toDateString() . ' 00:00:00');
        }
        if ($request->has('to_date') && $request->get('to_date')!==null) {
            $query->where('created_at', '<=', Carbon::createFromFormat('d/m/Y', $request->to_date)->toDateString() . ' 23:59:59');
        }
        if ($request->has('date') && $request->get('date')!==null) {
            $date = explode('/', $request->get('date'));
            try {
                $dateRange = explode(' - ', $request->get('date'));
                $query->where('created_at', '>=', Carbon::createFromFormat('d/m/Y', $dateRange[0])->toDateString() . ' 00:00:00');
                $query->where('created_at', '<=', Carbon::createFromFormat('d/m/Y', $dateRange[1])->toDateString() . ' 23:59:59');
            } catch (\Exception $e) {

            }
        }
        return $query;
    }

    public static function getCustomerList(){
        return self::where([
            'status' => 1
        ])->pluck('name','id')->toArray();
    }
}
