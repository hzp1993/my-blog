<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Permission;

use App\Http\Requests;

use Illuminate\Http\Request;

class PermissionController extends Controller{

    public function index(){
        $data = Permission::getList();
        return view('admin.permission.index', compact('data'));
    }

	public function create(){
    	return view('admin.permission.create');
	}

    public function store(Requests\PermissionRequests $request){
        $data = $request->all();
        if(Permission::create($data)){
            return response()->json([
                "status" => 200,
                "msg" => trans('tips.permission.create.success'),
                "url" => $data["return_url"]
            ]);
        }
        return response()->json([
                "status" => 403,
                "msg" => trans('tips.permission.create.error')
        ]);
    }

    public function edit( $id ){
        $find = Permission::find($id);
        return view("admin.permission.edit", compact("find"));
    }
    
    public function update(Requests\PermissionRequests $request, $id){
        $data = $request->all();
        $permission = Permission::find($request->input('id'));
        $permission->fill($data);
        if($permission->save()){
            return response()->json([
                "status" => 200,
                "msg" => trans('tips.permission.edit.success'),
                "url" => $data["return_url"]
            ]);
        }
        return response()->json([
                "status" => 403,
                "msg" => trans('tips.permission.edit.error')
        ]);
    }	
}
?>