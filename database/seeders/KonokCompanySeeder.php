<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use App\Models\Faq;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\SocialLink;
use Illuminate\Database\Seeder;

class KonokCompanySeeder extends Seeder
{
    public function run(): void
    {
        // Company Profile
        CompanyProfile::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => 'KEY OF NEXT ONLINE KNOWLEDGE',
                'short_name' => 'KONOK',
                'tagline' => 'Empowering Businesses Through Technology Innovation',
                'description' => 'KEY OF NEXT ONLINE KNOWLEDGE (KONOK) is a leading technology solutions provider dedicated to helping businesses embrace digital transformation. With years of experience and a passion for innovation, we deliver exceptional results that drive growth and success.',
                'vision' => 'To be the most trusted technology partner for businesses worldwide, setting new standards of excellence in digital innovation and delivering solutions that shape the future.',
                'mission' => 'To empower businesses with cutting-edge technology solutions that drive efficiency, growth, and competitive advantage while maintaining the highest standards of quality and customer satisfaction.',
                'core_values' => json_encode([
                    ['icon' => 'fas fa-lightbulb', 'title' => 'Innovation', 'desc' => 'We constantly push boundaries'],
                    ['icon' => 'fas fa-handshake', 'title' => 'Integrity', 'desc' => 'We build trust through transparency'],
                    ['icon' => 'fas fa-users', 'title' => 'Collaboration', 'desc' => 'We work together for success'],
                    ['icon' => 'fas fa-star', 'title' => 'Excellence', 'desc' => 'We strive for highest quality'],
                ]),
                'achievements' => json_encode([
                    ['number' => '500+', 'label' => 'Projects Completed'],
                    ['number' => '150+', 'label' => 'Happy Clients'],
                    ['number' => '50+', 'label' => 'Team Members'],
                    ['number' => '10+', 'label' => 'Years Experience'],
                ]),
                'founded_year' => '2015',
                'employees_count' => 50,
                'is_active' => true,
            ]
        );

        // Social Links
        $socialLinks = [
            ['platform' => 'facebook', 'url' => 'https://facebook.com/konokbd', 'color' => '#1877F2', 'order' => 1],
            ['platform' => 'twitter', 'url' => 'https://twitter.com/konokbd', 'color' => '#1DA1F2', 'order' => 2],
            ['platform' => 'linkedin', 'url' => 'https://linkedin.com/company/konok', 'color' => '#0A66C2', 'order' => 3],
            ['platform' => 'instagram', 'url' => 'https://instagram.com/konokbd', 'color' => '#E4405F', 'order' => 4],
            ['platform' => 'youtube', 'url' => 'https://youtube.com/@konok', 'color' => '#FF0000', 'order' => 5],
        ];

        foreach ($socialLinks as $link) {
            SocialLink::updateOrCreate(
                ['platform' => $link['platform']],
                $link + ['is_active' => true]
            );
        }

        // Service Categories
        $categories = [
            ['name' => 'Web Development', 'icon' => 'fas fa-code', 'order' => 1],
            ['name' => 'Mobile Apps', 'icon' => 'fas fa-mobile-alt', 'order' => 2],
            ['name' => 'Cloud Solutions', 'icon' => 'fas fa-cloud', 'order' => 3],
            ['name' => 'AI & Analytics', 'icon' => 'fas fa-robot', 'order' => 4],
            ['name' => 'Security', 'icon' => 'fas fa-shield-alt', 'order' => 5],
        ];

        foreach ($categories as $cat) {
            $category = ServiceCategory::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($cat['name'])],
                [
                    'name' => $cat['name'],
                    'icon' => $cat['icon'],
                    'order' => $cat['order'],
                    'is_active' => true,
                ]
            );

            // Create services for each category
            $services = $this->getServicesForCategory($cat['name']);
            foreach ($services as $service) {
                Service::updateOrCreate(
                    ['slug' => \Illuminate\Support\Str::slug($service['name'])],
                    [
                        'category_id' => $category->id,
                        'name' => $service['name'],
                        'short_description' => $service['description'],
                        'description' => $service['description'] . ' Our expert team ensures top-quality delivery with ongoing support.',
                        'icon' => $cat['icon'],
                        'features' => json_encode($service['features'] ?? []),
                        'order' => $service['order'] ?? 1,
                        'is_active' => true,
                    ]
                );
            }
        }

        // FAQs
        $faqs = [
            ['category' => 'General', 'question' => 'What services does KONOK offer?', 'answer' => 'KONOK offers a wide range of technology services including web development, mobile app development, cloud solutions, AI integration, cybersecurity, and more.', 'order' => 1],
            ['category' => 'General', 'question' => 'How long does a typical project take?', 'answer' => 'Project timelines vary based on complexity. A simple website might take 4-8 weeks, while complex enterprise solutions can take 3-6 months.', 'order' => 2],
            ['category' => 'Pricing', 'question' => 'Do you offer custom pricing?', 'answer' => 'Yes, we provide custom pricing based on your specific requirements. Contact us for a detailed quote.', 'order' => 3],
            ['category' => 'Support', 'question' => 'What kind of support do you provide?', 'answer' => 'We provide 24/7 technical support, regular maintenance, and updates for all our solutions.', 'order' => 4],
            ['category' => 'Process', 'question' => 'How do we start a project?', 'answer' => 'Simply contact us through our form or schedule a call. We will discuss your requirements and provide a detailed proposal.', 'order' => 5],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['question' => $faq['question']],
                [
                    'category' => $faq['category'],
                    'answer' => $faq['answer'],
                    'order' => $faq['order'],
                    'is_active' => true,
                ]
            );
        }

        $this->command->info('KONOK Company Data seeded successfully!');
    }

    private function getServicesForCategory($category)
    {
        $services = [
            'Web Development' => [
                ['name' => 'Custom Web Applications', 'description' => 'Build powerful web applications tailored to your business needs using Laravel, React, and Vue.js.', 'features' => ['Custom Design', 'Responsive', 'SEO Optimized', 'Admin Panel'], 'order' => 1],
                ['name' => 'E-commerce Solutions', 'description' => 'Complete online store solutions with secure payment integration and inventory management.', 'features' => ['Payment Gateway', 'Inventory', 'Order Tracking', 'Analytics'], 'order' => 2],
                ['name' => 'WordPress Development', 'description' => 'Professional WordPress websites and custom theme development.', 'features' => ['Custom Themes', 'Plugins', 'WooCommerce', 'SEO'], 'order' => 3],
            ],
            'Mobile Apps' => [
                ['name' => 'iOS App Development', 'description' => 'Native iOS applications built with Swift for iPhone and iPad.', 'features' => ['Native Swift', 'App Store Ready', 'Push Notifications', 'Analytics'], 'order' => 1],
                ['name' => 'Android App Development', 'description' => 'Native Android applications built with Kotlin and Java.', 'features' => ['Native Kotlin', 'Play Store Ready', 'Material Design', 'Offline Support'], 'order' => 2],
                ['name' => 'Cross-Platform Apps', 'description' => 'Flutter and React Native apps that work on both iOS and Android.', 'features' => ['Single Codebase', 'Native Performance', 'Cost Effective', 'Fast Development'], 'order' => 3],
            ],
            'Cloud Solutions' => [
                ['name' => 'Cloud Migration', 'description' => 'Seamless migration of your infrastructure to AWS, Azure, or Google Cloud.', 'features' => ['Assessment', 'Planning', 'Migration', 'Optimization'], 'order' => 1],
                ['name' => 'DevOps & CI/CD', 'description' => 'Implement modern DevOps practices and continuous integration pipelines.', 'features' => ['CI/CD Pipeline', 'Auto Scaling', 'Monitoring', 'Security'], 'order' => 2],
                ['name' => 'Cloud Infrastructure', 'description' => 'Design and manage scalable cloud infrastructure for your applications.', 'features' => ['High Availability', 'Load Balancing', 'Backups', 'Disaster Recovery'], 'order' => 3],
            ],
            'AI & Analytics' => [
                ['name' => 'AI Chatbots', 'description' => 'Intelligent chatbots for customer service and lead generation.', 'features' => ['NLP Powered', 'Multi-language', '24/7 Support', 'Analytics'], 'order' => 1],
                ['name' => 'Business Intelligence', 'description' => 'Transform data into actionable insights with advanced analytics dashboards.', 'features' => ['Real-time Data', 'Custom Reports', 'Predictive Analytics', 'Visualization'], 'order' => 2],
                ['name' => 'Machine Learning', 'description' => 'Custom ML models for prediction, classification, and automation.', 'features' => ['Data Processing', 'Model Training', 'API Integration', 'Monitoring'], 'order' => 3],
            ],
            'Security' => [
                ['name' => 'Cybersecurity Audit', 'description' => 'Comprehensive security assessment of your systems and infrastructure.', 'features' => ['Vulnerability Scan', 'Penetration Testing', 'Compliance Check', 'Report'], 'order' => 1],
                ['name' => 'Data Protection', 'description' => 'Implement robust data protection and encryption solutions.', 'features' => ['Encryption', 'Access Control', 'Backup', 'Compliance'], 'order' => 2],
                ['name' => 'Security Monitoring', 'description' => '24/7 security monitoring and incident response services.', 'features' => ['Real-time Monitoring', 'Threat Detection', 'Incident Response', 'Reports'], 'order' => 3],
            ],
        ];

        return $services[$category] ?? [];
    }
}
