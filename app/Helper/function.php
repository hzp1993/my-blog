<?php
/**
 * 公共助手库
 * 助手函数库
 */

// 静态资源常量
define('__STATIC__', 'static/');
define('__CORE__' , __STATIC__ . 'core/');
define('__CSS__' , __CORE__ . 'css/');
define('__IMG__' , __CORE__ . 'img/');
define('__JS__' , __CORE__ . 'js/');
define('__ADMIN__' , __STATIC__ . 'admin/');
define('__HOME__' , __STATIC__ . 'home/');

if(!function_exists('encrypt_password')){
	/**
	 * [encrypt_password 用户组合加密]
	 * @Author   Jack                     964114968@qq.com
	 * @DateTime 2017-04-25T15:43:39+0800
	 * @param    [type]    $password   		[用户密码]
	 * @param    [type]    $password_salt   [密码加密]
	 * @return   [type]    [description]
	 */
	function encrypt_password($password, $password_salt){
		return md5(md5($password).md5($password_salt));
	}
}

if(!function_exists('get_api_json')){
	/**
	 * [get_api_json 返回JSON API信息格式数据]
	 * @Author   Jack                     964114968@qq.com
	 * @DateTime 2017-04-25T15:49:58+0800
	 * @param    array    $array   [description]
	 * @param    string   $format  [description]
	 * @return   [格式必须包含： code , msg 参数数据 ; result , url , time 参数是执行时间，可选]
	 */
	function get_api_json(array $array, $format = 'array'){
		$data['status'] = $array['status'];
	    $data['msg'] = $array['msg'];
	    $data['result'] = !isset($array['result']) ? '' : $array['result'];
	    $data['url'] = !isset($array['url']) ? '' : $array['url'];
	    $data['handleTime'] = !isset($array['time']) ? '' : $array['time'];
	    $data['returnTime'] = date('Y-m-d H:i:s' , time());
	    if($format == 'array') {
	        return $data;
	    }
	    return json_encode($data);
	}
}

if(!function_exists('get_left_menu')){

	function get_left_menu($data, $id_field = 'id', $pid_field = 'pid', $lefthtml = '─', $pid = 0, $level = 0, $pleft = 0){
			$arr = [];
			foreach($data as $key => $val){
				if($val[$pid_field] == $pid){
					$val['level'] = $level + 1;
					$val['left'] = $pleft;
					$val['lefthtml']='├'.str_repeat($lefthtml,$level);
					$arr[] = $val;
					$arr = array_merge($arr, get_left_menu($data, $id_field, $pid_field, $lefthtml, $val[$id_field], $level+1, $pleft+20));
 				}
			}
			return $arr;
	}
}

if(!function_exists('isDoubleArray')){
	function isDoubleArray($array){
		if(is_array($array)){
			foreach ($array as $v) {
				if (is_array($v)) {
					return true;
					break;
				}
			}
			return false;
		}
		return false;
	}
}
?>