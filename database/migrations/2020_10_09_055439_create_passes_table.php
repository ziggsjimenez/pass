<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('passes', function (Blueprint $table) {
            $table->id();
            $table->text('firstname');
            $table->text('middlename');
            $table->text('lastname');
            $table->text('fulladdress');
            $table->text('cellphone');
            $table->integer('age');
            $table->text('sex');
            $table->text('code');
            $table->tinyInteger('printpass')->default(0);
            $table->integer('user_id');
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
        Schema::dropIfExists('passes');
    }
}
