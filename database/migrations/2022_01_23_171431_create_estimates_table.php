<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {

            $table->id();
            $table->uuid('uuid')->unique();

            $table->string('code')->unique();
            $table->string('full_number')->unique();

            $table->float('price_ht')->default(0);
            $table->float('price_total')->default(0);
            $table->float('price_tva')->default(0);

            $table->integer('status')->default(\App\Constants\Response::DEVIS_EN_ATTENTE);

            $table->date('estimate_date')->nullable();
            $table->date('due_date')->nullable();

            $table->foreignId('invoice_id')->index()->nullable();
            $table->foreignId('client_id')->index()->nullable();

            $table->boolean('active')->default(true);
            $table->boolean('is_invoiced')->default(false);
            $table->boolean('is_send')->default(false);

            $table->longText('admin_notes')->nullable();

            $table->longText('condition_general')->nullable();

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
        Schema::dropIfExists('estimates');
    }
}
