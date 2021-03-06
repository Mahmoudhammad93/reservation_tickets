<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('educational', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('faculty')->nullable();
            $table->string('from');
            $table->string('to');
            $table->string('type');
            $table->unsignedBigInteger('user_id');
            $table->string('university')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('educational');
    }
}
