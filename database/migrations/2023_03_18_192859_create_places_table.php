<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            $table->foreignId('sub_category_id');
            $table->foreignId('district_id');
            // $table->text('description');
            $table->string('geolocation');
            // $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('url')->nullable();
            $table->decimal('cost', 8, 0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
