<?php
Route::group(['prefix'	=>	'admin'], function(){
	Route::get('login', 'AuthinietController@login');
	Route::post('do_login', 'AuthinietController@do_login');
	Route::group(['middleware' => 'authadmin'] , function(){

		Route::get('', 'IndexController@index');

		Route::resource('user', 'UserController');	

		Route::resource('menu', 'MenuController');

		Route::resource('role', 'RoleController');

		Route::get('role/{id}/auth', 'RoleController@auth');

		Route::resource('permission', 'PermissionController');

		Route::get('permission/{id}/edit', 'PermissionController@edit');
		

		
	
	});
	
});
?>