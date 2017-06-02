<?php 

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission{

    // 指定表名
    protected $table = "permission";
    
    //字段
    protected $fillable = [
        "name", "display_name", "class", "sort", "status"
    ];

	//分页
    protected static $pagesize = 15;

    public static function getList(){
        $rest = self::orderBy('sort', 'asc')->orderBy('id', 'asc')->Paginate(self::$pagesize);
        return $rest;
    }

    public static function getPermissionAuth(){
        $data = self::where(['status' => 1])->get();
        $array = [];
        if($data){
            foreach($data as $v){
                array_set($array, $v->name, ['id' => $v->id, 'display_name' => $v->display_name, 'description' => $v->description, 'key' => str_random(10)]);
            }
        }
        return $array;
    }
}