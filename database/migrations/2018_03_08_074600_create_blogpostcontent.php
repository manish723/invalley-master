<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogpostcontent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_content', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('post_id')->default(0);
            $table->longText('content')->nullable();
            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('blog_posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_post_content');
    }
}
