<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrderServiceBlocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_blocks', function (Blueprint $table) {
            $table->unsignedMediumInteger('block_order')->default(999)->after('button_url');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('{', function (Blueprint $table) {
            $table->dropColumn('block_order');
        });
    }
}
