<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providers', function (Blueprint $table) {

            $table->id();
            $table->uuid('uuid')->unique()->nullable();
            $table->string('code')->unique();

            $table->string('entreprise');
            $table->string('contact', 50)->nullable();
            $table->string('telephone')->unique()->nullable();
            $table->string('email')->unique()->nullable();
            $table->longText('addresse');

            $table->string('rc')->unique()->nullable();
            $table->string('ice')->unique()->nullable();
            $table->string('logo')->nullable();
            
            $table->longText('description')->nullable();

            $table->boolean('active')->default(true);

            $table->foreignId('category_id')
                ->nullable()
                ->index()
                ->constrained();

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
        Schema::dropIfExists('providers');
    }
}
