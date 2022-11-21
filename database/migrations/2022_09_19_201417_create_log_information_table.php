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
        Schema::create('log_information', function (Blueprint $table) {
            $table->id();
            $table->integer('userid')->nullable();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('contactNumber')->nullable();
            $table->string('dateOfVisit')->nullable();
            $table->string('purposeOfVisit')->nullable();
            $table->string('nameToVisit')->nullable();
            $table->string('roomToVisit')->nullable();
            $table->string('usertype')->nullable();
            $table->string('vaxinfo')->nullable();
            $table->string('dayin')->nullable();
            $table->string('timein')->nullable();
            $table->string('timeout')->nullable();
            $table->string('frequenttimein')->nullable();
            $table->string('frequenttimeout')->nullable();
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
        Schema::dropIfExists('log_information');
    }
};
