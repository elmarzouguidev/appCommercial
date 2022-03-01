<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {

            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('code')->unique()->nullable();

            $table->string('name')->unique();
            $table->string('website')->unique()->nullable();
            $table->string('logo')->nullable();
            $table->longText('description')->nullable();
            $table->string('city')->default('casablanca');
            $table->longText('addresse');

            $table->string('telephone')->nullable()->unique();
            $table->string('email')->nullable()->unique();

            $table->string('rc')->unique()->nullable();
            $table->string('ice')->unique();
            $table->string('cnss')->unique()->nullable();
            $table->string('patente')->unique()->nullable();
            $table->string('if')->unique()->nullable();

            $table->string('prefix_invoice')->default('FACTURE-');
            $table->bigInteger('invoice_start_number')->default(1);

            $table->string('prefix_invoice_avoir')->default('FCT-AVOIR-');
            $table->bigInteger('invoice_avoir_start_number')->default(1);

            $table->string('prefix_estimate')->default('DEVIS-');
            $table->bigInteger('estimate_start_number')->default(1);

            $table->string('prefix_bcommand')->default('DEVIS-');
            $table->bigInteger('bcommand_start_number')->default(1);

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
        Schema::dropIfExists('companies');
    }
}
