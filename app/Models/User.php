<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model
{
	// add this trait to your user model
	use EntrustUserTrait;

    //指定表名
    protected $table = 'user';
}
