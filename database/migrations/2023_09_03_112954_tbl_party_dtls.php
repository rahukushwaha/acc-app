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
        Schema::create('tbl_party_dtls', function (Blueprint $table) {
            $table->id();
            $table->string('varPartyName')->nullable();
            $table->string('varMobileNo')->nullable();
            $table->string('varBillingAddress')->nullable();
            $table->string('varShippingAddress')->nullable();
            $table->integer('intSupplyPlaceStateMstrsId')->nullable();
            $table->integer('intGstin')->nullable();
            $table->boolean('bitDeletedFlag')->default(0)->comment('0 = active, 1 = deactive');
            $table->integer('intCreatedby')->nullable();
            $table->integer('intUpdatedby')->nullable();
            $table->timestamps();

            //index
            $table->index('varPartyName');
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
