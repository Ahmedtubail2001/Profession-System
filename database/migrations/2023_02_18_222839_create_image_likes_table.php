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
        Schema::create('image_likes', function (Blueprint $table) {
            $table->id();
            $table->string('comment', 45);
            $table->tinyInteger('accepted');
            $table->foreign('image_id')->on('images')->references('id')->onDelete('cascade');
            $table->foreign('customer_id')->on('customers')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('image_likes');
    }
};