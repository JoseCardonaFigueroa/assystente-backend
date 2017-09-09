<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->datetime('appointment-date');
            $table->string('observations');
            $table->string('phone');
            $table->SoftDeletes();

            $table->integer('person_id')
                  ->unsigned();
            $table->foreign('person_id')
                  ->references('id')
                  ->on('people')
                  ->onDelete('cascade');

            $table->integer('disease_id')
                  ->unsigned();
            $table->foreign('disease_id')
                  ->references('id')
                  ->on('diseases')
                  ->onDelete('cascade');

            $table->integer('address_id')
                  ->unsigned();
            $table->foreign('address_Id')
                  ->references('id')
                  ->on('addresses')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
