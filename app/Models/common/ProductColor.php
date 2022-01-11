<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class ProductColor extends Model
{
    use HasFactory;

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
        'sort',
        'group_id',
        'content',
        'image',
        'intro',
        'status'
    ];

    public function group()
    {
        return $this->hasOne(ProductColorGroup::class, 'id', 'group_id');
    }

    public static function getDatatables($request)
    {
        $product_color = static::with('group');

        return DataTables::of($product_color)
            ->filter(function ($query) use ($request) {
                if ($request->has('name') && $request->get('name')!==null) {
                    $query->where('name', 'like', '%' . $request->get('name') . '%');
                }
                if ($request->has('status') && $request->get('status')!==null) {
                    $query->where('status', $request->get('status'));
                }

                if($request->get('code','')){
                    $code = $request->get('code','');
                    $group = ProductColorGroup::query()
                        ->where('code', $code)->first();
                    if($group){
                        $query->where('group_id', $group->id);
                    }
                }else{
                    if ($request->has('group_id') && $request->get('group_id')!==null) {
                        $query->where('group_id', $request->get('group_id'));
                    }
                    $group = ProductColorGroup::query()
                        ->where('code', 'huong-dan-thanh-vien')->first();
                    $query->where('group_id', '!=', $group->id);
                }


            })
            ->editColumn('group', function ($product_color) {
                return $product_color->group ? $product_color->group->name : '';
            })
            ->editColumn('status', function ($product_color) {
                return $product_color->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->editColumn('created_at', function ($product_branch) {
                return $product_branch->created_at;
            })
            ->editColumn('updated_at', function ($product_branch) {
                return $product_branch->updated_at;
            })
            ->addColumn('action', function ($product_color) use ($request){
                return '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('product_color.edit', ['id'=>$product_color->id, 'code'=>$request->get('code','')]) . '"><i class="fa fa-pen-alt text-primary"></i></a>';
            })
            ->editColumn('image', function ($product) {
                return $product->image ? '<img src="'.$product->image.'" width="100px" />' : '';
            })
            ->rawColumns(['status', 'action', 'image'])
            ->make(true);
    }
    public static function getProductColorList($group_id=0){
        if($group_id){
            return self::where([
                'status'=>1,
                'group_id'=>$group_id
            ])->pluck('name','id')->toArray();
        }else{
            return self::where([
                'status'=>1
            ])->pluck('name','id')->toArray();
        }
    }

}
