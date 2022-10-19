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
        Schema::create('expected_visitor', function (Blueprint $table) {
            $table->id();
            $table->string('nameOfOwner')->nullable();
            $table->string('nameOfVisitor')->nullable();
            $table->date('dateOfVisit')->nullable();
            $table->string('purposeOfVisit')->nullable();
            $table->string('roomToVisit')->nullable();
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
        Schema::dropIfExists('expected_visitor');
    }
};
