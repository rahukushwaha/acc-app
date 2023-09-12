<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_sales', function (Blueprint $table) {
            $table->id();
            $table->integer('intPartyDtlsId')->nullable()->comment('Bill To - tbl_party_dtls id');
            $table->string('varPartyName')->nullable()->comment('Customer Name');
            $table->string('varMobileNo', 10)->nullable()->comment('Customer Mobile No');
            $table->string('varBillingAddress')->nullable()->comment('Customer Billing Address');
            $table->integer('intSupplyPlaceStateMstrsId')->nullable()->comment('Customer Place of Supply State Id');
            $table->string('varSupplyPlaceStateName', 10)->nullable()->comment('Customer Place of Supply State Name');
            $table->string('varGstin', 10)->nullable()->comment('Customer GSTIN No');
            $table->string('varInvoiceNo')->nullable();
            $table->date('dtInvoiceDate')->nullable();
            $table->tinyInteger('intPaymentTerms')->nullable()->comment('Payment Terms in days');
            $table->date('dtDueDate')->nullable();
            $table->decimal('decSubTotalDiscount')->nullable();
            $table->decimal('decSubTotalTax')->nullable();
            $table->decimal('decSubTotalAmt')->nullable();
            $table->decimal('decTaxableAmt')->nullable();
            $table->decimal('intSGSTPer', $precision = 10, $scale = 2)->nullable();
            $table->decimal('decSGSTAmt', $precision = 10, $scale = 2)->nullable();
            $table->decimal('intCGSTPer', $precision = 10, $scale = 2)->nullable();
            $table->decimal('decCGSTAmt', $precision = 10, $scale = 2)->nullable();
            $table->decimal('intIGSTPer', $precision = 10, $scale = 2)->nullable();
            $table->decimal('decIGSTAmt', $precision = 10, $scale = 2)->nullable();
            $table->decimal('decAdditionalChargesAmt')->nullable();
            $table->decimal('decExtraDiscountAmt')->nullable();
            $table->tinyInteger('intIsRoundOff')->nullable();
            $table->decimal('decRoundOffAmt')->nullable();
            $table->decimal('decTotalAmt')->nullable();
            $table->decimal('decReceiveAmt')->nullable();
            $table->decimal('decBalanceAmt')->nullable();
            $table->decimal('decPreviousPartyBalanceAmt')->nullable();
            $table->string('varNotes')->nullable();
            $table->text('varTermsNCondition')->nullable();
            $table->boolean('bitDeletedFlag')->default(0)->comment('0 = active, 1 = deactive');
            $table->integer('intCreatedby')->nullable();
            $table->integer('intUpdatedby')->nullable();
            $table->timestamps();

            // index
            $table->index(['varInvoiceNo']);
            $table->index(['dtInvoiceDate']);
            $table->index(['dtDueDate']);
            $table->index(['intPartyDtlsId']);
            $table->index(['intSupplyPlaceStateMstrsId']);
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
