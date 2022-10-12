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
        Schema::table('users', function (Blueprint $table) {
            $table->string('usertype')->nullable();
            $table->string('suffix')->nullable();
            $table->string('civilStatus')->nullable();
            $table->string('gender')->nullable();
            $table->string('birthDate')->nullable();
            $table->string('contactNumber')->nullable();
            $table->string('province')->nullable();
            $table->string('city')->nullable();
            $table->string('barangay')->nullable();
            $table->string('unit')->nullable();
            $table->string('floor')->nullable();
            $table->string('buildingName')->nullable();
            $table->string('houseNo')->nullable();
            $table->string('streetName')->nullable();
            $table->string('district')->nullable();
            $table->string('vaccine')->nullable();
            $table->string('name')->nullable();
            $table->string('address')->nullable();
            $table->date('dateOfVisit')->nullable();
            $table->string('purposeOfVisit')->nullable();
            $table->string('nameToVisit')->nullable();
            $table->string('roomToVisit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
