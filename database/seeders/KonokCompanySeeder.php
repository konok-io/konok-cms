<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\CaseStudy;
use App\Models\Client;
use App\Models\CompanyProfile;
use App\Models\Faq;
use App\Models\HeroSection;
use App\Models\Industry;
use App\Models\JobApplication;
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
        CompanyProfile::updateOrCreate(
            ['id' => 1],
            [
                'company_name' => 'KEY OF NEXT ONLINE KNOWLEDGE',
                'short_name' => 'KONOK',
                'tagline' => 'Empowering Businesses Through Technology Innovation',
                'description' => 'KEY OF NEXT ONLINE KNOWLEDGE (KONOK) is a leading technology solutions provider dedicated to helping businesses embrace digital transformation. With years of experience and a passion for innovation, we deliver exceptional results that drive growth and success.',
                'vision' => 'To be the most trusted technology partner for businesses worldwide, setting new standards of excellence in digital innovation and delivering solutions that shape the future.',
                'mission' => 'To empower businesses with cutting-edge technology solutions that drive efficiency, growth, and competitive advantage while maintaining the highest standards of quality and customer satisfaction.',
                'founded_year' => '2015',
                'employees_count' => 50,
                'address' => 'House 123, Road 45, Gulshan-2, Dhaka 1212, Bangladesh',
                'phone' => '+880 1XXX-XXXXXX',
                'email' => 'info@konok.io',
                'website' => 'https://konok.io',
                'is_active' => true,
            ]
        );
    }

    private function seedHeroSections()
    {
        $heroes = [
            [
                'title' => 'Transforming Ideas Into Digital Excellence',
                'subtitle' => 'Leading Technology Solutions Provider',
                'description' => 'We empower businesses through cutting-edge technology solutions, helping you navigate the digital landscape with confidence.',
                'button_text' => 'Explore Services',
                'button_url' => '/services',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Innovative Solutions for Tomorrow',
                'subtitle' => 'Your Digital Partner',
                'description' => 'From web development to AI integration, we cover the entire spectrum of modern technology services.',
                'button_text' => 'Contact Us',
                'button_url' => '/contact',
                'order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($heroes as $hero) {
            HeroSection::updateOrCreate(['title' => $hero['title']], $hero);
        }
    }

    private function seedSocialLinks()
    {
        $links = [
            ['platform' => 'facebook', 'url' => 'https://facebook.com/konokbd', 'order' => 1],
            ['platform' => 'twitter', 'url' => 'https://twitter.com/konokbd', 'order' => 2],
            ['platform' => 'linkedin', 'url' => 'https://linkedin.com/company/konok', 'order' => 3],
            ['platform' => 'instagram', 'url' => 'https://instagram.com/konokbd', 'order' => 4],
            ['platform' => 'youtube', 'url' => 'https://youtube.com/@konok', 'order' => 5],
        ];

        foreach ($links as $link) {
            SocialLink::updateOrCreate(['platform' => $link['platform']], array_merge($link, ['is_active' => true]));
        }
    }

    private function seedServiceCategories()
    {
        $categories = [
            ['name' => 'Web Development', 'slug' => 'web-development', 'icon' => 'fas fa-code', 'description' => 'Custom web applications and websites', 'order' => 1],
            ['name' => 'Mobile Apps', 'slug' => 'mobile-apps', 'icon' => 'fas fa-mobile-alt', 'description' => 'iOS and Android applications', 'order' => 2],
            ['name' => 'Cloud Solutions', 'slug' => 'cloud-solutions', 'icon' => 'fas fa-cloud', 'description' => 'Cloud infrastructure and migration', 'order' => 3],
            ['name' => 'AI & Analytics', 'slug' => 'ai-analytics', 'icon' => 'fas fa-robot', 'description' => 'Artificial intelligence and data analytics', 'order' => 4],
            ['name' => 'Cyber Security', 'slug' => 'cyber-security', 'icon' => 'fas fa-shield-alt', 'description' => 'Security solutions and audits', 'order' => 5],
        ];

        foreach ($categories as $cat) {
            $category = ServiceCategory::updateOrCreate(['slug' => $cat['slug']], array_merge($cat, ['is_active' => true]));
            
            // Add services for each category
            $this->addServicesForCategory($category);
        }
    }

    private function addServicesForCategory($category)
    {
        $services = [
            'web-development' => [
                ['name' => 'Custom Web Applications', 'short_description' => 'Build powerful web applications tailored to your business needs using Laravel, React, and Vue.js.', 'order' => 1],
                ['name' => 'E-commerce Solutions', 'short_description' => 'Complete online store solutions with secure payment integration and inventory management.', 'order' => 2],
                ['name' => 'WordPress Development', 'short_description' => 'Professional WordPress websites and custom theme development.', 'order' => 3],
            ],
            'mobile-apps' => [
                ['name' => 'iOS App Development', 'short_description' => 'Native iOS applications built with Swift for iPhone and iPad.', 'order' => 1],
                ['name' => 'Android App Development', 'short_description' => 'Native Android applications built with Kotlin and Java.', 'order' => 2],
                ['name' => 'Cross-Platform Apps', 'short_description' => 'Flutter and React Native apps that work on both iOS and Android.', 'order' => 3],
            ],
            'cloud-solutions' => [
                ['name' => 'Cloud Migration', 'short_description' => 'Seamless migration of your infrastructure to AWS, Azure, or Google Cloud.', 'order' => 1],
                ['name' => 'DevOps & CI/CD', 'short_description' => 'Implement modern DevOps practices and continuous integration pipelines.', 'order' => 2],
                ['name' => 'Cloud Infrastructure', 'short_description' => 'Design and manage scalable cloud infrastructure for your applications.', 'order' => 3],
            ],
            'ai-analytics' => [
                ['name' => 'AI Chatbots', 'short_description' => 'Intelligent chatbots for customer service and lead generation.', 'order' => 1],
                ['name' => 'Business Intelligence', 'short_description' => 'Transform data into actionable insights with advanced analytics dashboards.', 'order' => 2],
                ['name' => 'Machine Learning', 'short_description' => 'Custom ML models for prediction, classification, and automation.', 'order' => 3],
            ],
            'cyber-security' => [
                ['name' => 'Cybersecurity Audit', 'short_description' => 'Comprehensive security assessment of your systems and infrastructure.', 'order' => 1],
                ['name' => 'Data Protection', 'short_description' => 'Implement robust data protection and encryption solutions.', 'order' => 2],
                ['name' => 'Security Monitoring', 'short_description' => '24/7 security monitoring and incident response services.', 'order' => 3],
            ],
        ];

        $categoryServices = $services[$category->slug] ?? [];
        
        foreach ($categoryServices as $svc) {
            Service::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($svc['name']), 'category_id' => $category->id],
                array_merge($svc, [
                    'description' => $svc['short_description'] . ' Our expert team ensures top-quality delivery with ongoing support.',
                    'icon' => $category->icon,
                    'is_featured' => $svc['order'] <= 2,
                    'is_active' => true,
                ])
            );
        }
    }

    private function seedIndustries()
    {
        $industries = [
            ['name' => 'Healthcare', 'slug' => 'healthcare', 'icon' => 'fas fa-hospital', 'description' => 'Technology solutions for healthcare providers, hospitals, and medical practices.', 'order' => 1],
            ['name' => 'E-commerce', 'slug' => 'e-commerce', 'icon' => 'fas fa-shopping-cart', 'description' => 'Complete e-commerce solutions for online retail businesses.', 'order' => 2],
            ['name' => 'Finance', 'slug' => 'finance', 'icon' => 'fas fa-chart-line', 'description' => 'Financial technology solutions for banks and fintech companies.', 'order' => 3],
            ['name' => 'Education', 'slug' => 'education', 'icon' => 'fas fa-graduation-cap', 'description' => 'E-learning platforms and educational technology solutions.', 'order' => 4],
            ['name' => 'Manufacturing', 'slug' => 'manufacturing', 'icon' => 'fas fa-industry', 'description' => 'Industrial automation and manufacturing technology solutions.', 'order' => 5],
            ['name' => 'Real Estate', 'slug' => 'real-estate', 'icon' => 'fas fa-home', 'description' => 'Property management and real estate technology platforms.', 'order' => 6],
        ];

        foreach ($industries as $ind) {
            Industry::updateOrCreate(['slug' => $ind['slug']], array_merge($ind, ['is_active' => true]));
        }
    }

    private function seedSolutions()
    {
        $solutions = [
            ['name' => 'ERP System', 'slug' => 'erp-system', 'type' => 'ERP', 'icon' => 'fas fa-cogs', 'short_description' => 'Enterprise Resource Planning system for complete business management.', 'order' => 1, 'is_featured' => true],
            ['name' => 'POS System', 'slug' => 'pos-system', 'type' => 'POS', 'icon' => 'fas fa-credit-card', 'short_description' => 'Point of Sale system for retail and restaurant management.', 'order' => 2, 'is_featured' => true],
            ['name' => 'CRM Solution', 'slug' => 'crm-solution', 'type' => 'CRM', 'icon' => 'fas fa-users', 'short_description' => 'Customer Relationship Management for better client engagement.', 'order' => 3, 'is_featured' => true],
            ['name' => 'HRM System', 'slug' => 'hrm-system', 'type' => 'HRM', 'icon' => 'fas fa-user-tie', 'short_description' => 'Human Resource Management for efficient workforce handling.', 'order' => 4],
            ['name' => 'Accounting Software', 'slug' => 'accounting-software', 'type' => 'Accounting', 'icon' => 'fas fa-calculator', 'short_description' => 'Complete accounting and financial management solution.', 'order' => 5],
            ['name' => 'Cloud Platform', 'slug' => 'cloud-platform', 'type' => 'Cloud', 'icon' => 'fas fa-cloud', 'short_description' => 'Scalable cloud infrastructure for modern businesses.', 'order' => 6],
        ];

        foreach ($solutions as $sol) {
            Solution::updateOrCreate(['slug' => $sol['slug']], array_merge($sol, ['is_active' => true]));
        }
    }

    private function seedCaseStudies()
    {
        $cases = [
            [
                'title' => 'Digital Transformation for Healthcare Provider',
                'slug' => 'healthcare-digital-transformation',
                'client_name' => 'MediCare Hospital',
                'industry' => 'Healthcare',
                'challenge' => 'Legacy systems causing inefficiency and poor patient experience.',
                'solution' => 'Implemented integrated hospital management system with patient portal.',
                'results' => '40% reduction in administrative work, 60% improvement in patient satisfaction.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'E-commerce Platform for Retail Chain',
                'slug' => 'ecommerce-platform-retail',
                'client_name' => 'Fashion Hub BD',
                'industry' => 'E-commerce',
                'challenge' => 'No online presence, losing customers to competitors.',
                'solution' => 'Built complete e-commerce platform with mobile app.',
                'results' => '200% increase in sales within first 6 months.',
                'order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($cases as $cs) {
            CaseStudy::updateOrCreate(['slug' => $cs['slug']], $cs);
        }
    }

    private function seedClients()
    {
        $clients = [
            ['name' => 'MediCare Hospital', 'slug' => 'medicare-hospital', 'industry' => 'Healthcare', 'website' => 'https://example.com', 'order' => 1, 'is_featured' => true, 'is_active' => true],
            ['name' => 'Fashion Hub BD', 'slug' => 'fashion-hub-bd', 'industry' => 'Retail', 'website' => 'https://example.com', 'order' => 2, 'is_featured' => true, 'is_active' => true],
            ['name' => 'TechStart Inc', 'slug' => 'techstart-inc', 'industry' => 'Technology', 'website' => 'https://example.com', 'order' => 3, 'is_featured' => true, 'is_active' => true],
            ['name' => 'EduLearn Platform', 'slug' => 'edulearn-platform', 'industry' => 'Education', 'website' => 'https://example.com', 'order' => 4, 'is_active' => true],
            ['name' => 'FinBank Ltd', 'slug' => 'finbank-ltd', 'industry' => 'Finance', 'website' => 'https://example.com', 'order' => 5, 'is_active' => true],
            ['name' => 'AutoParts Corp', 'slug' => 'autoparts-corp', 'industry' => 'Manufacturing', 'website' => 'https://example.com', 'order' => 6, 'is_active' => true],
        ];

        foreach ($clients as $client) {
            Client::updateOrCreate(['slug' => $client['slug']], $client);
        }
    }

    private function seedPartners()
    {
        $partners = [
            ['name' => 'Microsoft', 'slug' => 'microsoft', 'website' => 'https://microsoft.com', 'order' => 1, 'is_featured' => true, 'is_active' => true],
            ['name' => 'Google Cloud', 'slug' => 'google-cloud', 'website' => 'https://cloud.google.com', 'order' => 2, 'is_featured' => true, 'is_active' => true],
            ['name' => 'AWS', 'slug' => 'aws', 'website' => 'https://aws.amazon.com', 'order' => 3, 'is_featured' => true, 'is_active' => true],
            ['name' => 'Adobe', 'slug' => 'adobe', 'website' => 'https://adobe.com', 'order' => 4, 'is_active' => true],
            ['name' => 'Salesforce', 'slug' => 'salesforce', 'website' => 'https://salesforce.com', 'order' => 5, 'is_active' => true],
        ];

        foreach ($partners as $partner) {
            Partner::updateOrCreate(['slug' => $partner['slug']], $partner);
        }
    }

    private function seedTeamMembers()
    {
        $members = [
            [
                'name' => 'Muhammad Rashed Hossain',
                'slug' => 'rashed-hossain',
                'designation' => 'Founder & CEO',
                'department' => 'Leadership',
                'team_type' => 'leadership',
                'short_bio' => 'Visionary leader with 15+ years of experience in technology industry.',
                'email' => 'rashed@konok.io',
                'linkedin' => 'https://linkedin.com/in/rashed',
                'is_featured' => true,
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Sarah Rahman',
                'slug' => 'sarah-rahman',
                'designation' => 'Chief Technology Officer',
                'department' => 'Technology',
                'team_type' => 'leadership',
                'short_bio' => 'Expert in cloud architecture and AI solutions.',
                'email' => 'sarah@konok.io',
                'linkedin' => 'https://linkedin.com/in/sarah',
                'is_featured' => true,
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Michael Chen',
                'slug' => 'michael-chen',
                'designation' => 'Director of Operations',
                'department' => 'Operations',
                'team_type' => 'management',
                'short_bio' => 'Operations expert with PMP certification.',
                'email' => 'michael@konok.io',
                'is_featured' => true,
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'Fatima Khan',
                'slug' => 'fatima-khan',
                'designation' => 'Head of Design',
                'department' => 'Design',
                'team_type' => 'management',
                'short_bio' => 'Award-winning UI/UX designer.',
                'email' => 'fatima@konok.io',
                'is_featured' => true,
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Ahmed Hasan',
                'slug' => 'ahmed-hasan',
                'designation' => 'Senior Developer',
                'department' => 'Technology',
                'team_type' => 'technical',
                'short_bio' => 'Full-stack developer specializing in Laravel and React.',
                'email' => 'ahmed@konok.io',
                'is_featured' => false,
                'is_active' => true,
                'order' => 5,
            ],
            [
                'name' => 'Nadia Islam',
                'slug' => 'nadia-islam',
                'designation' => 'Project Manager',
                'department' => 'Operations',
                'team_type' => 'technical',
                'short_bio' => 'Certified Scrum Master with 8 years experience.',
                'email' => 'nadia@konok.io',
                'is_featured' => false,
                'is_active' => true,
                'order' => 6,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(['slug' => $member['slug']], $member);
        }
    }

    private function seedFaqs()
    {
        $faqs = [
            ['category' => 'General', 'question' => 'What services does KONOK offer?', 'answer' => 'KONOK offers a wide range of technology services including web development, mobile app development, cloud solutions, AI integration, cybersecurity, and more.', 'order' => 1],
            ['category' => 'General', 'question' => 'How long does a typical project take?', 'answer' => 'Project timelines vary based on complexity. A simple website might take 4-8 weeks, while complex enterprise solutions can take 3-6 months.', 'order' => 2],
            ['category' => 'General', 'question' => 'Do you provide post-project support?', 'answer' => 'Yes, we provide comprehensive post-project support including maintenance, updates, and technical assistance.', 'order' => 3],
            ['category' => 'Pricing', 'question' => 'Do you offer custom pricing?', 'answer' => 'Yes, we provide custom pricing based on your specific requirements. Contact us for a detailed quote.', 'order' => 1],
            ['category' => 'Pricing', 'question' => 'What payment methods do you accept?', 'answer' => 'We accept bank transfer, credit card, and PayPal. For enterprise clients, we offer flexible payment plans.', 'order' => 2],
            ['category' => 'Support', 'question' => 'What kind of support do you provide?', 'answer' => 'We provide 24/7 technical support, regular maintenance, and updates for all our solutions.', 'order' => 1],
            ['category' => 'Support', 'question' => 'Do you offer training for your solutions?', 'answer' => 'Yes, we provide comprehensive training sessions for your team to ensure smooth adoption.', 'order' => 2],
            ['category' => 'Process', 'question' => 'How do we start a project?', 'answer' => 'Simply contact us through our form or schedule a call. We will discuss your requirements and provide a detailed proposal.', 'order' => 1],
            ['category' => 'Process', 'question' => 'What is your development methodology?', 'answer' => 'We follow Agile methodology with regular sprints, demos, and iterative development for transparent collaboration.', 'order' => 2],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], array_merge($faq, ['is_active' => true]));
        }
    }

    private function seedJobDepartments()
    {
        $departments = [
            ['name' => 'Technology', 'slug' => 'technology', 'description' => 'Software development and technical teams', 'order' => 1],
            ['name' => 'Design', 'slug' => 'design', 'description' => 'UI/UX and graphic design teams', 'order' => 2],
            ['name' => 'Marketing', 'slug' => 'marketing', 'description' => 'Digital marketing and sales teams', 'order' => 3],
            ['name' => 'Operations', 'slug' => 'operations', 'description' => 'Project management and operations', 'order' => 4],
            ['name' => 'Human Resources', 'slug' => 'hr', 'description' => 'HR and administrative teams', 'order' => 5],
        ];

        foreach ($departments as $dept) {
            JobDepartment::updateOrCreate(['slug' => $dept['slug']], array_merge($dept, ['is_active' => true]));
        }
    }

    private function seedJobLocations()
    {
        $locations = [
            ['name' => 'Dhaka (Head Office)', 'slug' => 'dhaka', 'city' => 'Dhaka', 'country' => 'Bangladesh', 'order' => 1, 'is_active' => true],
            ['name' => 'Chittagong', 'slug' => 'chittagong', 'city' => 'Chittagong', 'country' => 'Bangladesh', 'order' => 2, 'is_active' => true],
            ['name' => 'Remote', 'slug' => 'remote', 'city' => 'Anywhere', 'country' => 'Worldwide', 'is_remote' => true, 'order' => 3, 'is_active' => true],
        ];

        foreach ($locations as $loc) {
            JobLocation::updateOrCreate(['slug' => $loc['slug']], $loc);
        }
    }

    private function seedCareers()
    {
        $departments = JobDepartment::whereIn('slug', ['technology', 'design', 'marketing'])->get();
        $locations = JobLocation::whereIn('slug', ['dhaka', 'remote'])->get();

        $careers = [
            [
                'title' => 'Senior Laravel Developer',
                'department_id' => $departments->firstWhere('slug', 'technology')?->id,
                'location_id' => $locations->firstWhere('slug', 'dhaka')?->id,
                'employment_type' => 'full-time',
                'experience_level' => 'senior',
                'short_description' => 'We are looking for an experienced Laravel developer to join our team.',
                'requirements' => "5+ years of Laravel experience\nStrong knowledge of PHP\nExperience with REST APIs\nDatabase design skills",
                'responsibilities' => "Develop web applications\nCollaborate with team\nCode review\nMentor junior developers",
                'order' => 1,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'React Developer',
                'department_id' => $departments->firstWhere('slug', 'technology')?->id,
                'location_id' => $locations->firstWhere('slug', 'remote')?->id,
                'employment_type' => 'full-time',
                'experience_level' => 'mid',
                'short_description' => 'Join our team as a React developer and build amazing user interfaces.',
                'requirements' => "3+ years React experience\nStrong JavaScript skills\nRedux or Context API\nResponsive design",
                'order' => 2,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'title' => 'UI/UX Designer',
                'department_id' => $departments->firstWhere('slug', 'design')?->id,
                'location_id' => $locations->firstWhere('slug', 'dhaka')?->id,
                'employment_type' => 'full-time',
                'experience_level' => 'mid',
                'short_description' => 'Create beautiful and user-friendly designs for our clients.',
                'requirements' => "Figma expertise\nPortfolio required\nUser research skills\nPrototyping experience",
                'order' => 3,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Digital Marketing Specialist',
                'department_id' => $departments->firstWhere('slug', 'marketing')?->id,
                'location_id' => $locations->firstWhere('slug', 'dhaka')?->id,
                'employment_type' => 'full-time',
                'experience_level' => 'mid',
                'short_description' => 'Drive our digital marketing efforts and grow our online presence.',
                'requirements' => "SEO/SEM knowledge\nGoogle Analytics\Content strategy\nSocial media expertise",
                'order' => 4,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'title' => 'Flutter Developer (Intern)',
                'department_id' => $departments->firstWhere('slug', 'technology')?->id,
                'location_id' => $locations->firstWhere('slug', 'remote')?->id,
                'employment_type' => 'internship',
                'experience_level' => 'entry',
                'short_description' => 'Start your career as a Flutter developer in our supportive environment.',
                'requirements' => "Dart programming basics\nMobile app interest\nEagerness to learn\nComputer Science background",
                'order' => 5,
                'is_featured' => false,
                'is_active' => true,
            ],
        ];

        foreach ($careers as $career) {
            Career::updateOrCreate(['title' => $career['title']], $career);
        }
    }
}
