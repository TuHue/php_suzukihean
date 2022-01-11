<?php

namespace App\Models\common;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class CompactProduct extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type',
        'code',
        'compact_id',
        'product_id',

        'product_branch_id',
        'product_type_id',
        'product_standard_id',
        'product_category_id',
        'product_size_id',
        'product_color_group_id',
        'product_color_id',
        'product_note',

        'product_standard_code',
        'product_type_code',
        'product_branch_code',
        'product_category_code',
        'product_size_code',

        'product_branch_name',
        'product_type_name',
        'product_standard_name',
        'product_standard_name_common',
        'product_category_name',
        'product_size_name',

        'total_price',
        'total_raw',
        'price',
        'price_pc',
        'price_gam',
        'convert_kg_pc',

        'packet',
        'amount',
        'amount_gam',
        'unit',
        'no',
        'country_id',
        'use_inventory', /*Sử dụng hàng tồn kho*/
        'status', /*Sử dụng hàng tồn kho*/
        'workshop_id', /*Sử dụng hàng tồn kho*/

        'completed',
        'completed_date',
        'created_by',
        'updated_by',
    ];

//    public function process()
//    {
//        return $this->hasMany(CompactProductDetailProcess::class, 'item_id', 'id');
//    }

    public function country()
    {
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function compact()
    {
        return $this->hasOne(Compact::class, 'id', 'compact_id');
    }

    public static function getWhere(&$query, $request, $status=[1, 2, 3, 4, 5, 6], $alias='created_at')
    {
        if($status) {
            $compact = Compact::whereIn('status', $status);
            if ($request->has('status')) {
                $compact->where('status', $request->get('status'));
            }
            if ($request->has('code')) {
                $compact->where('code', $request->get('code'));
            }
            $query->whereIn('compact_id', $compact->pluck('id'));
        }

        if ($request->has('branch_id')) {
            $query->where('product_branch_id', $request->get('branch_id'));
        }
        if ($request->has('country_id')) {
            $query->where('country_id', $request->get('country_id'));
        }
        if ($request->has('type_id')) {
            $query->where('product_type_id', $request->get('type_id'));
        }
        if ($request->has('standard_id')) {
            $query->where('product_standard_id', $request->get('standard_id'));
        }
        if ($request->has('category_id')) {
            $query->where('product_category_id', $request->get('category_id'));
        }
        if ($request->has('size_id')) {
            $query->where('product_size_id', $request->get('size_id'));
        }
        if ($request->has('category_group_id')) {
            $query->whereIn('product_category_id', ProductCategory::where('group_id', $request->get('category_group_id'))->pluck('id'));
        }
        if ($request->has('color_group_id')) {
            $color_id = implode(',', ProductColor::where('group_id', $request->get('color_group_id'))->pluck('id')->toArray());
            $query->whereRaw('EXISTS (SELECT * FROM compact_product_details detail WHERE detail.color_id in (' . $color_id . ') AND detail.group_id=compact_products.id)');
        }

        if ($request->has('customer_id')) {
            $query->whereRaw('EXISTS (SELECT * FROM compacts c WHERE c.customer_id = ' . $request->get('customer_id') . ' AND compact_products.compact_id=c.id)');
        }

        if ($request->has('color_id')) {
            $query->whereRaw('EXISTS (SELECT * FROM compact_product_details detail WHERE detail.color_id = ' . $request->get('color_id') . ' AND detail.group_id=compact_products.id)');
        }

        if ($request->has('date')) {
            try {
                $dateRange = explode(' - ', $request->get('date'));
                $query->where($alias, '>=', Carbon::createFromFormat('d/m/Y', $dateRange[0])->toDateString() . ' 00:00:00');
                $query->where($alias, '<=', Carbon::createFromFormat('d/m/Y', $dateRange[1])->toDateString() . ' 23:59:59');
            } catch (\Exception $e) {

            }
        }
        return $query;
    }

    public static function getDatatableProcessed($request)
    {
        $product = static::select('*', DB::raw("(CONCAT(product_branch_name, '-', product_type_name, '-', product_standard_name_common, '-', product_category_name, '-', product_size_name)) as product"), DB::raw("IF(unit = 1, amount, amount * convert_kg_pc) as amount1"))
            ->with('compact', 'country')
            ->where('completed', 100)
            ->orderBy('compact_id');
        $type = config('system.compact.type');
        $product_kg = clone $product;

        static::getWhere($product_kg, $request, false, 'start_store_date');
        $product_kg = $product_kg->select(DB::raw('SUM(IF(unit = 1, amount, amount * convert_kg_pc)) as c'))->first()->c;

        $product_compact = static::select(DB::raw('COUNT(1) as c'))->where('completed', 100)->groupBy('compact_id');
        static::getWhere($product_compact, $request, false, 'start_store_date');
        $product_compact = count($product_compact->get());

        # $category_groups = ProductCategoryGroup::pluck('code', 'id')->toArray();
        $categories = ProductCategory::pluck('code', 'id')->toArray();
        $sizes = ProductSize::pluck('code', 'id')->toArray();
        $branches = ProductBranch::pluck('code', 'id')->toArray();
        $color_groups = ProductColorGroup::pluck('code', 'id')->toArray();
        # $colors = ProductColor::pluck('code', 'id')->toArray();
        $types = ProductType::pluck('code', 'id')->toArray();
        $standards = ProductStandard::pluck('code', 'id')->toArray();

        return DataTables::of($product)
            ->filter(function ($query) use ($request) {
                static::getWhere($query, $request, false, 'start_store_date');
            })
            ->editColumn('product', function ($product) use ($type){
                $colors = [];
                foreach($product->products as $color) {
                    $colors[] = $color->color_code;
                }
                return $product->product . ' ' . (isset($type[$product->type]) && count($colors) > 1 ? $type[$product->type] : '') . ' ' . implode('/', $colors);
            })
            ->editColumn('product_color', function ($product) use ($type){
                $colors = [];
                foreach($product->products as $color) {
                    $colors[] = $color->color_code;
                }
                return (isset($type[$product->type]) && count($colors) > 1 ? $type[$product->type] : '') . ' ' . implode('/', $colors);
            })
            ->editColumn('amount', function ($product) {
                return $product->amount1;
            })
            ->editColumn('compact', function ($product) {
                return $product->compact ? $product->compact->code : '';
            })
            ->editColumn('country_id', function ($product) {
                return $product->country ? $product->country->name : '';
            })
            ->editColumn('status', function ($product) {
                return $product->compact && $product->compact->status == 1 ? 'Đang xử lý' : 'Đã tiếp nhận';
            })
            ->editColumn('sum-total', function ($product) use($product_kg) {
                return $product_kg;
            })
            ->editColumn('sum-compact', function ($product) use($product_compact) {
                return $product_compact;
            })
            ->editColumn('code', function ($product) use($categories, $sizes, $branches, $color_groups, $types, $standards) {
                $code = [];
                if(isset($branches[$product->product_branch_id])) {
                    $code[] = str_replace(' ', '', str_replace('-', '', $branches[$product->product_branch_id]));
                }
                if(isset($types[$product->product_type_id])) {
                    $code[] = str_replace(' ', '', str_replace('-', '', $types[$product->product_type_id]));
                }
                if(isset($standards[$product->product_standard_id])) {
                    $code[] = str_replace(' ', '', str_replace('-', '', $standards[$product->product_standard_id]));
                }
                if(isset($categories[$product->product_category_id])) {
                    $code[] = str_replace(' ', '', str_replace('-', '', $categories[$product->product_category_id]));
                }
                // if(isset($colors[$product->product_color_id])) {
                // $code[] = str_replace(' ', '', str_replace('-', '', $colors[$product->product_color_id]));
                // }
                if(isset($sizes[$product->product_size_id])) {
                    $code[] = str_replace(' ', '', str_replace('-', '', $sizes[$product->product_size_id]));
                }
                return implode('-', $code);
            })
            ->rawColumns(['status'])
            ->make(true);
    }

    public static function exportToExcel($request)
    {
        try {
            $products = static::select('*', DB::raw("(CONCAT(product_branch_name, '-', product_type_name, '-', product_standard_name_common, '-', product_category_name, '-', product_size_name)) as product"), DB::raw("IF(unit = 1, amount, amount * convert_kg_pc) as amount1"))
                ->with('compact')
                ->orderBy('compact_id');
            static::getWhere($products, $request);
            $products = $products->get();
            $file_name = time();
            \Maatwebsite\Excel\Facades\Excel::create($file_name, function ($excel) use ($request, $products) {
                $type = config('system.compact.type');
                $excel->sheet('Danh sách', function ($sheet) use ($request, $products) {
                    $result = [];
                    $tong_kg = 0;
                    $product_types = ProductType::pluck('name_vi', 'id')->toArray();
                    $product_sandards = ProductStandard::pluck('name_vi', 'id')->toArray();
                    $product_categories = ProductCategory::pluck('name_vi', 'id')->toArray();

                    foreach($products as $product) {
                        $colors = [];
                        foreach($product->products as $color) {
                            $colors[] = $color->color_code;
                        }
                        $tong_kg += $product->amount1;

                        $product_root = Product::where([
                            'branch_id' => $product->product_branch_id,
                            'type_id' => $product->product_type_id,
                            'standard_id' => $product->product_standard_id,
                            'category_id' => $product->product_category_id,
                            'size_id' => $product->product_size_id,
                        ])->first();

                        $result[] = [
                            'ID' => $product->id,
                            'Đơn hàng' => $product->compact ? $product->compact->code : '',
                            'Mã sản phẩm' => $product_root ? $product_root->code_vi : '',
                            'Tên sản phẩm' => $product_root ? $product_root->name_vi : '',
                            'Thương hiệu' => $product->product_branch_name,
                            'Loại tóc' => (isset($product_types[$product->product_type_id]) && isset($product_types[$product->product_type_id])) ? $product_types[$product->product_type_id] : $product->product_type_name,
                            'Kiểu tóc' => (isset($product_types[$product->product_category_id]) && isset($product_types[$product->product_category_id])) ? $product_types[$product->product_category_id] : $product->product_category_name,
                            'Tiêu chuẩn' => (isset($product_sandards[$product->product_standard_id]) && isset($product_sandards[$product->product_standard_id])) ? $product_sandards[$product->product_standard_id] : $product->product_standard_name_common,
                            'Kích thước' => $product->product_size_name,
                            'Màu' => (isset($type[$product->type]) && count($colors) > 1 ? $type[$product->type] : '') . ' ' . implode('/', $colors),
                            'Số bó' => $product->packet,
                            'Số kg' => $product->amount1,
                            'Đã xử lý' => implode(', ', $product->process()->whereRaw('completed > 0')->pluck('step_name')->toArray()),
                            'Chưa xử lý' => implode(', ', $product->process()->whereRaw('total > completed')->pluck('step_name')->toArray()),
                            'Đã xử lý (%)' => $product->completed,
                        ];
                    }
                    $result[] = [
                        'ID' => '',
                        'Đơn hàng' => '',
                        'Thương hiệu' => '',
                        'Loại tóc' => '',
                        'Kiểu tóc' => '',
                        'Tiêu chuẩn' => '',
                        'Kích thước' => '',
                        'Màu' => '',
                        'Số bó' => '',
                        'Số kg' => $tong_kg,
                        'Đã xử lý (%)' => '',
                    ];
                    $sheet->fromArray($result, null, 'A2', false, true);
                    $sheet->setBorder('A2:P'.(count($products)+2), 'thin');
                });
            })->download('xlsx');
        } catch (Exception $e) {
            flash()->error('Error!', $e->getMessage());
            Log::info($e->getMessage());
            Log::info($e->getTraceAsString());
        }
        return redirect()->back();
    }

    public static function exportToExcelProcessed($request)
    {
        try {
            $products = static::select('*', DB::raw("(CONCAT(product_branch_name, '-', product_type_name, '-', product_standard_name_common, '-', product_category_name, '-', product_size_name)) as product"), DB::raw("IF(unit = 1, amount, amount * convert_kg_pc) as amount1"))
                ->with('compact')
                ->where('completed', 100)
                ->orderBy('compact_id');
            static::getWhere($products, $request, false, 'completed_date');
            $products = $products->get();
            $file_name = time();
            \Maatwebsite\Excel\Facades\Excel::create($file_name, function ($excel) use ($request, $products) {
                $type = config('system.compact.type');
                $excel->sheet('Danh sách', function ($sheet) use ($request, $products) {
                    $result = [];
                    $tong_kg = 0;

                    $product_types = ProductType::pluck('name_vi', 'id')->toArray();
                    $product_sandards = ProductStandard::pluck('name_vi', 'id')->toArray();
                    $product_categories = ProductCategory::pluck('name_vi', 'id')->toArray();

                    foreach($products as $product) {
                        $colors = [];
                        foreach($product->products as $color) {
                            $colors[] = $color->color_code;
                        }
                        $tong_kg += $product->amount1;
                        $result[] = [
                            'ID' => $product->id,
                            'Đơn hàng' => $product->compact ? $product->compact->code : '',
                            'Quốc gia' => $product->country ? $product->country->name : '',
                            'Thương hiệu' => $product->product_branch_name,

                            'Loại tóc' => (isset($product_types[$product->product_type_id]) && isset($product_types[$product->product_type_id])) ? $product_types[$product->product_type_id] : $product->product_type_name,
                            'Kiểu tóc' => (isset($product_types[$product->product_category_id]) && isset($product_types[$product->product_category_id])) ? $product_types[$product->product_category_id] : $product->product_category_name,
                            'Tiêu chuẩn' => (isset($product_sandards[$product->product_standard_id]) && isset($product_sandards[$product->product_standard_id])) ? $product_sandards[$product->product_standard_id] : $product->product_standard_name_common,

                            // 'Loại tóc' => $product->product_type_name,
                            // 'Kiểu tóc' => $product->product_category_name,
                            // 'Tiêu chuẩn' => $product->product_standard_name_common,
                            'Kích thước' => $product->product_size_name,
                            'Màu' => (isset($type[$product->type]) && count($colors) > 1 ? $type[$product->type] : '') . ' ' . implode('/', $colors),
                            'Số bó' => $product->packet,
                            'Số kg' => $product->amount1,
                            'Ngày hoàn thành' => $product->completed_date
                        ];
                    }
                    $result[] = [
                        'ID' => '',
                        'Đơn hàng' => '',
                        'Quốc gia' => '',
                        'Thương hiệu' => '',
                        'Loại tóc' => '',
                        'Kiểu tóc' => '',
                        'Tiêu chuẩn' => '',
                        'Kích thước' => '',
                        'Màu' => '',
                        'Số bó' => '',
                        'Số kg' => $tong_kg,
                        'Ngày hoàn thành' => '',
                    ];
                    $sheet->fromArray($result, null, 'A2', false, true);
                    $sheet->setBorder('A2:L'.(count($products)+2), 'thin');
                });
            })->download('xlsx');
        } catch (Exception $e) {
            flash()->error('Error!', $e->getMessage());
            Log::info($e->getMessage());
            Log::info($e->getTraceAsString());
        }
        return redirect()->back();
    }

    public static function getDatatablesInCompact($compact_id)
    {

        $categories = ProductCategory::pluck('code', 'id')->toArray();
        $sizes = ProductSize::pluck('code', 'id')->toArray();
        $types = ProductType::pluck('code', 'id')->toArray();
        $standards = ProductStandard::pluck('code', 'id')->toArray();
        $color_groups = ProductColorGroup::pluck('name', 'id')->toArray();
        $colors = ProductColor::pluck('name', 'id')->toArray();
        $workshops = Workshop::pluck('name', 'id')->toArray();

        $product = self::query();

        return Datatables::of($product)
            ->filter(function ($query) use ($compact_id) {
                $query->where([
                    'compact_id' => (int)$compact_id
                ]);
            })
            ->editColumn('status', function ($product){
                return $product->getStatusText();
            })
            ->addColumn('color_group', function ($product) use ($color_groups){
                return isset($color_groups[(int)$product->product_color_group_id])?$color_groups[(int)$product->product_color_group_id]:'';
            })
            ->addColumn('color', function ($product) use ($colors){
                return isset($colors[(int)$product->product_color_id])?$colors[(int)$product->product_color_id]:'';
            })
//            ->addColumn('standard', function ($product) use ($standards){
//                return isset($standards[(int)$product->product_standard_id])?$standards[(int)$product->product_standard_id]:'';
//            })
//            ->addColumn('size', function ($product) use ($sizes){
//                return isset($sizes[(int)$product->product_size_id])?$sizes[(int)$product->product_size_id]:'';
//            })
//            ->addColumn('category', function ($product) use ($categories){
//                return isset($categories[(int)$product->product_category_id])?$categories[(int)$product->product_category_id]:'';
//            })
//            ->addColumn('type', function ($product) use ($types){
//                return isset($types[(int)$product->product_type_id])?$types[(int)$product->product_type_id]:'';
//            })
            ->addColumn('note', function ($product) use ($types){
                return '';
            })
            ->addColumn('action', function ($product) {
                return '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('compact_product.edit', $product->id) . '"><i class="fa fa-pencil-alt text-primary"></i></a>';
            })
            ->addColumn('select_column', function ($product) {
                return '';
            })
            ->addColumn('workshop', function ($product) use ($workshops){
                return isset($workshops[(int)$product->workshop_id])?$workshops[(int)$product->workshop_id]:'';
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }

    public function getStatusText()
    {
        $status = config('params.compact_product.status');
        $status_label = config('params.compact_product.status_label');

        return '<label class="badge bg-' . (isset($status_label[$this->status]) ? $status_label[$this->status] : '') . '">' . (isset($status[$this->status]) ? $status[$this->status] : '') . '</label>';

    }
}
