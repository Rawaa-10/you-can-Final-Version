<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermitRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permit_role', function (Blueprint $table) {

            $table->bigInteger('permit_id')->references('id')
                ->on('permits')->onDelete('cascade')->onUpdate('cascade')->index()->unsigned();

            $table->bigInteger('role_id')->references('id')
                ->on('roles')->onDelete('cascade')->onUpdate('cascade')->index()->unsigned();
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
        Schema::dropIfExists('permit_role');
    }
}
