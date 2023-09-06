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
        Schema::create('tbl_file_permissions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('url_name');
            $table->boolean('_view');
            $table->boolean('_add');
            $table->boolean('_update');
            $table->boolean('_delete');
            $table->tinyInteger('status')->comment('1 = active, 2 = deactive');
            $table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_file_permissions');
    }
};
