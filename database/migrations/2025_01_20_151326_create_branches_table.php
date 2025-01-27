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
        Schema::create('branches', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name');
            $table->string('slug')->unique(); // Unique slug for SEO-friendly URLs
            $table->text('company_profile')->nullable();
            $table->string('logo')->nullable(); // Path to the logo image
            $table->text('about')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('profile_bg')->nullable(); // Background image for profile
            $table->string('profile_banner1')->nullable();
            $table->string('profile_banner2')->nullable();
            $table->text('visi')->nullable(); // Vision of the branch
            $table->text('misi')->nullable(); // Mission of the branch
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
};
