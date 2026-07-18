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
                'image' => 'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=800&h=500&fit=crop',
                'description' => '<p>Transform healthcare with our cutting-edge digital solutions. We help hospitals, clinics, and healthcare providers deliver better patient care through innovative technology. Our comprehensive suite of healthcare software solutions streamlines operations, improves patient outcomes, and reduces costs.</p>
                
                <h5>Our Healthcare Solutions</h5>
                <ul>
                    <li>Patient Management Systems</li>
                    <li>Telemedicine Platforms</li>
                    <li>Electronic Health Records (EHR)</li>
                    <li>Appointment Scheduling Systems</li>
                    <li>Medical Billing & Insurance Integration</li>
                    <li>Healthcare Analytics Dashboards</li>
                </ul>
                
                <p>We understand the unique challenges of the healthcare industry and provide HIPAA-compliant solutions that prioritize data security and patient privacy. Our team of healthcare technology experts works closely with medical professionals to deliver solutions that make a real difference.</p>',
                'solutions' => json_encode([
                    ['icon' => 'fas fa-users', 'title' => '500+ Healthcare Facilities'],
                    ['icon' => 'fas fa-heartbeat', 'title' => '1M+ Patients Served'],
                    ['icon' => 'fas fa-clock', 'title' => '24/7 Support'],
                    ['icon' => 'fas fa-shield-alt', 'title' => 'HIPAA Compliant'],
                ]),
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'E-commerce',
                'slug' => 'e-commerce',
                'icon' => 'fas fa-shopping-cart',
                'image' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?w=800&h=500&fit=crop',
                'description' => '<p>Build powerful online stores that drive sales and deliver exceptional shopping experiences. Our e-commerce solutions help businesses of all sizes succeed in the digital marketplace. From startups to enterprise retailers, we provide scalable platforms that convert visitors into loyal customers.</p>
                
                <h5>Our E-commerce Solutions</h5>
                <ul>
                    <li>Custom E-commerce Platforms</li>
                    <li>Multi-vendor Marketplaces</li>
                    <li>Inventory Management Systems</li>
                    <li>Payment Gateway Integration</li>
                    <li>Customer Loyalty Programs</li>
                    <li>Analytics & Reporting Tools</li>
                </ul>
                
                <p>Our solutions include seamless payment processing, inventory management, and powerful analytics to help you understand your customers and grow your business.</p>',
                'solutions' => json_encode([
                    ['icon' => 'fas fa-shopping-bag', 'title' => '200+ Online Stores'],
                    ['icon' => 'fas fa-dollar-sign', 'title' => '$50M+ Sales Processed'],
                    ['icon' => 'fas fa-star', 'title' => '4.9 Average Rating'],
                    ['icon' => 'fas fa-sync', 'title' => '99.9% Uptime'],
                ]),
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Finance',
                'slug' => 'finance',
                'icon' => 'fas fa-chart-line',
                'image' => 'https://images.unsplash.com/photo-1553729459-efe14ef6055d?w=800&h=500&fit=crop',
                'description' => '<p>Modernize financial services with secure, compliant, and efficient digital solutions. We work with banks, fintech companies, and financial institutions to drive innovation while maintaining the highest security standards. Our solutions help you stay competitive in a rapidly evolving financial landscape.</p>
                
                <h5>Our Finance Solutions</h5>
                <ul>
                    <li>Online Banking Platforms</li>
                    <li>Payment Processing Systems</li>
                    <li>Investment Management Tools</li>
                    <li>Risk Assessment Software</li>
                    <li>Regulatory Compliance Systems</li>
                    <li>Financial Analytics Dashboards</li>
                </ul>
                
                <p>Security is our top priority. Our solutions meet PCI-DSS standards and regulatory requirements, ensuring your customers data is always protected.</p>',
                'solutions' => json_encode([
                    ['icon' => 'fas fa-university', 'title' => '50+ Financial Institutions'],
                    ['icon' => 'fas fa-lock', 'title' => 'Bank-Grade Security'],
                    ['icon' => 'fas fa-file-invoice-dollar', 'title' => 'PCI-DSS Compliant'],
                    ['icon' => 'fas fa-chart-bar', 'title' => 'Real-time Analytics'],
                ]),
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Education',
                'slug' => 'education',
                'icon' => 'fas fa-graduation-cap',
                'image' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800&h=500&fit=crop',
                'description' => '<p>Revolutionize learning with interactive digital experiences. We help educational institutions, edtech companies, and training organizations enhance their teaching methods and reach more students. Our solutions make education more accessible, engaging, and effective.</p>
                
                <h5>Our Education Solutions</h5>
                <ul>
                    <li>Learning Management Systems (LMS)</li>
                    <li>E-learning Platforms</li>
                    <li>Student Information Systems</li>
                    <li>Online Examination Systems</li>
                    <li>Virtual Classroom Solutions</li>
                    <li>Educational Mobile Apps</li>
                </ul>
                
                <p>Our solutions support all learning styles and accessibility requirements, making education more inclusive for students of all abilities.</p>',
                'solutions' => json_encode([
                    ['icon' => 'fas fa-graduation-cap', 'title' => '100+ Educational Institutions'],
                    ['icon' => 'fas fa-user-graduate', 'title' => '500K+ Students'],
                    ['icon' => 'fas fa-globe', 'title' => '20+ Countries'],
                    ['icon' => 'fas fa-award', 'title' => 'Award Winning LMS'],
                ]),
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Manufacturing',
                'slug' => 'manufacturing',
                'icon' => 'fas fa-industry',
                'image' => 'https://images.unsplash.com/photo-1565793979107-ed3a3085e8f5?w=800&h=500&fit=crop',
                'description' => '<p>Optimize production processes and supply chain operations with smart manufacturing solutions. We help manufacturers improve efficiency, reduce costs, and stay competitive in the global marketplace. Our Industry 4.0 solutions bring your operations into the digital age.</p>
                
                <h5>Our Manufacturing Solutions</h5>
                <ul>
                    <li>ERP Systems for Manufacturing</li>
                    <li>Inventory & Warehouse Management</li>
                    <li>Production Planning Tools</li>
                    <li>Quality Control Systems</li>
                    <li>IoT Integration & Monitoring</li>
                    <li>Predictive Maintenance Platforms</li>
                </ul>
                
                <p>Our solutions integrate seamlessly with existing machinery and systems, minimizing disruption during implementation and maximizing ROI.</p>',
                'solutions' => json_encode([
                    ['icon' => 'fas fa-cogs', 'title' => '150+ Manufacturing Plants'],
                    ['icon' => 'fas fa-industry', 'title' => '30% Efficiency Boost'],
                    ['icon' => 'fas fa-microchip', 'title' => 'IoT Integration'],
                    ['icon' => 'fas fa-chart-line', 'title' => '25% Cost Reduction'],
                ]),
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Real Estate',
                'slug' => 'real-estate',
                'icon' => 'fas fa-home',
                'image' => 'https://images.unsplash.com/photo-1560518883-ce09059eeffa?w=800&h=500&fit=crop',
                'description' => '<p>Transform property transactions with digital solutions that streamline operations and enhance customer experiences. We serve real estate agencies, property managers, and developers with comprehensive software that closes deals faster and manages properties more efficiently.</p>
                
                <h5>Our Real Estate Solutions</h5>
                <ul>
                    <li>Property Listing Platforms</li>
                    <li>Virtual Property Tours</li>
                    <li>CRM for Real Estate</li>
                    <li>Rental Management Systems</li>
                    <li>Document Management Tools</li>
                    <li>Lead Generation Platforms</li>
                </ul>
                
                <p>Our solutions help you close deals faster, manage properties more efficiently, and provide exceptional service to your clients.</p>',
                'solutions' => json_encode([
                    ['icon' => 'fas fa-building', 'title' => '300+ Real Estate Firms'],
                    ['icon' => 'fas fa-home', 'title' => '10K+ Properties Listed'],
                    ['icon' => 'fas fa-hand-holding-usd', 'title' => '$1B+ Transactions'],
                    ['icon' => 'fas fa-calendar-check', 'title' => '50% Faster Sales'],
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
