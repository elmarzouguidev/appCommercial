<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_invoice', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid')->nullable();

            $table->foreignId('invoice_id')
                ->index()
                ->constrained();

            $table->foreignId('ticket_id')
                ->index()
                ->constrained();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_invoice');
    }
}
