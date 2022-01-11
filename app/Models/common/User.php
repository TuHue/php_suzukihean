<?php

namespace App\Models\common;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Cartalyst\Sentinel\Users\EloquentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class User extends EloquentUser
{
    use HasFactory, HasActionColumn;

    protected $table = 'users';

    protected $fillable = [
        'email',
        'name',
        'phone',
        'address',
        'status',
        'permissions',
        'last_login',
        'phone',
        'password',
        'type',
        'salary',
        'manager_id',
        'group_id',
        'branch_id',
        'department_id',
        'product_branch_id',
        'avatar'
    ];

    public function manager()
    {
        return $this->hasOne(User::class, 'id' , 'manager_id');
    }

    public function group()
    {
        return $this->hasOne(Group::class,  'id' ,'group_id');
    }

    public function department()
    {
        return $this->hasOne(Department::class, 'id' ,'department_id');
    }

    public function branch()
    {
        return $this->hasOne(Branch::class, 'id' ,'branch_id');
    }

    public function brand()
    {
        return $this->hasOne(Brand::class, 'id' ,'brand_id');
    }

    public static function getDatatables($request){
        $user = static::with('roles', 'brand', 'branch', 'department', 'group', 'manager');

        return DataTables::of($user)
            ->filter(function ($query) use ($request) {
//                if ($request->has('name')) {
//                    $query->where('name', 'like', '%' . $request->get('name') . '%');
//                }
//
//                if ($request->has('email')) {
//                    $query->where('email', 'like', '%' . $request->get('email') . '%');
//                }
//
//                if ($request->has('role_id')) {
//                    $query->whereHas('roles', function ($q) use ($request) {
//                        return $q->where('id', $request->get('role_id'));
//                    });
//                }
//
//                if ($request->has('branch_id')) {
//                    $query->where('branch_id', $request->get('branch_id'));
//                }
//
//                if ($request->has('department_id')) {
//                    $query->where('department_id', $request->get('department_id'));
//                }
//
//                if ($request->has('group_id')) {
//                    $query->where('group_id', $request->get('group_id'));
//                }
//
//                if ($request->has('status')) {
//                    $query->where('status', $request->get('status'));
//                }
            })
            ->editColumn('group', function ($user) {
                return $user->group ? $user->group->title : '';
            })
            ->editColumn('branch', function ($user) {
                return $user->branch ? $user->branch->title : '';
            })
            ->editColumn('department', function ($user) {
                return $user->department ? $user->department->title : '';
            })
            ->editColumn('brand', function ($user) {
                return $user->brand ? $user->brand->title : '';
            })
            ->editColumn('status', function ($user) {
                return $user->status ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
            })
            ->editColumn('type', function ($user) {
//                $type = config('system.team.type');
//                return isset($type[$user->type]) ? $type[$user->type] : $user->type;
            })
            ->editColumn('manager', function ($user) {
                return $user->manager ? $user->manager->name : '';
            })
            ->addColumn('roles', function ($user) {
                $roles = '';

                foreach ($user->roles as $role) {
                    $roles .= '&nbsp;&nbsp;<span style="background-color: #e3e3e3">' . $role->name . '</span>';
                }

                return $roles;
            })
            ->addColumn('action', function ($user) {
                return $user->generateActionColumn();
            })
            ->editColumn('created_at', function ($user) {
                return $user->created_at ? date('d/m/Y H:i:s', strtotime($user->created_at)) : '';
            })
            ->editColumn('updated_at', function ($user) {
                return $user->updated_at ? date('d/m/Y H:i:s', strtotime($user->updated_at)) : '';
            })
            ->editColumn('avatar', function ($user) {
                return $user->avatar ? '<img width="70" src="'.$user->avatar.'" class="img-circle thumb-sm"/>' : '';
            })
            ->rawColumns(['roles', 'status', 'action', 'avatar', 'name'])
            ->make(true);
    }


    protected function getActionColumnPermissions()
    {
        return [
            'user.edit' => '<a class="get-form table-action-btn" href="javascript:void(0)" class="get-form" data-href="' . route('user.edit', $this->id) . '"><i class="fa fa-pencil-alt text-primary font-size-18"></i></a>&nbsp;&nbsp;',
//            'user.delete' => '<a class="get-form table-action-btn" href="javascript:void(0)" class="get-form" data-href="' . route('user.delete', $this->id) . '"><i class="fa fa-trash-alt text-danger font-size-18"></i></a>&nbsp;&nbsp;'
        ];
    }

    public static function getUserList(){
        $result = self::where([
            'status' => 1
        ])->pluck('name', 'id')->toArray();
        if($result){
            return $result;
        }
        return [];
    }

    public static function getUserById($id){
        $result = self::where([
            'status' => 1,
            'id' => $id
        ])->pluck('name', 'id')->toArray();
        if($result){
            return $result;
        }
        return [];
    }

    public static function getUserSameBranch()
    {
        try {
            $userCurrent = Sentinel::getUser();
            $user = User::where([
                'id' => $userCurrent->id
            ])->first();
            if ($user) {
                return DB::table('users')->where([
                    'branch_id' => $user->branch_id
                ])->pluck('id')->toArray();
            }
        }catch (\Exception $e){

        }
        return [];
    }
}
