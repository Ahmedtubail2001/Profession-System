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
        Schema::table('abouts', function (Blueprint $table) {
            //
            $table->string('name_en', 190);
            $table->string('title_en', 190);
            $table->text('description_en');
            $table->renameColumn('name', 'name_ar');
            $table->renameColumn('title', 'title_ar');
            $table->renameColumn('description', 'description_ar');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('abouts', function (Blueprint $table) {
            //
            $table->dropColumn('name_en');
            $table->dropColumn('title_en');
            $table->dropColumn('description_en');
            $table->renameColum('name_ar', 'name');
            $table->renameColumn('title_ar', 'title');
            $table->renameColumn('description_ar', 'description');
        });
    }
};
