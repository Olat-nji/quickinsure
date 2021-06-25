<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_insurances', function (Blueprint $table) {
            $table->id();
            $table->text('name_of_doctor')->nullable();
            $table->text('name_of_patient')->nullable();
            $table->text('sickness_diagnosis')->nullable();
            $table->text('treatment')->nullable();
            $table->foreignId('user_id')->nullable();
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
        Schema::dropIfExists('medical_insurances');
    }
}
