<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {

            $table->id();
            $table->uuid('uuid');

            $table->dateTime('date_end');
            $table->string('mode');
            $table->string('info_client')->nullable();
            $table->longText('notes')->nullable();
            $table->boolean('approved')->default(false);

            $table->foreignId('user_id')->index()->constrained();
            $table->foreignId('ticket_id')->index()->constrained();
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
        Schema::dropIfExists('deliveries');
    }
}
