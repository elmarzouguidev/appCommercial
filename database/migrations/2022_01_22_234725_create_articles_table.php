<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {

            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('code')->nullable();

            $table->bigInteger('articleable_id');
            $table->string('articleable_type');

            $table->longText('designation');
            $table->longText('description')->nullable();
            $table->bigInteger('quantity')->default(0);
            $table->float('prix_unitaire')->default(0);
            $table->float('montant_ht')->default(0);
            //$table->string('taxe')->default('20%');
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
        Schema::dropIfExists('articles');
    }
}
