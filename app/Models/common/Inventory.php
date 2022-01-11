<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class Inventory extends Model
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
        'product_id',
        'name',
        'name_vi',
        'category_id',
        'category_group_id',
        'branch_id',
        'standard_id',
        'type_id',
        'size_id',
        'color_group_id',
        'color_id',
        'image',
        'content',
        'amount',
        'unit',
        'status'
    ];

    public function category_group()
    {
        return $this->hasOne(ProductCategoryGroup::class, 'id', 'category_group_id');
    }

    public function category()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'category_id');
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

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
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


    public static function getDatatables($request)
    {
        $inventory = static::query();

        return DataTables::of($inventory)
            ->filter(function ($query) use ($request) {
                static::getWhere($query, $request);
                return $query;
            })
            // 'category', 'category_group', 'branch', 'standard', 'type', 'size', 'color_group', 'color'
            ->editColumn('category', function ($inventory) {
                return $inventory->category ? $inventory->category->name : '';
            })
            ->editColumn('category_store', function ($inventory) {
                return $inventory->category ? $inventory->category->name_vi : '';
            })
            ->editColumn('category_group', function ($inventory) {
                return $inventory->category_group ? $inventory->category_group->name : '';
            })
            ->editColumn('branch', function ($inventory) {
                return $inventory->branch ? $inventory->branch->name : '';
            })
            ->editColumn('standard', function ($inventory) {
                return $inventory->standard ? $inventory->standard->name : '';
            })
            ->editColumn('standard_store', function ($inventory)  {
                return $inventory->standard ? $inventory->standard->name_vi : '';
            })
            ->editColumn('type', function ($inventory) {
                return $inventory->type ? $inventory->type->name : '';
            })
            ->editColumn('type_store', function ($inventory) {
                return $inventory->type ? $inventory->type->name_vi : '';
            })
            ->editColumn('size', function ($inventory) {
                return $inventory->size ? $inventory->size->name : '';
            })
            ->editColumn('color_group', function ($inventory) {
                return $inventory->color_group ? $inventory->color_group->name : '';
            })
            ->editColumn('color', function ($inventory) {
                return $inventory->color ? $inventory->color->name : '';
            })

            ->editColumn('status', function ($inventory) {
                return $inventory->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->editColumn('image', function ($inventory) {
                return $inventory->image ? '<img src="'.$inventory->image.'" width="100px" />' : '';
            })
            ->editColumn('created_at', function ($inventory) {
                return $inventory->created_at;
            })
            ->editColumn('updated_at', function ($inventory) {
                return $inventory->updated_at;
            })
            ->addColumn('action', function ($inventory) {
                return $inventory->generateActionColumn();
            })
            ->rawColumns(['status', 'image', 'action'])
            ->make(true);
    }

    protected function getActionColumnPermissions()
    {
        return [
            'inventory.edit' => '<a class="table-action-btn" title="Chỉnh sửa" href="' . route('inventory.edit', $this->id) . '"><i class="fa fa-pen-alt text-primary"></i> '.$this->id.'</a> '
        ];
    }
}
