<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_state_mstrs', function (Blueprint $table) {
            $table->id();
            $table->string('varStateName');
            $table->string('varStateCode')->nullable();
            $table->boolean('bitDeletedFlag')->default(0)->comment('0 = active, 1 = deactive');
            $table->timestamps();

            //index
            $table->index('varStateName');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
