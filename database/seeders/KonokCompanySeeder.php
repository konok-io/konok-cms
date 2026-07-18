<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\CaseStudy;
use App\Models\Client;
use App\Models\CompanyProfile;
use App\Models\Faq;
use App\Models\HeroSection;
use App\Models\Industry;
use App\Models\JobDepartment;
use App\Models\JobLocation;
use App\Models\Partner;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\SocialLink;
use App\Models\Solution;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class KonokCompanySeeder extends Seeder
{
    public function run(): void
    {
        $this->seedCompanyProfile();
        $this->seedHeroSections();
        $this->seedSocialLinks();
        $this->seedServiceCategories();
        $this->seedIndustries();
        $this->seedSolutions();
        $this->seedCaseStudies();
        $this->seedClients();
        $this->seedPartners();
        $this->seedTeamMembers();
        $this->seedFaqs();
        $this->seedJobDepartments();
        $this->seedJobLocations();
        $this->seedCareers();

        $this->command->info('KONOK Corporate Demo Data seeded successfully!');
    }

    private function seedCompanyProfile()
    {
        CompanyProfile::updateOrCreate(['id' => 1], [
            'company_name' => 'KEY OF NEXT ONLINE KNOWLEDGE',
            'short_name' => 'KONOK',
            'tagline' => 'Empowering Businesses Through Technology Innovation',
            'description' => 'KONOK is a leading technology solutions provider dedicated to helping businesses embrace digital transformation.',
            'vision' => 'To be the most trusted technology partner for businesses worldwide.',
            'mission' => 'To empower businesses with cutting-edge technology solutions.',
            'founded_year' => '2015',
            'employees_count' => 50,
            'address' => 'House 123, Road 45, Gulshan-2, Dhaka 1212, Bangladesh',
            'phone' => '+880 1XXX-XXXXXX',
            'email' => 'info@konok.io',
            'website' => 'https://konok.io',
            'is_active' => true,
        ]);
    }

    private function seedHeroSections()
    {
        HeroSection::updateOrCreate(['title' => 'Transforming Ideas Into Digital Excellence'], [
            'subtitle' => 'Leading Technology Solutions Provider',
            'description' => 'We empower businesses through cutting-edge technology solutions.',
            'button_text' => 'Explore Services',
            'button_url' => '/services',
            'order' => 1,
            'is_active' => true,
        ]);

        HeroSection::updateOrCreate(['title' => 'Innovative Solutions for Tomorrow'], [
            'subtitle' => 'Your Digital Partner',
            'description' => 'From web development to AI integration, we cover everything.',
            'button_text' => 'Contact Us',
            'button_url' => '/contact',
            'order' => 2,
            'is_active' => true,
        ]);
    }

    private function seedSocialLinks()
    {
        $links = [
            ['platform' => 'facebook', 'url' => 'https://facebook.com/konokbd'],
            ['platform' => 'twitter', 'url' => 'https://twitter.com/konokbd'],
            ['platform' => 'linkedin', 'url' => 'https://linkedin.com/company/konok'],
            ['platform' => 'instagram', 'url' => 'https://instagram.com/konokbd'],
            ['platform' => 'youtube', 'url' => 'https://youtube.com/@konok'],
        ];

        foreach ($links as $index => $link) {
            SocialLink::updateOrCreate(['platform' => $link['platform']], array_merge($link, ['order' => $index + 1, 'is_active' => true]));
        }
    }

    private function seedServiceCategories()
    {
        $categories = [
            ['name' => 'Web Development', 'slug' => 'web-development', 'icon' => 'fas fa-code'],
            ['name' => 'Mobile Apps', 'slug' => 'mobile-apps', 'icon' => 'fas fa-mobile-alt'],
            ['name' => 'Cloud Solutions', 'slug' => 'cloud-solutions', 'icon' => 'fas fa-cloud'],
            ['name' => 'AI & Analytics', 'slug' => 'ai-analytics', 'icon' => 'fas fa-robot'],
            ['name' => 'Cyber Security', 'slug' => 'cyber-security', 'icon' => 'fas fa-shield-alt'],
        ];

        foreach ($categories as $index => $cat) {
            $category = ServiceCategory::updateOrCreate(['slug' => $cat['slug']], array_merge($cat, ['order' => $index + 1, 'is_active' => true]));
            $this->addServicesForCategory($category);
        }
    }

    private function addServicesForCategory($category)
    {
        $services = [
            'web-development' => [
                ['name' => 'Custom Web Applications', 'desc' => 'Build powerful web applications with Laravel, React, and Vue.js.'],
                ['name' => 'E-commerce Solutions', 'desc' => 'Complete online store solutions with secure payment integration.'],
                ['name' => 'WordPress Development', 'desc' => 'Professional WordPress websites and custom theme development.'],
            ],
            'mobile-apps' => [
                ['name' => 'iOS App Development', 'desc' => 'Native iOS applications built with Swift.'],
                ['name' => 'Android App Development', 'desc' => 'Native Android applications built with Kotlin.'],
                ['name' => 'Cross-Platform Apps', 'desc' => 'Flutter and React Native apps for iOS and Android.'],
            ],
            'cloud-solutions' => [
                ['name' => 'Cloud Migration', 'desc' => 'Seamless migration to AWS, Azure, or Google Cloud.'],
                ['name' => 'DevOps & CI/CD', 'desc' => 'Modern DevOps practices and CI/CD pipelines.'],
                ['name' => 'Cloud Infrastructure', 'desc' => 'Scalable cloud infrastructure for your applications.'],
            ],
            'ai-analytics' => [
                ['name' => 'AI Chatbots', 'desc' => 'Intelligent chatbots for customer service.'],
                ['name' => 'Business Intelligence', 'desc' => 'Data analytics dashboards and insights.'],
                ['name' => 'Machine Learning', 'desc' => 'Custom ML models for prediction and automation.'],
            ],
            'cyber-security' => [
                ['name' => 'Cybersecurity Audit', 'desc' => 'Comprehensive security assessment of your systems.'],
                ['name' => 'Data Protection', 'desc' => 'Robust data protection and encryption solutions.'],
                ['name' => 'Security Monitoring', 'desc' => '24/7 security monitoring and incident response.'],
            ],
        ];

        $categoryServices = $services[$category->slug] ?? [];

        foreach ($categoryServices as $index => $svc) {
            Service::updateOrCreate(['name' => $svc['name'], 'category_id' => $category->id], [
                'short_description' => $svc['desc'],
                'description' => $svc['desc'] . ' Our expert team ensures top-quality delivery.',
                'icon' => $category->icon,
                'order' => $index + 1,
                'is_featured' => $index < 2,
                'is_active' => true,
            ]);
        }
    }

    private function seedIndustries()
    {
        $industries = [
            ['name' => 'Healthcare', 'slug' => 'healthcare', 'icon' => 'fas fa-hospital'],
            ['name' => 'E-commerce', 'slug' => 'e-commerce', 'icon' => 'fas fa-shopping-cart'],
            ['name' => 'Finance', 'slug' => 'finance', 'icon' => 'fas fa-chart-line'],
            ['name' => 'Education', 'slug' => 'education', 'icon' => 'fas fa-graduation-cap'],
            ['name' => 'Manufacturing', 'slug' => 'manufacturing', 'icon' => 'fas fa-industry'],
            ['name' => 'Real Estate', 'slug' => 'real-estate', 'icon' => 'fas fa-home'],
        ];

        foreach ($industries as $index => $ind) {
            Industry::updateOrCreate(['slug' => $ind['slug']], array_merge($ind, ['order' => $index + 1, 'is_active' => true]));
        }
    }

    private function seedSolutions()
    {
        $solutions = [
            ['name' => 'ERP System', 'slug' => 'erp-system', 'type' => 'ERP', 'icon' => 'fas fa-cogs'],
            ['name' => 'POS System', 'slug' => 'pos-system', 'type' => 'POS', 'icon' => 'fas fa-credit-card'],
            ['name' => 'CRM Solution', 'slug' => 'crm-solution', 'type' => 'CRM', 'icon' => 'fas fa-users'],
            ['name' => 'HRM System', 'slug' => 'hrm-system', 'type' => 'HRM', 'icon' => 'fas fa-user-tie'],
            ['name' => 'Accounting Software', 'slug' => 'accounting-software', 'type' => 'Accounting', 'icon' => 'fas fa-calculator'],
            ['name' => 'Cloud Platform', 'slug' => 'cloud-platform', 'type' => 'Cloud', 'icon' => 'fas fa-cloud'],
        ];

        foreach ($solutions as $index => $sol) {
            Solution::updateOrCreate(['slug' => $sol['slug']], array_merge($sol, [
                'short_description' => $sol['name'] . ' for your business needs.',
                'order' => $index + 1,
                'is_featured' => $index < 3,
                'is_active' => true,
            ]));
        }
    }

    private function seedCaseStudies()
    {
        CaseStudy::updateOrCreate(['slug' => 'healthcare-digital-transformation'], [
            'title' => 'Digital Transformation for Healthcare Provider',
            'client_name' => 'MediCare Hospital',
            'industry' => 'Healthcare',
            'challenge' => 'Legacy systems causing inefficiency.',
            'solution' => 'Implemented integrated hospital management system.',
            'results' => '40% reduction in administrative work.',
            'order' => 1,
            'is_active' => true,
        ]);

        CaseStudy::updateOrCreate(['slug' => 'ecommerce-platform-retail'], [
            'title' => 'E-commerce Platform for Retail Chain',
            'client_name' => 'Fashion Hub BD',
            'industry' => 'E-commerce',
            'challenge' => 'No online presence.',
            'solution' => 'Built complete e-commerce platform.',
            'results' => '200% increase in sales.',
            'order' => 2,
            'is_active' => true,
        ]);
    }

    private function seedClients()
    {
        $clients = [
            ['name' => 'MediCare Hospital', 'slug' => 'medicare-hospital', 'industry' => 'Healthcare'],
            ['name' => 'Fashion Hub BD', 'slug' => 'fashion-hub-bd', 'industry' => 'Retail'],
            ['name' => 'TechStart Inc', 'slug' => 'techstart-inc', 'industry' => 'Technology'],
            ['name' => 'EduLearn Platform', 'slug' => 'edulearn-platform', 'industry' => 'Education'],
            ['name' => 'FinBank Ltd', 'slug' => 'finbank-ltd', 'industry' => 'Finance'],
            ['name' => 'AutoParts Corp', 'slug' => 'autoparts-corp', 'industry' => 'Manufacturing'],
        ];

        foreach ($clients as $index => $client) {
            Client::updateOrCreate(['slug' => $client['slug']], array_merge($client, [
                'order' => $index + 1,
                'is_featured' => $index < 3,
                'is_active' => true,
            ]));
        }
    }

    private function seedPartners()
    {
        $partners = [
            ['name' => 'Microsoft', 'slug' => 'microsoft'],
            ['name' => 'Google Cloud', 'slug' => 'google-cloud'],
            ['name' => 'AWS', 'slug' => 'aws'],
            ['name' => 'Adobe', 'slug' => 'adobe'],
            ['name' => 'Salesforce', 'slug' => 'salesforce'],
        ];

        foreach ($partners as $index => $partner) {
            Partner::updateOrCreate(['slug' => $partner['slug']], array_merge($partner, [
                'order' => $index + 1,
                'is_featured' => $index < 3,
                'is_active' => true,
            ]));
        }
    }

    private function seedTeamMembers()
    {
        $members = [
            ['name' => 'Muhammad Rashed Hossain', 'slug' => 'rashed-hossain', 'designation' => 'Founder & CEO', 'department' => 'Leadership', 'team_type' => 'leadership', 'short_bio' => 'Visionary leader with 15+ years of experience.', 'email' => 'rashed@konok.io', 'order' => 1],
            ['name' => 'Sarah Rahman', 'slug' => 'sarah-rahman', 'designation' => 'Chief Technology Officer', 'department' => 'Technology', 'team_type' => 'leadership', 'short_bio' => 'Expert in cloud architecture and AI.', 'email' => 'sarah@konok.io', 'order' => 2],
            ['name' => 'Michael Chen', 'slug' => 'michael-chen', 'designation' => 'Director of Operations', 'department' => 'Operations', 'team_type' => 'management', 'short_bio' => 'Operations expert with PMP certification.', 'email' => 'michael@konok.io', 'order' => 3],
            ['name' => 'Fatima Khan', 'slug' => 'fatima-khan', 'designation' => 'Head of Design', 'department' => 'Design', 'team_type' => 'management', 'short_bio' => 'Award-winning UI/UX designer.', 'email' => 'fatima@konok.io', 'order' => 4],
            ['name' => 'Ahmed Hasan', 'slug' => 'ahmed-hasan', 'designation' => 'Senior Developer', 'department' => 'Technology', 'team_type' => 'technical', 'short_bio' => 'Full-stack developer specializing in Laravel and React.', 'email' => 'ahmed@konok.io', 'order' => 5],
            ['name' => 'Nadia Islam', 'slug' => 'nadia-islam', 'designation' => 'Project Manager', 'department' => 'Operations', 'team_type' => 'technical', 'short_bio' => 'Certified Scrum Master with 8 years experience.', 'email' => 'nadia@konok.io', 'order' => 6],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(['slug' => $member['slug']], array_merge($member, ['is_featured' => true, 'is_active' => true]));
        }
    }

    private function seedFaqs()
    {
        $faqs = [
            ['category' => 'General', 'question' => 'What services does KONOK offer?', 'answer' => 'We offer web development, mobile apps, cloud solutions, AI integration, and cybersecurity services.'],
            ['category' => 'General', 'question' => 'How long does a project take?', 'answer' => 'Simple websites take 4-8 weeks, complex solutions 3-6 months.'],
            ['category' => 'Pricing', 'question' => 'Do you offer custom pricing?', 'answer' => 'Yes, we provide custom pricing based on your requirements.'],
            ['category' => 'Support', 'question' => 'What support do you provide?', 'answer' => 'We provide 24/7 technical support and maintenance.'],
            ['category' => 'Process', 'question' => 'How do we start?', 'answer' => 'Contact us for a consultation and we will provide a detailed proposal.'],
        ];

        foreach ($faqs as $index => $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], array_merge($faq, ['order' => $index + 1, 'is_active' => true]));
        }
    }

    private function seedJobDepartments()
    {
        $departments = [
            ['name' => 'Technology', 'slug' => 'technology'],
            ['name' => 'Design', 'slug' => 'design'],
            ['name' => 'Marketing', 'slug' => 'marketing'],
            ['name' => 'Operations', 'slug' => 'operations'],
        ];

        foreach ($departments as $index => $dept) {
            JobDepartment::updateOrCreate(['slug' => $dept['slug']], array_merge($dept, ['order' => $index + 1, 'is_active' => true]));
        }
    }

    private function seedJobLocations()
    {
        JobLocation::updateOrCreate(['slug' => 'dhaka'], ['name' => 'Dhaka (Head Office)', 'city' => 'Dhaka', 'country' => 'Bangladesh', 'order' => 1, 'is_active' => true]);
        JobLocation::updateOrCreate(['slug' => 'chittagong'], ['name' => 'Chittagong', 'city' => 'Chittagong', 'country' => 'Bangladesh', 'order' => 2, 'is_active' => true]);
        JobLocation::updateOrCreate(['slug' => 'remote'], ['name' => 'Remote', 'city' => 'Anywhere', 'country' => 'Worldwide', 'is_remote' => true, 'order' => 3, 'is_active' => true]);
    }

    private function seedCareers()
    {
        $deptTech = JobDepartment::where('slug', 'technology')->first();
        $deptDesign = JobDepartment::where('slug', 'design')->first();
        $locDhaka = JobLocation::where('slug', 'dhaka')->first();
        $locRemote = JobLocation::where('slug', 'remote')->first();

        Career::updateOrCreate(['title' => 'Senior Laravel Developer'], [
            'department_id' => $deptTech?->id,
            'location_id' => $locDhaka?->id,
            'employment_type' => 'full-time',
            'experience_level' => 'senior',
            'short_description' => 'Experienced Laravel developer to join our team.',
            'order' => 1,
            'is_featured' => true,
            'is_active' => true,
        ]);

        Career::updateOrCreate(['title' => 'React Developer'], [
            'department_id' => $deptTech?->id,
            'location_id' => $locRemote?->id,
            'employment_type' => 'full-time',
            'experience_level' => 'mid',
            'short_description' => 'React developer for amazing UI development.',
            'order' => 2,
            'is_featured' => true,
            'is_active' => true,
        ]);

        Career::updateOrCreate(['title' => 'UI/UX Designer'], [
            'department_id' => $deptDesign?->id,
            'location_id' => $locDhaka?->id,
            'employment_type' => 'full-time',
            'experience_level' => 'mid',
            'short_description' => 'Creative designer for beautiful interfaces.',
            'order' => 3,
            'is_featured' => false,
            'is_active' => true,
        ]);
    }
}
