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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('nameOfVisitor')->nullable();
            $table->string('contactNumber')->nullable();
            $table->string('gender')->nullable();
            $table->date('dateOfVisit')->nullable();
            $table->string('purposeOfVisit')->nullable();
            $table->string('nameToVisit')->nullable();
            $table->string('roomToVisit')->nullable();
            $table->string('vaccinedose')->nullable();
            $table->string('vaccine')->nullable();
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
        Schema::dropIfExists('visitors');
    }
};
