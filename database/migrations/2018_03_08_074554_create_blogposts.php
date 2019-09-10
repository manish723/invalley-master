<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogposts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->nullable();
            $table->string('slug_month', 2)->nullable();
            $table->string('slug_year', 4)->nullable();
            $table->string('slug', 100)->nullable();
            $table->string('meta_description', 255)->nullable();
            $table->string('post_image', 100)->nullable();
            $table->unsignedInteger('author_id')->default(0);
            $table->string('uuid', 36);
            $table->unsignedTinyInteger('f_published')->default(0);
            $table->timestamp('published_at')->nullable();
            $table->timestamp('post_date_at')->nullable();
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
        Schema::dropIfExists('blog_posts');
    }
}
