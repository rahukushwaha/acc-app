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
        Schema::create('tbl_sale_dtls', function (Blueprint $table) {
            $table->id();
            $table->string('varItemType')->nullable();
            $table->integer('intSalesId')->nullable();
            $table->integer('intItemMstrsId')->nullable();
            $table->integer('intSubItemMstrsId')->nullable();
            $table->string('varDesc')->nullable();
            $table->string('varSAC')->nullable();
            $table->tinyInteger('intQty')->nullable();
            $table->decimal('decSalesPrice', 10, 2)->nullable();
            $table->decimal('decDiscountPer', 10, 2)->nullable();
            $table->decimal('decDiscountAmt', 10, 2)->nullable();
            $table->decimal('decTaxAmt', 10, 2)->nullable();
            $table->tinyInteger('intGstPer')->nullable();
            $table->decimal('decAmount', 10, 2)->nullable();
            $table->boolean('bitDeletedFlag')->default(0)->comment('0 = active, 1 = deactive');
            $table->integer('intCreatedby')->nullable();
            $table->integer('intUpdatedby')->nullable();
            $table->timestamps();

            // index
            $table->index(['intSalesId']);
            $table->index(['intItemMstrsId']);
            $table->index(['intSubItemMstrsId']);
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
