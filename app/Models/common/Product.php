<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class Product extends Model
{
    use HasFactory, HasActionColumn;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'code_vi',
        'name',
        'name_vi',
        'image',
        'category_id',
        'price',
        'sort',
        'content',
        'status',
        'deleted_at',
        'deleted_by',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by',
        'unit',
        'workshop_id',
        'dong_co_hop_so',
        'ngoai_that',
        'tam_nhin',
        'tai_lai_bang_dieu_khien',
        'khung_gam',
        'kich_thuoc_tai_trong',
        'ngoai_that_title',
        'tinh_nang_title',
        'noi_that_title',
        'ngoai_that_image_1',
        'ngoai_that_image_2',
        'ngoai_that_image_3',
        'ngoai_that_des_1',
        'ngoai_that_des_2',
        'ngoai_that_des_3',
        'noi_that_image_3',
        'noi_that_image_2',
        'noi_that_image_1',
        'noi_that_des_1',
        'noi_that_des_3',
        'noi_that_des_2',
        'tinh_nang_des_1',
        'tinh_nang_des_2',
        'tinh_nang_des_3',
        'tinh_nang_image_1',
        'tinh_nang_image_2',
        'tinh_nang_image_3'
    ];

    public function category_group()
    {
        return $this->hasOne(ProductCategoryGroup::class, 'id', 'category_group_id');
    }

    public function category()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'category_id');
    }

    public function branch()
    {
        return $this->hasOne(ProductBranch::class, 'id', 'branch_id');
    }

    public function standard()
    {
        return $this->hasOne(ProductStandard::class, 'id', 'standard_id');
    }

    public function size()
    {
        return $this->hasOne(ProductSize::class, 'id', 'size_id');
    }

    public function type()
    {
        return $this->hasOne(ProductType::class, 'id', 'type_id');
    }

    public function color_group()
    {
        return $this->belongsTo(ProductColorGroup::class, 'color_group_id', 'id');
    }

    public function color()
    {
        return $this->belongsTo(ProductColor::class, 'color_id', 'id');
    }

    public function workshop()
    {
        return $this->belongsTo(Workshop::class, 'workshop_id', 'id');
    }

    public static function getWhere(&$query, $request)
    {
        if ($request->has('name')  && $request->get('name')!==null) {
            $query->where(function($q) use ($request) {
                $q->where('code', 'like', '%' . $request->get('name') . '%')
                    ->orWhere('name', 'like', '%' . $request->get('name') . '%');
            });
        }
        if ($request->has('status')  && $request->get('status')!==null) {
            $query->where('status', $request->get('status'));
        }
        if ($request->has('category_group_id') && $request->get('category_group_id')!==null) {
            $query->where('category_group_id', $request->get('category_group_id'));
        }
        if ($request->has('category_id')&& $request->get('category_id')!==null) {
            $query->where('category_id', $request->get('category_id'));
        }
        if ($request->has('branch_id')&& $request->get('branch_id')!==null) {
            $query->where('branch_id', $request->get('branch_id'));
        }
        if ($request->has('standard_id')&& $request->get('standard_id')!==null) {
            $query->where('standard_id', $request->get('standard_id'));
        }
        if ($request->has('type_id')&& $request->get('type_id')!==null) {
            $query->where('type_id', $request->get('type_id'));
        }
        if ($request->has('size_id')&& $request->get('size_id')!==null) {
            $query->where('size_id', $request->get('size_id'));
        }
        if ($request->has('color_group_id')&& $request->get('color_group_id')!==null) {
            $query->where('color_group_id', $request->get('color_group_id'));
        }
        if ($request->has('color_id')&& $request->get('color_id')!==null) {
            $query->where('color_id', $request->get('color_id'));
        }
        return $query;
    }

    public static function getProductStandardBranchList(){
//        return ProductStandardBranch::select(DB::raw("CONCAT(branch_id, '-', standard_id) AS branch_standard_id"), 'name')->pluck('name', 'branch_standard_id')->toArray();;
    }

    public static function getDatatables($request)
    {
//        $product = static::with('category', 'standard', 'type', 'size');
        $product = static::query();
//        $product_standard_branch_id = self::getProductStandardBranchList();

        return DataTables::of($product)
            ->filter(function ($query) use ($request) {
                static::getWhere($query, $request);
                return $query;
            })
            // 'category', 'category_group', 'branch', 'standard', 'type', 'size', 'color_group', 'color'
            ->editColumn('category', function ($product) {
                return $product->category ? $product->category->name : '';
            })
            ->editColumn('category_store', function ($product) {
                return $product->category ? $product->category->name_vi : '';
            })
            ->editColumn('category_group', function ($product) {
                return $product->category_group ? $product->category_group->name : '';
            })
            ->editColumn('branch', function ($product) {
                return $product->branch ? $product->branch->name : '';
            })
            ->editColumn('standard', function ($product) {
                return $product->standard ? $product->standard->name : '';
            })
            ->editColumn('standard_store', function ($product)  {
                return $product->standard ? $product->standard->name_vi : '';
            })
            ->editColumn('type', function ($product) {
                return $product->type ? $product->type->name : '';
            })
            ->editColumn('type_store', function ($product) {
                return $product->type ? $product->type->name_vi : '';
            })
            ->editColumn('size', function ($product) {
                return $product->size ? $product->size->name : '';
            })
            ->editColumn('color_group', function ($product) {
                return $product->color_group ? $product->color_group->name : '';
            })
            ->editColumn('color', function ($product) {
                return $product->color ? $product->color->name : '';
            })

            ->editColumn('status', function ($product) {
                return $product->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->editColumn('image', function ($product) {
                return $product->image ? '<img src="'.$product->image.'" width="100px" />' : '';
            })
            ->editColumn('created_at', function ($product) {
                return $product->created_at;
            })
            ->editColumn('updated_at', function ($product) {
                return $product->updated_at;
            })
            ->addColumn('action', function ($product) {
                return $product->generateActionColumn();
            })
            ->rawColumns(['status', 'image', 'action'])
            ->make(true);
    }

    protected function getActionColumnPermissions()
    {
        return [
            'product.edit' => '<a class="table-action-btn" title="Chỉnh sửa" href="' . route('product.edit', $this->id) . '"><i class="fa fa-pencil-alt text-primary font-size-18"></i></a>&nbsp;&nbsp;',
            'product.delete' => '<a class="table-action-btn delete-ajax" title="Xóa" href="javascript:void(0);" data-href="' . route('product.delete', $this->id) . '"><i class="fa fa-trash-alt text-danger font-size-18"></i></a> &nbsp;&nbsp;'
        ];
    }

    public static function findOrCreateWithAttr($data){
        try {
            $product = Product::query()->where([
                'type_id' => $data['type_id'],
                'category_id' => $data['category_id'],
                'standard_id' => $data['standard_id'],
                'size_id' => $data['size_id'],
            ])->first();
            if(!$product){
                $categories = ProductCategory::getProductCategoryList();
                $standards = ProductStandard::getProductStandardList();
                $types = ProductType::getProductTypeList();
                $sizes = ProductSize::getProductSizeList();

                $categories_vi = ProductCategory::pluck('name_vi', 'id')->toArray();
                $types_vi = ProductType::pluck('name_vi', 'id')->toArray();
                $standards_vi = ProductStandard::pluck('name_vi', 'id')->toArray();
                $sizes_vi = ProductSize::pluck('name_vi', 'id')->toArray();

                $name = $code = implode("-",[
                    $categories[$data['category_id']],
                    $standards[$data['standard_id']],
                    $types[$data['type_id']],
                    $sizes[$data['size_id']],
                ]);
                $name_vi = $code_vi = implode("-",[
                    $categories_vi[$data['category_id']],
                    $standards_vi[$data['standard_id']],
                    $types_vi[$data['type_id']],
                    $sizes_vi[$data['size_id']],
                ]);

                $product = Product::create([
                    'type_id' => $data['type_id'],
                    'category_id' => $data['category_id'],
                    'standard_id' => $data['standard_id'],
                    'size_id' => $data['size_id'],
                    'name' => $name,
                    'name_vi' => $name_vi,
                    'code' => $code,
                    'code_vi' => $code_vi,
                    'status' => 1,
                    'unit' => 1
                ]);
            }
            return $product;
        }catch (\Exception $e){
            return null;
        }
    }
}
