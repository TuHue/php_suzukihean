<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class NewsCategory extends Model
{
    use HasFactory;

    protected $table = "news_category";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','created_at','created_by','updated_at','updated_by','status','parent_id','sort','image'
    ];

    public function parent()
    {
        return $this->hasOne(NewsCategory::class, 'id', 'parent_id');
    }

    public static function getDatatables($request)
    {
        $new_category = static::with('parent');

        return DataTables::of($new_category)
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
            })
            ->editColumn('parent', function ($new_category) {
                return $new_category->parent ? $new_category->parent->name : '';
            })
            ->editColumn('status', function ($new_category) {
                return $new_category->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->editColumn('created_at', function ($new_category) {
                return $new_category->created_at;
            })
            ->editColumn('updated_at', function ($new_category) {
                return $new_category->updated_at;
            })
            ->addColumn('action', function ($new_category) use ($request){
                return '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('news_category.edit', ['id'=>$new_category->id, 'code'=>$request->get('code','')]) . '"><i class="fa fa-pen-alt text-primary"></i></a>';
            })
            ->editColumn('image', function ($new_category) {
                return $new_category->image ? '<img src="'.$new_category->image.'" width="100px" />' : '';
            })
            ->rawColumns(['status', 'action', 'image'])
            ->make(true);
    }


    public static function getNewsCategoryList($ignore_id=0){
        if($ignore_id){
            return self::where([
                'status'=>1
            ])->where('id','<>',$ignore_id)->pluck('name','id')->toArray();
        }
        return self::where([
            'status'=>1
        ])->pluck('name','id')->toArray();
    }
}
