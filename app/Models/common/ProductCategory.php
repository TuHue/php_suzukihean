<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class ProductCategory extends Model
{
    use HasFactory, HasActionColumn;

    protected $fillable = [
        'code',
        'code_vi',
        'name',
        'name_vi',
        'group_id',
        'content',
        'status',
        'parent_id',
        'level',
        'image',
        'sort'
    ];

    public function group()
    {
        return $this->hasOne(ProductCategoryGroup::class, 'id', 'group_id');
    }

    public function parent()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(ProductCategory::class, 'id', 'parent_id');
    }

    public static function getDatatables($request)
    {
        $product_category = static::with('group');

        return DataTables::of($product_category)
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name')!==null) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->has('group_id') && $request->get('group_id')!==null) {
                    $query->where('group_id', $request->get('group_id'));
                }
                if ($request->has('status') && $request->get('status')!==null) {
                    $query->where('status', $request->get('status'));
                }
                $query->orderBy('sort', 'asc');
            })
            ->editColumn('code', function ($product_category) {
                $prefix = substr(' --  --  -- ', 0, 4 * (int)$product_category->level);
                return $prefix . $product_category->name;
            })
            ->editColumn('group', function ($product_category) {
                return $product_category->group ? $product_category->group->name : '';
            })
            ->editColumn('status', function ($product_category) {
                return $product_category->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->editColumn('created_at', function ($product_branch) {
                return $product_branch->created_at;
            })
            ->editColumn('updated_at', function ($product_branch) {
                return $product_branch->updated_at;
            })
            ->addColumn('action', function ($product_category) {
                return $product_category->generateActionColumn();
            })
            ->addColumn('parent', function ($product_category) {
                return $product_category->parent ? $product_category->parent->name : '';
            })
            ->rawColumns(['status', 'show', 'action'])
            ->make(true);
    }

    protected function getActionColumnPermissions()
    {
        return [
            'product.edit' => '<a class="table-action-btn get-form" title="Chỉnh sửa" href="javascript:void(0);" data-href="' . route('product_category.edit', $this->id) . '"><i class="fa fa-pencil-alt text-primary font-size-18"></i></a>&nbsp;&nbsp;',
            'product.delete' => '<a class="table-action-btn delete-ajax" title="Xóa" href="javascript:void(0);" data-href="' . route('product_category.delete', $this->id) . '"><i class="fa fa-trash-alt text-danger font-size-18"></i></a> &nbsp;&nbsp;'
        ];
    }


    public static function getProductCategoryList($group_id=0){
        $result = [];
        if($group_id){
            $result = self::where([
                'status'=>1,
                'group_id'=>$group_id
            ])->pluck('name','id')->toArray();
        }else{
            $list_cate = self::where([
                'status'=>1
            ])->orderBy('sort', 'asc')->get();
            if($list_cate){
                foreach ($list_cate as $cate){
                    $prefix = substr(' --  --  -- ', 0, 4 * (int)$cate->level);
                    $result[$cate->id] = $prefix . $cate->name;
                }
            }
        }

       return $result;
    }

    public static function updateLevel($product){
        if($product->parent_id){
            $parent_cate = self::find($product->parent_id);
            if($parent_cate){
                $product->level = (((int)$parent_cate->level) + 1);
                $product->save();

                $cur = (string)$product->id . substr("000", 0, 3 - strlen((string)$product->id));
                $par_1 = (string)$parent_cate->id . substr("000", 0, 3 - strlen((string)$parent_cate->id));
                if($product->level == 1) {
                    $product->sort = $par_1 . $cur . "000";
                }
                if($product->level == 2){
                   $parent_cate2 = self::find($parent_cate->parent_id);
                   if($parent_cate2){
                       $par_2 = (string)$parent_cate2->id . substr("000", 0, 3 - strlen((string)$parent_cate2->id));
                       $product->sort = $par_2 . $par_1 . $cur;
                   }
                }
            }
            $product->save();
        }else{
            $rest = 9-strlen((string)$product->id);
            $product->sort = (string)$product->id . substr("000000000", 0, $rest);
            $product->level = 0;
            $product->save();
        }
    }

    public function to_slug($str) {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
}
