<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceblocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon', 50)->nullable();
            $table->string('title', 50)->nullable();
            $table->decimal('price')->nullable();
            $table->string('price_subheading', 100)->nullable();
            $table->text('description')->nullable();
            $table->string('button_url', 255)->nullable();
            $table->unsignedTinyInteger('f_highlight')->default(0);
            $table->unsignedTinyInteger('f_active')->default(0);
            $table->string('uuid', 36)->nullable();
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
        Schema::dropIfExists('service_blocks');
    }
}
