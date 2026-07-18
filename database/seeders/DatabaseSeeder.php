<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesAndPermissionsSeeder::class,
            AdminUserSeeder::class,
            SettingSeeder::class,
            SeoSettingSeeder::class,
            KonokCompanySeeder::class, // KONOK Corporate Website
            SkillSeeder::class,
            ServiceSeeder::class,
            ExperienceSeeder::class,
            EducationSeeder::class,
            ProjectSeeder::class,
            BlogSeeder::class,
            TestimonialSeeder::class,
            ContactMessageSeeder::class,
            VisitorSeeder::class,
            KnowledgeSeeder::class, // Knowledge Base
            SubscriberSeeder::class, // Newsletter Subscribers
        ]);
    }
}
