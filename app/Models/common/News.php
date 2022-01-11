<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','intro','content','created_at','created_by','updated_at','updated_by','status','is_home','sort',
        'category_id','image'
    ];

    public function category()
    {
        return $this->hasOne(NewsCategory::class, 'id', 'category_id');
    }

    public static function getDatatables($request)
    {
        $news = static::with('category');

        return DataTables::of($news)
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
            ->editColumn('category', function ($news) {
                return $news->category ? $news->category->name : '';
            })
            ->editColumn('status', function ($news) {
                return $news->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->editColumn('created_at', function ($news) {
                return $news->created_at;
            })
            ->editColumn('updated_at', function ($news) {
                return $news->updated_at;
            })
            ->addColumn('action', function ($news) use ($request){
                return '<a class="get-form table-action-btn" href="javascript:void(0)" title="Chỉnh sửa" data-href="' . route('news.edit', ['id'=>$news->id, 'code'=>$request->get('code','')]) . '"><i class="fa fa-pen-alt text-primary"></i></a>';
            })
            ->editColumn('image', function ($news) {
                return $news->image ? '<img src="'.$news->image.'" width="100px" />' : '';
            })
            ->rawColumns(['status', 'action', 'image'])
            ->make(true);
    }
}
