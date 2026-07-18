<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Ahmed Rahman',
                'company' => 'CEO, TechStart Inc.',
                'rating' => 5,
                'review' => 'KONOK transformed our online presence completely. Their expertise in web development and dedication to quality exceeded our expectations. The team was professional and delivered ahead of schedule.',
                'photo' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100&h=100&fit=crop&crop=face',
            ],
            [
                'client_name' => 'Fatima Khan',
                'company' => 'Founder, HealthTech Solutions',
                'rating' => 5,
                'review' => 'The team at KONOK delivered our mobile app on time and with exceptional quality. Their attention to detail and customer service is outstanding. Highly recommended for healthcare projects!',
                'photo' => 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?w=100&h=100&fit=crop&crop=face',
            ],
            [
                'client_name' => 'David Lee',
                'company' => 'CTO, DataFlow Systems',
                'rating' => 5,
                'review' => 'Working with KONOK was a game-changer for our business. Their cloud solutions helped us scale efficiently and reduce costs significantly. Their expertise in AWS is unmatched.',
                'photo' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=100&h=100&fit=crop&crop=face',
            ],
            [
                'client_name' => 'Sarah Mitchell',
                'company' => 'Director, EduLearn Platform',
                'rating' => 5,
                'review' => 'KONOK built our e-learning platform from scratch. The result is a beautiful, user-friendly website that has helped us serve thousands of students. Amazing work!',
                'photo' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=100&h=100&fit=crop&crop=face',
            ],
            [
                'client_name' => 'James Wilson',
                'company' => 'Manager, Fashion Hub BD',
                'rating' => 5,
                'review' => 'Our e-commerce website developed by KONOK has increased our sales by 200%. Their SEO expertise and responsive design are top-notch. Professional team!',
                'photo' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face',
            ],
            [
                'client_name' => 'Nadia Hassan',
                'company' => 'CEO, GreenBank Finance',
                'rating' => 5,
                'review' => 'KONOK developed a secure banking application for us with complex features. Their cybersecurity expertise gave us confidence. Outstanding technical skills and communication!',
                'photo' => 'https://images.unsplash.com/photo-1598550874175-4d0ef436c909?w=100&h=100&fit=crop&crop=face',
            ],
        ];

        foreach ($testimonials as $index => $testimonial) {
            Testimonial::updateOrCreate(
                ['client_name' => $testimonial['client_name']],
                [
                    'company' => $testimonial['company'],
                    'rating' => $testimonial['rating'],
                    'review' => $testimonial['review'],
                    'photo' => $testimonial['photo'],
                    'is_active' => true,
                    'sort_order' => $index,
                ]
            );
        }
    }
}
