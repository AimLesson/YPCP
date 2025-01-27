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
        Schema::create('personalia', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Name of the personalia
            $table->string('title')->nullable(); // Title (nullable if not always required)
            $table->string('profile_picture')->nullable(); // Path to the profile picture
            $table->unsignedBigInteger('branch_id')->nullable(); // Foreign key for the branch
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
        Schema::dropIfExists('personalia');
    }
};
