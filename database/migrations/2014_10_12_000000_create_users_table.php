<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateUsersTable
 */
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
            $table->string('password');
            $table->string('picture')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->text('education')->nullable();
            $table->date('birth-date')->nullable();
            $table->text('address')->nullable();
            $table->dateTime('email_verified_at')->nullable();


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
