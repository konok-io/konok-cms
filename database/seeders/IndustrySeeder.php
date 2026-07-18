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
                'description' => '<p>Transform healthcare with our cutting-edge digital solutions. We help hospitals, clinics, and healthcare providers deliver better patient care through innovative technology.</p>
                
                <h5>Our Healthcare Solutions</h5>
                <ul>
                    <li>Patient Management Systems</li>
                    <li>Telemedicine Platforms</li>
                    <li>Electronic Health Records (EHR)</li>
                    <li>Appointment Scheduling Systems</li>
                    <li>Medical Billing & Insurance Integration</li>
                    <li>Healthcare Analytics Dashboards</li>
                </ul>
                
                <p>We understand the unique challenges of the healthcare industry and provide HIPAA-compliant solutions that prioritize data security and patient privacy.</p>',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'E-commerce',
                'slug' => 'e-commerce',
                'icon' => 'fas fa-shopping-cart',
                'description' => '<p>Build powerful online stores that drive sales and deliver exceptional shopping experiences. Our e-commerce solutions help businesses of all sizes succeed in the digital marketplace.</p>
                
                <h5>Our E-commerce Solutions</h5>
                <ul>
                    <li>Custom E-commerce Platforms</li>
                    <li>Multi-vendor Marketplaces</li>
                    <li>Inventory Management Systems</li>
                    <li>Payment Gateway Integration</li>
                    <li>Customer Loyalty Programs</li>
                    <li>Analytics & Reporting Tools</li>
                </ul>
                
                <p>From small startups to enterprise retailers, we provide scalable solutions that grow with your business.</p>',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Finance',
                'slug' => 'finance',
                'icon' => 'fas fa-chart-line',
                'description' => '<p>Modernize financial services with secure, compliant, and efficient digital solutions. We work with banks, fintech companies, and financial institutions to drive innovation.</p>
                
                <h5>Our Finance Solutions</h5>
                <ul>
                    <li>Online Banking Platforms</li>
                    <li>Payment Processing Systems</li>
                    <li>Investment Management Tools</li>
                    <li>Risk Assessment Software</li>
                    <li>Regulatory Compliance Systems</li>
                    <li>Financial Analytics Dashboards</li>
                </ul>
                
                <p>Security is our top priority. Our solutions meet PCI-DSS standards and regulatory requirements.</p>',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Education',
                'slug' => 'education',
                'icon' => 'fas fa-graduation-cap',
                'description' => '<p>Revolutionize learning with interactive digital experiences. We help educational institutions, edtech companies, and training organizations enhance their teaching methods.</p>
                
                <h5>Our Education Solutions</h5>
                <ul>
                    <li>Learning Management Systems (LMS)</li>
                    <li>E-learning Platforms</li>
                    <li>Student Information Systems</li>
                    <li>Online Examination Systems</li>
                    <li>Virtual Classroom Solutions</li>
                    <li>Educational Mobile Apps</li>
                </ul>
                
                <p>Our solutions support all learning styles and accessibility requirements, making education more inclusive.</p>',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Manufacturing',
                'slug' => 'manufacturing',
                'icon' => 'fas fa-industry',
                'description' => '<p>Optimize production processes and supply chain operations with smart manufacturing solutions. We help manufacturers improve efficiency and reduce costs.</p>
                
                <h5>Our Manufacturing Solutions</h5>
                <ul>
                    <li>ERP Systems for Manufacturing</li>
                    <li>Inventory & Warehouse Management</li>
                    <li>Production Planning Tools</li>
                    <li>Quality Control Systems</li>
                    <li>IoT Integration & Monitoring</li>
                    <li>Predictive Maintenance Platforms</li>
                </ul>
                
                <p>Our solutions integrate seamlessly with existing machinery and systems, minimizing disruption during implementation.</p>',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Real Estate',
                'slug' => 'real-estate',
                'icon' => 'fas fa-home',
                'description' => '<p>Transform property transactions with digital solutions that streamline operations and enhance customer experiences. We serve real estate agencies, property managers, and developers.</p>
                
                <h5>Our Real Estate Solutions</h5>
                <ul>
                    <li>Property Listing Platforms</li>
                    <li>Virtual Property Tours</li>
                    <li>CRM for Real Estate</li>
                    <li>Rental Management Systems</li>
                    <li>Document Management Tools</li>
                    <li>Lead Generation Platforms</li>
                </ul>
                
                <p>Our solutions help you close deals faster and manage properties more efficiently.</p>',
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
