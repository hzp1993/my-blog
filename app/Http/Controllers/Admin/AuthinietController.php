<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Models\User;

class AuthinietController extends Controller{
	/**
	 * [login 验证登录]
	 * @Author   Jack         964114968@qq.com
	 * @DateTime {{Datetime}}
	 * @return   [type]       [description]
	 */
	public function login(){
		return view('admin.authiniet.login');
	}

	/**
	 * [do_login 提交登录]
	 * @Author   Jack                     964114968@qq.com
	 * @DateTime 2017-04-25T14:11:24+0800
	 * @param    Requests\LoginRequests   $request         [description]
	 * @return   [type]                                    [description]
	 */
	public function do_login(Requests\LoginRequests $request){
		if($request->isMethod('post')){
			
			$post = $request->all();
			$user = User::where(['username' => $post['username']])->first();
			if($user){
				if(encrypt_password($post['password'], $user['password_salt']) == $user['password']){
					//检测是否被锁住
					if(!$user['is_lock']){
						return response()->json([
							'status' => 403,
							'msg' => '此用户已经被锁住，请联系管理员!',
						]);
					}
					$data['last_ip'] = $request->getClientIp();
					$data['login_count'] = $user->login_count + 1;
					$result = User::where('user_id', $user->user_id)->update($data);
					if($result){
						session(['user' => $user]);
                        return response()->json([
                            'status'	=>	200,
                            'msg'		=>	'登录成功!等在跳转...',
                            'url'       =>  url('/admin')
                        ]);
					}else{
						return response()->json([
	                        'status'	=>	403,
	                        'msg'		=>	'登录失败!请重新登录...',
	                    ]);
					}
				}else{
					return response()->json([
						'status' => 403,
						'msg' => '用户密码错误!',
					]);
				}
			}else{
				return response()->json([
					'status' => 403,
					'msg' => '用户名输入错误!',
				]);
			}
		}else{
			return response()->json([
				'status' => 403,
				'msg' => '非法操作!请友好的使用',
			]);
		}
	}
}
?>