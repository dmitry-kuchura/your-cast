<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_billings', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');

            $table->dateTime('billing_from');
            $table->dateTime('billing_to');
            $table->decimal('amount');
            $table->enum('status', ['success', 'fail', 'in-work'])->default('in-work');

            $table->foreign('user_id')->references('id')->on('users');

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
        Schema::dropIfExists('users_billings');
    }
}
