<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    // 指定表名
    protected $table = "menu";
    
    //字段
    protected $fillable = [
    	"pid", "name", "mode", "url", "class", "sort", "status"
    ];

    //分页
    protected static $pagesize = 15;

    /**
     * [getMenuList ]
     * @Author   Jack                     964114968@qq.com
     * @DateTime 2017-05-09T14:52:44+0800
     * @param    [type]                   $where           [description]
     * @param    [type]                   $isPage          [description]
     * @return   [type]                                    [description]
     */
    public static function getMenuList($where, $isPage = false){
        if(!$where && $isPage == true){
            $rest = self::orderBy('sort', 'asc')->orderBy('id', 'asc')->Paginate(self::$pagesize);
            $data = $rest->toArray();
            $datas = get_left_menu($data["data"], 'id', 'pid', '─', 0, 0, 0);
            $data['data'] = $datas;
        }else{
            $rest = self::where($where)->orderBy('sort', 'asc')->orderBy('id', 'asc')->get();
            $data = get_left_menu($rest->toArray(), 'id', 'pid', '─', 0, 0, 0);
        }
        return $data;
    }
}	
