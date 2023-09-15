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
        Schema::create('tbl_supplier_dtls', function (Blueprint $table) {
            $table->id();
            $table->string('varSupplierName')->nullable();
            $table->string('varMobileNo', 10)->nullable();
            $table->string('varBillingAddress')->nullable();
            $table->boolean('bitShippingAdrSame')->default(0)->comment('1 = Same, 0 = Not Same');
            $table->string('varShippingAddress')->nullable();
            $table->integer('intSupplyPlaceStateMstrsId')->nullable();
            $table->string('varGstin')->nullable();
            $table->boolean('bitDeletedFlag')->default(0)->comment('0 = active, 1 = deactive');
            $table->integer('intCreatedby')->nullable();
            $table->integer('intUpdatedby')->nullable();
            $table->timestamps();

            //index
            $table->index('varSupplierName');
            $table->index('varMobileNo');
            $table->index('intSupplyPlaceStateMstrsId');
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
