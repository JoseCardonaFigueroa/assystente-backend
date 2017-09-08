<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street-name');
            $table->string('neighborhood');
            $table->string('external-number');
            $table->string('internal-number');

            $table->integer('person_id')
                  ->unsigned();
            $table->foreign('person_id')
                  ->references('id')
                  ->on('people')
                  ->onDelete('cascade');

            $table->timestamps();
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
        Schema::dropIfExists('addresses');;
    }
}
