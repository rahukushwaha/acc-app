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
            $table->string('varInvoiceNo')->nullable();
            $table->date('dtInvoiceDate')->nullable();
            $table->tinyInteger('intPaymentTerms')->nullable()->comment('Payment Terms in days');
            $table->date('dtDueDate')->nullable();
            $table->integer('intPartyDtlsId')->nullable()->comment('Bill To');
            $table->integer('intSupplyPlaceStateMstrsId')->nullable();
            $table->decimal('decSubTotalDiscount')->nullable();
            $table->decimal('decSubTotalTax')->nullable();
            $table->decimal('decSubTotalAmt')->nullable();
            $table->decimal('decTaxableAmt')->nullable();
            $table->tinyInteger('intSGSTPer')->nullable();
            $table->decimal('decSGSTAmt')->nullable();
            $table->tinyInteger('intCGSTPer')->nullable();
            $table->decimal('decCGSTAmt')->nullable();
            $table->tinyInteger('intIGSTPer')->nullable();
            $table->decimal('decIGSTAmt')->nullable();
            $table->decimal('decAdditionalChargesAmt')->nullable();
            $table->decimal('decDiscountAmt')->nullable();
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
