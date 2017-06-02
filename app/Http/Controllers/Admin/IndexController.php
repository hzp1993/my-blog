<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class IndexController extends Controller{
	public function index(Request $request){
		$gd = gd_info();
		$data["gd_version"] = $gd["GD Version"];
		$data["upload_max_size"] = get_cfg_var("upload_max_filesize") ? get_cfg_var("upload_max_filesize") : "不允许";
		$data["memory_limit"] = get_cfg_var("memory_limit") ? get_cfg_var("memory_limit") : "无";
		$data["max_execution_time"] = get_cfg_var("max_execution_time");
		$data["safe_mode"] = (boolean) ini_get('safe_mode') ? 'YES' : 'NO';
		$data["mysql_allow_persistent"] = @get_cfg_var("mysql.allow_persistent") ? "是" : "否";
		$data["mysql_max_links"] = @get_cfg_var("mysql.max_links") == -1 ? "不限" : @get_cfg_var("mysql.max_links");
		return view("admin.index.index", ["data" => $data]);
	}

	public function update(Request $request, $id){
		return view("admin.index.index");
	}
}
?>