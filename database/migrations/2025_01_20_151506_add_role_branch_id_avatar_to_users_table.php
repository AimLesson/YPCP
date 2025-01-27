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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('user'); // Default role set to 'user'
            $table->unsignedBigInteger('branch_id')->nullable(); // Allow null for branch_id
            $table->string('avatar')->nullable(); // Allow null for avatar
            
            // Add a foreign key constraint if `branches` table exists
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['branch_id']); // Drop foreign key
            $table->dropColumn(['role', 'branch_id', 'avatar']); // Remove columns
        });
    }
};
