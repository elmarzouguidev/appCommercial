<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {

            $table->id();
            $table->uuid('uuid')->unique()->nullable();
            $table->string('code')->unique()->nullable();

            $table->longText('content');

            $table->foreignId('ticket_id')
            ->index()
            ->constrained()
            ->cascadeOnDelete();

            $table->foreignId('user_id')
            ->index()
            ->constrained();
            //->cascadeOnDelete();
            
            $table->boolean('active')->default(true);

            $table->enum('type', ['diagnostique', 'reparation'])->default('diagnostique');

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
        Schema::dropIfExists('reports');
    }
}
