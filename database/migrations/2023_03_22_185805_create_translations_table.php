<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('model_id');
            $table->string('model_type');
            $table->enum('locale', ['en', 'ar']);
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('address')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('certificates')->nullable();
            $table->string('type')->nullable();
            $table->string('full_name')->nullable();
            $table->string('job')->nullable();
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
        Schema::dropIfExists('translations');
    }
}
