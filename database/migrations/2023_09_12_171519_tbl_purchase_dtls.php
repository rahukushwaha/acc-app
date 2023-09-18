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
        Schema::create('tbl_purchase_dtls', function (Blueprint $table) {
            $table->id();
            $table->string('varItemType')->nullable();
            $table->string('varBarcode')->nullable();
            $table->integer('intPurchasesId')->nullable();
            $table->integer('intItemMstrsId')->default(0);
            $table->integer('intSubItemMstrsId')->default(0);
            $table->string('varProductSerialNo')->nullable();
            $table->string('varSAC')->nullable();
            $table->tinyInteger('intQty')->default(0);
            $table->decimal('decSalesPrice', 10, 2)->default(0);
            $table->decimal('decDiscountPer', 10, 2)->default(0);
            $table->decimal('decDiscountAmt', 10, 2)->default(0);
            $table->decimal('decTaxAmt', 10, 2)->default(0);
            $table->tinyInteger('intGstPer')->nullable();
            $table->decimal('decAmount', 10, 2)->default(0);
            $table->boolean('bitDeletedFlag')->default(0)->comment('0 = active, 1 = deactive');
            $table->integer('intCreatedby')->nullable();
            $table->integer('intUpdatedby')->nullable();
            $table->timestamps();

            // index
            $table->index(['varBarcode']);
            $table->index(['intPurchasesId']);
            $table->index(['intItemMstrsId']);
            $table->index(['intSubItemMstrsId']);
            $table->index(['varProductSerialNo']);
            $table->index(['bitDeletedFlag']);
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
