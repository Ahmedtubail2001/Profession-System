<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->dateTime('time_first');
            $table->text('notes');
            $table->dateTime('time_function');
            $table->string('additional_file', 90);
            $table->integer('value');
            $table->string('funds', 45);
            $table->integer('city_id');
            $table->tinyInteger('accept');
            $table->foreign('customer_id')->on('customers')->references('id')->onDelete('cascade');
            $table->foreign('worker_id')->on('workers')->references('id')->onDelete('cascade');
            $table->timestamps();
            // $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};