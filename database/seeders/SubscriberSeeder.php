<?php

namespace Database\Seeders;

use App\Models\Subscriber;
use Illuminate\Database\Seeder;

class SubscriberSeeder extends Seeder
{
    public function run(): void
    {
        if (Subscriber::count() > 0) {
            return;
        }

        $subscribers = [
            ['email' => 'john.doe@example.com'],
            ['email' => 'jane.smith@example.com'],
            ['email' => 'tech.enthusiast@example.com'],
            ['email' => 'dev@example.com'],
            ['email' => 'business@example.com'],
            ['email' => 'startup@example.com'],
            ['email' => 'freelancer@example.com'],
            ['email' => 'consultant@example.com'],
        ];

        foreach ($subscribers as $index => $subscriber) {
            Subscriber::create([
                'email' => $subscriber['email'],
                'subscribed_at' => now()->subDays(rand(1, 30)),
            ]);
        }

        $this->command->info('Newsletter subscribers demo data seeded successfully!');
    }
}
