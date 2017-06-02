<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function( Blueprint $table){
            $table->engine = 'MyISAM';
            $table->bigIncrements('id');
            $table->integer('pid')->default(0)->comment('菜单父id');
            $table->string('name',30)->comment('菜单名称');
            $table->string('mode',30)->comment('模块名称');
            $table->string('url',100)->comment('URL链接地址');
            $table->string('class',30)->comment('类名');
            $table->tinyInteger('sort')->default(0)->comment('菜单排序'); 
            $table->tinyInteger('status')->default(0)->comment('菜单状态');           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menu');
    }
}
