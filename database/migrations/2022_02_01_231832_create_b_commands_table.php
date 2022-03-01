<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('b_commands', function (Blueprint $table) {

            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('code')->unique();
            $table->string('full_number')->unique();

            $table->float('price_ht')->nullable();
            $table->float('price_total')->nullable();
            $table->float('price_tva')->nullable();
            $table->string('status')->default('approved');

            $table->date('date_command');
            $table->date('date_approved')->nullable();
            $table->date('date_due')->nullable();

            $table->foreignId('provider_id')->index()->nullable()->constrained();
 
            $table->mediumText('admin_notes')->nullable();

            $table->mediumText('condition_general')->nullable();

            $table->boolean('active')->default(true);

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('b_commands');
    }
}
