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
        Schema::create('news', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('title'); // News title
            $table->text('content'); // News content
            $table->string('image')->nullable(); // Optional image path
            $table->string('author'); // Author of the news
            $table->boolean('is_published')->default(false); // Publication status
            $table->string('youtube_link')->nullable(); // Optional YouTube link
            $table->string('instagram_link')->nullable(); // Optional Instagram link
            $table->string('tiktok_link')->nullable(); // Optional TikTok link
            $table->unsignedBigInteger('branch_id')->nullable(); // Branch relationship
            $table->unsignedBigInteger('views')->default(0); // View count
            $table->timestamps(); // Created and updated timestamps

            // Foreign key constraint
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
};
