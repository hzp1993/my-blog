<?php

use Illuminate\Database\Seeder;

use App\Models\User;

use App\Models\Role;

use App\Models\Permission;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$user = new User();
        //创建初始化的role(初始化的角色设定)
        $admin = Role::create([
        	'name' => 'admin',
        	'display_name' => '管理员',
        	'description' => 'super admin role',
        ]);

        //创建对应的初始权限
        $manage_user = Permission::create([
        	'name' => 'menu',
        	'display_name' => '菜单管理',
        	'description' => '',
        ]);

        //给角色授权赋予对应的权限
        $admin->attachPermission($manage_user);

        //给用户赋予相对应的角色
        $user->attachRole($admin);


    }
}
