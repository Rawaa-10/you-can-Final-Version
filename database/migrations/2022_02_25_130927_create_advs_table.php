<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advs', function (Blueprint $table) {
            $table->id('adv-id');
            $table->text('place');
            $table->integer('hours')->nullable();
            $table->dateTime('s-date')->nullable();
            $table->dateTime('e-date')->nullable();
            $table->string('category');
            $table->double('cost')->nullable();
            $table->string('picture');
            $table->text('explaining');

            $table->bigInteger('user_id')->nullable()->references('user_id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade')
             ->index()->unsigned();
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
        Schema::dropIfExists('advs');
    }
}
