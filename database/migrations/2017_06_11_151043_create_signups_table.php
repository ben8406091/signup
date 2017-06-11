<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('action_id')
                ->unsigned();
            $table->foreign('action_id')
                ->references('id')
                ->on('actions')
                ->onDelete('cascade');
            $table->string('name');
            $table->enum('sex', ['先生', '女士']);
            $table->string('tel');
            $table->string('email');
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
        Schema::dropIfExists('signups');
    }
}
