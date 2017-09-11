<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('name2')->nullable();
            $table->string('last-name');
            $table->string('second-last-name')->nullable();
            $table->string('gender',1);
            $table->date('birthdate');
            $table->string('title', 5)->nullable();
            $table->string('curp')->nullable();
            $table->string('marital-status');
            $table->string('profession');
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->softdeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
