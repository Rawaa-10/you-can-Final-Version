<?php
declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateAdvsTable
 */
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
            $table->id();
            $table->text('location')->nullable();
            $table->integer('working_hour')->nullable();
            $table->dateTime('s-date')->nullable();
            $table->dateTime('e-date')->nullable();
            $table->double('cost')->nullable();
            $table->string('picture')->nullable();
            $table->text('explaining');

            $table->bigInteger('advservice_id')->references('id')
                ->on('advservices')->onDelete('cascade')->onUpdate('cascade')
                ->index()->unsigned();
            $table->bigInteger('user_id')->nullable()->references('id')
                ->on('users')->onDelete('cascade')->onUpdate('cascade')
             ->index()->unsigned();
            $table->bigInteger('category_id')->references('id')
                ->on('categories')->onDelete('cascade')->onUpdate('cascade')
                ->index()->unsigned();
            $table->softDeletes();
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
