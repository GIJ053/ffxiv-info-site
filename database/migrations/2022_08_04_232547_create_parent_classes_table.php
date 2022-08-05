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
        Schema::create('parent_classes', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('slug');
            $table->string('name');
            $table->string('abbreviation');
            $table->integer('role');
            $table->boolean('is_disciple_of_war');
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
        Schema::dropIfExists('parent_classes');
    }
};
