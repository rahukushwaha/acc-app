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
        Schema::create('tbl_menu_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('menu_id');
            $table->integer('role_id');
            $table->tinyInteger('status')->comment('1 = active, 2 = deactive');
            $table->timestamps();

            //index
            $table->index('menu_id');
            $table->index('role_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_menu_permissions');
    }
};
