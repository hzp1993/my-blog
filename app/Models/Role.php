<?php 

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
	// 指定表名
	protected $table = 'role';

	// 指定字段
	protected $fillable = [
		'name', 'display_name'
	];

}