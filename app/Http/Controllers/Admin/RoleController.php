<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\Role;

use App\Models\Permission;

class roleController extends Controller
{
	public function index(){
		$data = Role::get();
		return view('admin.role.index', compact('data'));
	}

	// public function store(Requests\RoleRequests $request){
	// 	dd(11);
	// }

	

	public function create(){
		return view('admin.role.create');
	}

	public function auth( $id ){
		$find = Role::find($id); 
		$data = Permission::getPermissionAuth();		
		return view('admin.role.auth', compact('data', 'find'));
	}

	public function update(Requests\RoleRequests $request, $id){
		$data = $request->all();
		switch ($id) {
			case 'create':
				if(Role::create($data)){
					return response()->json([
						'status' => 200,
						'msg' => '角色创建成功',
						'url' => $data['return_url']
					]);
				}	
				return response()->json([
					'status' => 403,
					'msg' => '角色创建失败'
				]);
			break;
			
			default:
				# code...
				break;
		}
	}
	
}
?>