<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\Models\Menu;

class MenuController extends Controller{
    public function index(){
        $data = Menu::getMenuList(false, true);
    	return view("admin.menu.list", compact("data"));
    }

    public function create(){
        $where = ['status' => '1'];
        $data = Menu::getMenuList($where);
    	return view("admin.menu.create", compact("data"));
    }


    public function update(Requests\MenuRequests $request, $id){
    	$data = $request->all();
    	switch ($id) {
    		case "create":
    			if(Menu::create($data)){
    				return response()->json([
    					"status" => 200,
    					"msg" => "菜单创建成功!",
    					"url" => $data["return_url"]
    				]);
    			}
    			return response()->json([
    				"status" => 403,
    				"msg" => "菜单创建失败!"
    			]);
    		break;
    		case "edit":

    		break;
    	}
    }
}
