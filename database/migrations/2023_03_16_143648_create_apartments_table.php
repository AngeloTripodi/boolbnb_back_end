<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            //! TODO: nel seeder fare lo slug univoco con titolo + ID
            $table->string('title', 150);
            $table->text('description');
            $table->text('image');
            $table->float('latitude', 10, 8);
            $table->float('longitude', 11, 8);
            $table->string('address');
            $table->tinyInteger('n_rooms')->unsigned();
            $table->tinyInteger('n_beds')->unsigned();
            $table->tinyInteger('n_bathrooms')->unsigned();
            $table->smallInteger('square_meters')->unsigned();
            $table->boolean('is_visible');
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
        Schema::dropIfExists('apartments');
    }
};
