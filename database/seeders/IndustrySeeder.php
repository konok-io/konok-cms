<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Industry;

class IndustrySeeder extends Seeder
{
    public function run()
    {
        $industries = [
            [
                'name' => 'Healthcare',
                'slug' => 'healthcare',
                'icon' => 'fas fa-hospital',
                'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=1200&h=600&fit=crop',
                'description' => '<p>Transform healthcare with our cutting-edge digital solutions. We help hospitals, clinics, and healthcare providers deliver better patient care through innovative technology. Our comprehensive suite of healthcare software solutions streamlines operations, improves patient outcomes, and reduces costs.</p>

                <p>With over a decade of experience in healthcare technology, we understand the unique challenges medical professionals face daily. Our solutions are designed by healthcare experts who know the industry inside and out.</p>

                <h5>Our Healthcare Solutions</h5>
                <ul>
                    <li>Patient Management Systems - Streamline patient registration, scheduling, and medical records</li>
                    <li>Telemedicine Platforms - Virtual consultations with secure video conferencing</li>
                    <li>Electronic Health Records (EHR) - Comprehensive digital medical records</li>
                    <li>Appointment Scheduling Systems - Online booking with automated reminders</li>
                    <li>Medical Billing & Insurance Integration - Simplified billing and claims processing</li>
                    <li>Healthcare Analytics Dashboards - Real-time insights for better decision making</li>
                </ul>

                <h5>Why Choose Us for Healthcare?</h5>
                <ul>
                    <li>HIPAA Compliant Solutions - Your patient data is always secure</li>
                    <li>Seamless Integration - Works with your existing systems</li>
                    <li>24/7 Technical Support - We are always here when you need us</li>
                    <li>Scalable Architecture - Grow your practice without technology limits</li>
                </ul>

                <p>Join 500+ healthcare facilities that trust us to power their digital transformation journey.</p>',
                'solutions' => json_encode([
                    ['icon' => 'fas fa-hospital', 'title' => '500+ Healthcare Facilities'],
                    ['icon' => 'fas fa-heartbeat', 'title' => '1M+ Patients Served'],
                    ['icon' => 'fas fa-clock', 'title' => '24/7 Support'],
                    ['icon' => 'fas fa-shield-alt', 'title' => 'HIPAA Compliant'],
                    ['icon' => 'fas fa-stethoscope', 'title' => '50+ Integrations'],
                    ['icon' => 'fas fa-user-md', 'title' => '2000+ Doctors'],
                ]),
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'E-commerce',
                'slug' => 'e-commerce',
                'icon' => 'fas fa-shopping-cart',
                'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=1200&h=600&fit=crop',
                'description' => '<p>Build powerful online stores that drive sales and deliver exceptional shopping experiences. Our e-commerce solutions help businesses of all sizes succeed in the digital marketplace. From startups to enterprise retailers, we provide scalable platforms that convert visitors into loyal customers.</p>

                <p>We have helped hundreds of businesses launch and scale their online presence. Our team of e-commerce specialists combines technical expertise with deep understanding of consumer behavior to create shopping experiences that sell.</p>

                <h5>Our E-commerce Solutions</h5>
                <ul>
                    <li>Custom E-commerce Platforms - Bespoke online stores built for your brand</li>
                    <li>Multi-vendor Marketplaces - Platform for multiple sellers with vendor management</li>
                    <li>Inventory Management Systems - Real-time stock tracking and management</li>
                    <li>Payment Gateway Integration - Secure payments with 50+ payment options</li>
                    <li>Customer Loyalty Programs - Reward your repeat customers</li>
                    <li>Analytics & Reporting Tools - Understand your customers and optimize sales</li>
                </ul>

                <h5>What Sets Us Apart?</h5>
                <ul>
                    <li>Mobile-First Design - Your store looks great on all devices</li>
                    <li>SEO Optimized - Get found on Google naturally</li>
                    <li>Fast Loading - Optimized for speed and conversions</li>
                    <li>Secure Payments - PCI-DSS compliant payment processing</li>
                </ul>

                <p>Start selling online today and join 200+ successful stores we have launched.</p>',
                'solutions' => json_encode([
                    ['icon' => 'fas fa-shopping-bag', 'title' => '200+ Online Stores'],
                    ['icon' => 'fas fa-dollar-sign', 'title' => '$50M+ Sales Processed'],
                    ['icon' => 'fas fa-star', 'title' => '4.9 Average Rating'],
                    ['icon' => 'fas fa-sync', 'title' => '99.9% Uptime'],
                    ['icon' => 'fas fa-credit-card', 'title' => '50+ Payment Methods'],
                    ['icon' => 'fas fa-globe', 'title' => '30+ Countries'],
                ]),
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Finance',
                'slug' => 'finance',
                'icon' => 'fas fa-chart-line',
                'image' => 'https://images.unsplash.com/photo-1553729459-efe14ef6055d?w=1200&h=600&fit=crop',
                'description' => '<p>Modernize financial services with secure, compliant, and efficient digital solutions. We work with banks, fintech companies, and financial institutions to drive innovation while maintaining the highest security standards. Our solutions help you stay competitive in a rapidly evolving financial landscape.</p>

                <p>Our team has decades of combined experience in financial technology. We understand the complexities of regulatory compliance, security requirements, and the need for rock-solid reliability in the financial sector.</p>

                <h5>Our Finance Solutions</h5>
                <ul>
                    <li>Online Banking Platforms - Full-featured digital banking experience</li>
                    <li>Payment Processing Systems - Fast, secure payment processing</li>
                    <li>Investment Management Tools - Portfolio management and trading platforms</li>
                    <li>Risk Assessment Software - AI-powered risk analysis and management</li>
                    <li>Regulatory Compliance Systems - Automated compliance reporting</li>
                    <li>Financial Analytics Dashboards - Real-time business intelligence</li>
                </ul>

                <h5>Security & Compliance First</h5>
                <ul>
                    <li>Bank-Grade Encryption - Military-level security for all data</li>
                    <li>PCI-DSS Certified - Payment card industry compliance</li>
                    <li>Multi-Factor Authentication - Enhanced account security</li>
                    <li>Real-time Fraud Detection - AI-powered fraud prevention</li>
                </ul>

                <p>Trust 50+ financial institutions with their digital transformation.</p>',
                'solutions' => json_encode([
                    ['icon' => 'fas fa-university', 'title' => '50+ Financial Institutions'],
                    ['icon' => 'fas fa-lock', 'title' => 'Bank-Grade Security'],
                    ['icon' => 'fas fa-file-invoice-dollar', 'title' => 'PCI-DSS Compliant'],
                    ['icon' => 'fas fa-chart-bar', 'title' => 'Real-time Analytics'],
                    ['icon' => 'fas fa-shield-alt', 'title' => 'Fraud Prevention'],
                    ['icon' => 'fas fa-coins', 'title' => '$10B+ Transactions'],
                ]),
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Education',
                'slug' => 'education',
                'icon' => 'fas fa-graduation-cap',
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=1200&h=600&fit=crop',
                'description' => '<p>Revolutionize learning with interactive digital experiences. We help educational institutions, edtech companies, and training organizations enhance their teaching methods and reach more students. Our solutions make education more accessible, engaging, and effective.</p>

                <p>Education is evolving rapidly, and technology is at the forefront of this transformation. We help schools, universities, and training organizations embrace digital learning and reach students anywhere in the world.</p>

                <h5>Our Education Solutions</h5>
                <ul>
                    <li>Learning Management Systems (LMS) - Complete platform for online learning</li>
                    <li>E-learning Platforms - Interactive courses with multimedia content</li>
                    <li>Student Information Systems - Comprehensive student data management</li>
                    <li>Online Examination Systems - Secure online testing with anti-cheating</li>
                    <li>Virtual Classroom Solutions - Live classes with interactive features</li>
                    <li>Educational Mobile Apps - Learning on the go</li>
                </ul>

                <h5>Features That Make a Difference</h5>
                <ul>
                    <li>AI-Powered Recommendations - Personalized learning paths</li>
                    <li>Progress Tracking - Monitor student achievement in real-time</li>
                    <li>Offline Mode - Learn without internet connection</li>
                    <li>Accessibility Features - Support for all learners</li>
                </ul>

                <p>Empower 500,000+ students with our award-winning educational technology.</p>',
                'solutions' => json_encode([
                    ['icon' => 'fas fa-graduation-cap', 'title' => '100+ Educational Institutions'],
                    ['icon' => 'fas fa-user-graduate', 'title' => '500K+ Students'],
                    ['icon' => 'fas fa-globe', 'title' => '20+ Countries'],
                    ['icon' => 'fas fa-award', 'title' => 'Award Winning LMS'],
                    ['icon' => 'fas fa-video', 'title' => '1M+ Video Hours'],
                    ['icon' => 'fas fa-certificate', 'title' => '10K+ Certificates'],
                ]),
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Manufacturing',
                'slug' => 'manufacturing',
                'icon' => 'fas fa-industry',
                'image' => 'https://images.unsplash.com/photo-1565793979107-ed3a3085e8f5?w=1200&h=600&fit=crop',
                'description' => '<p>Optimize production processes and supply chain operations with smart manufacturing solutions. We help manufacturers improve efficiency, reduce costs, and stay competitive in the global marketplace. Our Industry 4.0 solutions bring your operations into the digital age.</p>

                <p>From small workshops to large-scale manufacturing plants, we provide solutions that scale with your business. Our team understands the unique challenges of modern manufacturing and delivers solutions that make a real impact on your bottom line.</p>

                <h5>Our Manufacturing Solutions</h5>
                <ul>
                    <li>ERP Systems for Manufacturing - Complete resource planning solution</li>
                    <li>Inventory & Warehouse Management - Real-time stock optimization</li>
                    <li>Production Planning Tools - Efficient scheduling and forecasting</li>
                    <li>Quality Control Systems - Maintain highest product standards</li>
                    <li>IoT Integration & Monitoring - Connected factory solutions</li>
                    <li>Predictive Maintenance Platforms - Reduce downtime with AI</li>
                </ul>

                <h5>Industry 4.0 Ready</h5>
                <ul>
                    <li>Real-time Factory Monitoring - Dashboard for all operations</li>
                    <li>Supply Chain Visibility - Track materials from source to delivery</li>
                    <li>Automated Reporting - Generate reports with one click</li>
                    <li>Energy Management - Reduce your carbon footprint</li>
                </ul>

                <p>Join 150+ manufacturers achieving operational excellence.</p>',
                'solutions' => json_encode([
                    ['icon' => 'fas fa-cogs', 'title' => '150+ Manufacturing Plants'],
                    ['icon' => 'fas fa-industry', 'title' => '30% Efficiency Boost'],
                    ['icon' => 'fas fa-microchip', 'title' => 'IoT Integration'],
                    ['icon' => 'fas fa-chart-line', 'title' => '25% Cost Reduction'],
                    ['icon' => 'fas fa-box', 'title' => '1M+ Products Tracked'],
                    ['icon' => 'fas fa-truck', 'title' => '500+ Suppliers'],
                ]),
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Real Estate',
                'slug' => 'real-estate',
                'icon' => 'fas fa-home',
                'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=1200&h=600&fit=crop',
                'description' => '<p>Transform property transactions with digital solutions that streamline operations and enhance customer experiences. We serve real estate agencies, property managers, and developers with comprehensive software that closes deals faster and manages properties more efficiently.</p>

                <p>Whether you are a small agency with a handful of properties or a large developer with thousands of units, our solutions scale to meet your needs. We help you manage listings, leads, tenants, and transactions all in one place.</p>

                <h5>Our Real Estate Solutions</h5>
                <ul>
                    <li>Property Listing Platforms - Beautiful listing pages with virtual tours</li>
                    <li>Virtual Property Tours - 360-degree immersive experiences</li>
                    <li>CRM for Real Estate - Track leads and close more deals</li>
                    <li>Rental Management Systems - Complete tenant management</li>
                    <li>Document Management Tools - Digital contracts and signatures</li>
                    <li>Lead Generation Platforms - Attract more qualified buyers</li>
                </ul>

                <h5>Powerful Features</h5>
                <ul>
                    <li>Automated Follow-ups - Never lose a lead again</li>
                    <li>Calendar Integration - Sync with Google and Outlook</li>
                    <li>Mobile App - Manage your business from anywhere</li>
                    <li>Analytics Dashboard - Know your numbers at a glance</li>
                </ul>

                <p>Help 300+ real estate firms close more deals with less effort.</p>',
                'solutions' => json_encode([
                    ['icon' => 'fas fa-building', 'title' => '300+ Real Estate Firms'],
                    ['icon' => 'fas fa-home', 'title' => '10K+ Properties Listed'],
                    ['icon' => 'fas fa-hand-holding-usd', 'title' => '$1B+ Transactions'],
                    ['icon' => 'fas fa-calendar-check', 'title' => '50% Faster Sales'],
                    ['icon' => 'fas fa-users', 'title' => '50K+ Active Tenants'],
                    ['icon' => 'fas fa-camera', 'title' => '5K+ Virtual Tours'],
                ]),
                'order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($industries as $industry) {
            Industry::updateOrCreate(
                ['slug' => $industry['slug']],
                $industry
            );
        }
    }
}
