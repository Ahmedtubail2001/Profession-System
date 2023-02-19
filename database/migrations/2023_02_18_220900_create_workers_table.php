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
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('professional_experience', 45);
            $table->string('cover_image', 45);
            $table->integer('id_number');
            $table->string('address', 45);
            $table->integer('experience-year', 45);
            $table->string('password', 45);
            $table->foreign('user_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('profession_id')->on('professions')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('workers');
    }
};