<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSafeLocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('safe_locks', function (Blueprint $table) {
            $table->id();
            $table->text('savings')->nullable();
            $table->text('total_saved')->nullable();
            $table->text('per')->nullable();
            $table->text('account_number')->nullable();
            $table->text('expire_at')->nullable();
            $table->text('closed')->nullable();
            $table->text('user_id')->nullable();
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
        Schema::dropIfExists('safe_locks');
    }
}
