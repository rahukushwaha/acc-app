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
        Schema::create('tbl_company_dtls', function (Blueprint $table) {
            $table->id();
            $table->string('varCompanyname', 100)->nullable();
            $table->string('varMobileNo', 10)->nullable();
            $table->string('varLogoPath', 150)->nullable();
            $table->string('varSignPath', 150)->nullable();
            $table->text('varAdress')->nullable();
            $table->integer('intCompanyStateMstrsId')->nullable();
            $table->boolean('bitDeletedFlag')->default(0)->comment('0 = active, 1 = deactive');
            $table->integer('intCreatedby')->nullable();
            $table->integer('intUpdatedby')->nullable();
            $table->timestamps();
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
