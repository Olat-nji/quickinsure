<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLifeInsurancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('life_insurances', function (Blueprint $table) {
            $table->id();
            $table->text('next_of_kin')->nullable();
            $table->text('address_next_of_kin')->nullable();
            $table->text('bank_information')->nullable();
            $table->text('asset_worth')->nullable();
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
        Schema::dropIfExists('life_insurances');
    }
}
