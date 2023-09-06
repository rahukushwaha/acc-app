<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_menus', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('menu_type')->comment('0 = direct link, 1= menu name, 2 = menu link, 3 = sub menu name, 4 = sub menu link');
            $table->string('menu_name');
            $table->string('menu_url');
            $table->mediumText('menu_icon')->nullable();
            $table->integer('parent_menu_id')->nullable();
            $table->integer('_order')->nullable();
            $table->tinyInteger('status')->comment('1 = active, 2 = deactive');
            $table->timestamps();

            //index
            $table->index('parent_menu_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_menus');
    }
};
