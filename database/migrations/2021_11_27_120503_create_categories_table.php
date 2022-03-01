<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {

            $table->id();
            $table->uuid('uuid')->unique()->nullable();
            $table->string('code')->unique()->nullable();

            $table->string('name');
            $table->string('slug')->unique();
            $table->mediumText('description')->nullable();
            $table->string('logo')->nullable();

            $table->boolean('active')->default(true);
            $table->boolean('is_published')->default(true);

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
        Schema::dropIfExists('categories');
    }
}
