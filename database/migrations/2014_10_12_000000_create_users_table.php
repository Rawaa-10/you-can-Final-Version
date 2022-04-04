<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user-id');
            $table->string('f-name');
            $table->string('l-name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('picture')->nullable();
            $table->string('phone')->unique();
            $table->text('education')->nullable();
            $table->boolean('account-stat');
            $table->date('birth-date');
            $table->text('address');
            $table->integer('serial-number' )->unique();
            $table->boolean('email-val');


            $table->bigInteger('comp_id')->nullable()->references('comp_id')
                ->on('companies')->onDelete('cascade')->onUpdate('cascade')->index()->unsigned();
            $table->bigInteger('act_id')->nullable()->references('act_id')
                ->on('type-accounts')->onDelete('cascade')->onUpdate('cascade')
                ->index()->unsigned();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
