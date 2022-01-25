<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturerUnitPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturer_unit', function (Blueprint $table) {
            $table->unsignedBigInteger('lecturer_id')->index();
            $table->foreign('lecturer_id')->references('id')->on('users')->where('role_id', 3)->onDelete('cascade');
            $table->unsignedBigInteger('unit_id')->index();
            $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');
            $table->primary(['lecturer_id', 'unit_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturer_unit');
    }
}
