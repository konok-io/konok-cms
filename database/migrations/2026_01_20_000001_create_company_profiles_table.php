<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('company_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('short_name', 50);
            $table->text('tagline')->nullable();
            $table->text('description')->nullable();
            $table->string('chairman_name')->nullable();
            $table->text('chairman_message')->nullable();
            $table->string('chairman_image')->nullable();
            $table->string('ceo_name')->nullable();
            $table->text('ceo_message')->nullable();
            $table->string('ceo_image')->nullable();
            $table->text('vision')->nullable();
            $table->text('mission')->nullable();
            $table->json('core_values')->nullable();
            $table->json('achievements')->nullable();
            $table->string('founded_year')->nullable();
            $table->integer('employees_count')->nullable();
            $table->string('logo')->nullable();
            $table->string('dark_logo')->nullable();
            $table->string('favicon')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('company_profiles');
    }
};
