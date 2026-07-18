<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            // Hero Section
            $table->string('hero_title')->nullable()->after('tagline');
            $table->text('hero_description')->nullable()->after('hero_title');
            $table->string('hero_image')->nullable()->after('hero_description');
            $table->string('hero_button_text')->default('Explore Services')->after('hero_image');
            $table->string('hero_button_url')->default('/services')->after('hero_button_text');

            // Stats Section
            $table->string('stat_projects')->default('500+')->nullable()->after('hero_button_url');
            $table->string('stat_clients')->default('150+')->nullable()->after('stat_projects');
            $table->string('stat_team')->default('50+')->nullable()->after('stat_clients');
            $table->string('stat_years')->default('10+')->nullable()->after('stat_team');
            
            // About Section
            $table->string('about_image')->nullable()->after('stat_years');
            
            // Feature Items (JSON)
            $table->json('home_features')->nullable()->after('about_image');
        });
    }

    public function down(): void
    {
        Schema::table('company_profiles', function (Blueprint $table) {
            $table->dropColumn([
                'hero_title',
                'hero_description',
                'hero_image',
                'hero_button_text',
                'hero_button_url',
                'stat_projects',
                'stat_clients',
                'stat_team',
                'stat_years',
                'about_image',
                'home_features',
            ]);
        });
    }
};
