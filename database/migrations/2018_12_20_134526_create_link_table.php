<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinkTable extends Migration
{
    /**
     * Run the migrations.
     *运行迁移
     * @return void
     */
    public function up()
    {
        Schema::create('link', function (Blueprint $table) {
            $table->engine = 'MyISAM';
            $table->increments('link_id');
            $table->string('link_name')->default('')->comment('//名称');
            $table->string('link_url')->default('')->comment('//url地址');
            $table->string('link_discription')->default('')->comment('//描述');
            $table->integer('link_order')->default(0)->comment('//排序');
        });
    }

    /**
     * Reverse the migrations.
     *撤销迁移
     * @return void
     */
    public function down()
    {
        Schema::drop('link');
    }
}
