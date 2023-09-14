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
        Schema::create('tbl_purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('intSupplierDtlsId')->nullable()->comment('Bill From - tbl_supplier_dtls id');
            $table->string('varSupplierName')->nullable()->comment('Customer Name');
            $table->string('varMobileNo', 10)->nullable()->comment('Customer Mobile No');
            $table->string('varBillingAddress')->nullable()->comment('Customer Billing Address');
            $table->integer('intSupplyPlaceStateMstrsId')->nullable()->comment('Customer Place of Supply State Id');
            $table->string('varSupplyPlaceStateName', 10)->nullable()->comment('Customer Place of Supply State Name');
            $table->string('varGstin', 10)->nullable()->comment('Customer GSTIN No');
            $table->string('varInvoiceNo')->nullable();
            $table->date('dtInvoiceDate')->nullable();
            $table->tinyInteger('intPaymentTerms')->nullable()->comment('Payment Terms in days');
            $table->date('dtDueDate')->nullable();
            $table->decimal('decSubTotalDiscount', $precision = 10, $scale = 2)->default(0);
            $table->decimal('decSubTotalTax', $precision = 10, $scale = 2)->default(0);
            $table->decimal('decSubTotalAmt', $precision = 10, $scale = 2)->default(0);
            $table->decimal('decTaxableAmt', $precision = 10, $scale = 2)->default(0);
            $table->decimal('intSGSTPer', $precision = 10, $scale = 2)->default(0);
            $table->decimal('decSGSTAmt', $precision = 10, $scale = 2)->default(0);
            $table->decimal('intCGSTPer', $precision = 10, $scale = 2)->default(0);
            $table->decimal('decCGSTAmt', $precision = 10, $scale = 2)->default(0);
            $table->decimal('intIGSTPer', $precision = 10, $scale = 2)->default(0);
            $table->decimal('decIGSTAmt', $precision = 10, $scale = 2)->default(0);
            $table->decimal('decAdditionalChargesAmt', $precision = 10, $scale = 2)->default(0);
            $table->decimal('decExtraDiscountAmt', $precision = 10, $scale = 2)->default(0);
            $table->tinyInteger('intIsRoundOff')->nullable()->default(0)->comment('1 = amount is round off, 0 not round off');;
            $table->decimal('decRoundOffAmt', $precision = 10, $scale = 2)->default(0);
            $table->decimal('decTotalAmt', $precision = 10, $scale = 2)->default(0);
            $table->decimal('decReceiveAmt', $precision = 10, $scale = 2)->default(0);
            $table->decimal('decBalanceAmt', $precision = 10, $scale = 2)->default(0);
            $table->decimal('decPreviousSupplierBalanceAmt', $precision = 10, $scale = 2)->default(0);
            $table->tinyInteger('isSupplierFullPaid')->default(0)->comment('0 = not full paid, 1 = Supplier is full paid the bill amount');
            $table->string('varNotes')->nullable();
            $table->text('varTermsNCondition')->nullable();
            $table->string('varBillReceiptNo')->nullable();
            $table->string('varBillRecceiptFilePath')->nullable();
            $table->boolean('bitDeletedFlag')->default(0)->comment('0 = active, 1 = deactive');
            $table->integer('intCreatedby')->nullable();
            $table->integer('intUpdatedby')->nullable();
            $table->timestamps();

            // index
            $table->index(['varInvoiceNo']);
            $table->index(['dtInvoiceDate']);
            $table->index(['dtDueDate']);
            $table->index(['intSupplierDtlsId']);
            $table->index(['intSupplyPlaceStateMstrsId']);
            $table->index(['varBillReceiptNo']);
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
