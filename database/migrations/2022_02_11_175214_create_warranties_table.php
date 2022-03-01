<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWarrantiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warranties', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('ticket_id')->index()->constrained();
            $table->dateTime('start_at');
            $table->dateTime('end_at');
            $table->longText('description')->nullable();
            $table->boolean('active')->default(true);
            $table->boolean('notify_admin')->default(true);
            $table->boolean('notify_client')->default(false);
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
        Schema::dropIfExists('warranties');
    }
}
