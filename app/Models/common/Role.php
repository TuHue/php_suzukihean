<?php

namespace App\Models\common;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Yajra\DataTables\Facades\DataTables;

class Role extends Model
{
    use HasFactory, HasActionColumn;

    protected $table = 'roles';

//    protected $fillable = [
//        'name',
//    ];

//    public function users()
//    {
//        return $this->belongsToMany(Role::class, 'role_users', 'role_id', 'user_id');
//    }

    public static function url_slug($str, $options = array()) {
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => true,
        );

        // Merge options
        $options = array_merge($defaults, $options);

        // Lowercase
        if ($options['lowercase']) {
            $str = mb_strtolower($str, 'UTF-8');
        }

        $char_map = array(
            // Latin
            'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a', 'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a', 'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a', 'đ' => 'd', 'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e', 'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e', 'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i', 'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o', 'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o', 'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o', 'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u', 'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u', 'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y'
        );

        // Make custom replacements
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

        // Transliterate characters to ASCII
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }

        // Replace non-alphanumeric characters with our delimiter
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

        // Remove duplicate delimiters
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

        // Truncate slug to max. characters
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

        // Remove delimiter from ends
        $str = trim($str, $options['delimiter']);

        return $str;
    }

    public static function getDatatables($request){
        $user = static::query();

        return DataTables::of($user)
            ->filter(function ($query) use ($request) {
            })
            ->editColumn('status', function ($user) {
                return true ? '<i class="fa fa-check-circle text-primary"></i>' : '<i class="fa fa-times-circle text-default"></i>';
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
            ->rawColumns(['status', 'action'])
            ->make(true);
    }


    protected function getActionColumnPermissions()
    {
        return [
            'user.edit' => '<a class="get-form table-action-btn" href="javascript:void(0)" class="get-form" data-href="' . route('role.edit', $this->id) . '"><i class="fa fa-pencil-alt text-primary font-size-18"></i></a>&nbsp;&nbsp;',
//            'user.delete' => '<a class="get-form table-action-btn" href="javascript:void(0)" class="get-form" data-href="' . route('user.delete', $this->id) . '"><i class="fa fa-trash-alt text-danger font-size-18"></i></a>&nbsp;&nbsp;'
        ];
    }

    public static function roleList(){
        $result = self::query()->pluck('name', 'id')->toArray();
        if($result){
            return $result;
        }
        return [];
    }
}
