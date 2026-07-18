<?php

namespace Database\Seeders;

use App\Models\KnowledgeArticle;
use App\Models\KnowledgeCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KnowledgeSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedCategories();
        $this->seedArticles();
        
        $this->command->info('Knowledge Base demo data seeded successfully!');
    }

    private function seedCategories()
    {
        $categories = [
            [
                'name' => 'Getting Started',
                'slug' => 'getting-started',
                'description' => 'Quick start guides and tutorials for new users.',
                'icon' => 'fas fa-rocket',
                'order' => 1,
            ],
            [
                'name' => 'How-To Guides',
                'slug' => 'how-to-guides',
                'description' => 'Step-by-step guides for common tasks.',
                'icon' => 'fas fa-book-open',
                'order' => 2,
            ],
            [
                'name' => 'Troubleshooting',
                'slug' => 'troubleshooting',
                'description' => 'Solutions to common problems and FAQs.',
                'icon' => 'fas fa-tools',
                'order' => 3,
            ],
            [
                'name' => 'Best Practices',
                'slug' => 'best-practices',
                'description' => 'Industry best practices and recommendations.',
                'icon' => 'fas fa-star',
                'order' => 4,
            ],
            [
                'name' => 'API Documentation',
                'slug' => 'api-documentation',
                'description' => 'Technical API documentation and references.',
                'icon' => 'fas fa-code',
                'order' => 5,
            ],
        ];

        foreach ($categories as $category) {
            KnowledgeCategory::updateOrCreate(
                ['slug' => $category['slug']],
                array_merge($category, ['is_active' => true])
            );
        }
    }

    private function seedArticles()
    {
        $articles = [
            // Getting Started
            [
                'category' => 'getting-started',
                'title' => 'Quick Start Guide',
                'type' => 'documentation',
                'author' => 'KONOK Team',
                'short_description' => 'Get up and running with our platform in just a few minutes.',
                'content' => '<h2>Welcome to KONOK</h2><p>This guide will help you get started with our platform quickly and easily.</p><h3>Step 1: Create an Account</h3><p>Visit our registration page and fill in your details to create your account.</p><h3>Step 2: Configure Your Profile</h3><p>Set up your profile with your company information and preferences.</p><h3>Step 3: Explore Features</h3><p>Discover all the powerful features available to you.</p>',
                'tags' => ['guide', 'beginner', 'setup'],
                'read_time' => 5,
                'is_featured' => true,
                'is_published' => true,
                'order' => 1,
            ],
            [
                'category' => 'getting-started',
                'title' => 'Platform Overview',
                'type' => 'documentation',
                'author' => 'KONOK Team',
                'short_description' => 'Learn about all the key features and capabilities.',
                'content' => '<h2>Platform Overview</h2><p>Our platform offers a comprehensive set of tools for managing your business online.</p><h3>Dashboard</h3><p>The main dashboard gives you an overview of all your activities.</p><h3>Content Management</h3><p>Easy-to-use tools for managing your website content.</p>',
                'tags' => ['overview', 'features'],
                'read_time' => 10,
                'is_featured' => true,
                'is_published' => true,
                'order' => 2,
            ],
            // How-To Guides
            [
                'category' => 'how-to-guides',
                'title' => 'How to Add a New Page',
                'type' => 'documentation',
                'author' => 'KONOK Team',
                'short_description' => 'Step-by-step guide to creating new pages on your website.',
                'content' => '<h2>Adding a New Page</h2><p>Follow these steps to create a new page:</p><ol><li>Navigate to the Pages section</li><li>Click the "Add New" button</li><li>Enter your page title and content</li><li>Configure SEO settings</li><li>Click Publish</li></ol>',
                'tags' => ['pages', 'cms', 'tutorial'],
                'read_time' => 5,
                'is_featured' => false,
                'is_published' => true,
                'order' => 1,
            ],
            [
                'category' => 'how-to-guides',
                'title' => 'Setting Up Email Notifications',
                'type' => 'documentation',
                'author' => 'KONOK Team',
                'short_description' => 'Configure email notifications for your account.',
                'content' => '<h2>Email Notifications</h2><p>Set up email notifications to stay updated.</p><h3>Configuration Steps</h3><p>Navigate to Settings > Notifications to configure your preferences.</p>',
                'tags' => ['email', 'notifications', 'settings'],
                'read_time' => 3,
                'is_featured' => false,
                'is_published' => true,
                'order' => 2,
            ],
            // Troubleshooting
            [
                'category' => 'troubleshooting',
                'title' => 'Login Issues',
                'type' => 'documentation',
                'author' => 'KONOK Team',
                'short_description' => 'Solutions for common login problems.',
                'content' => '<h2>Login Troubleshooting</h2><p>If you are having trouble logging in, try these solutions:</p><ul><li>Reset your password</li><li>Clear your browser cache</li><li>Try a different browser</li><li>Contact support if the issue persists</li></ul>',
                'tags' => ['login', 'password', 'troubleshooting'],
                'read_time' => 3,
                'is_featured' => true,
                'is_published' => true,
                'order' => 1,
            ],
            [
                'category' => 'troubleshooting',
                'title' => 'Page Not Loading',
                'type' => 'documentation',
                'author' => 'KONOK Team',
                'short_description' => 'What to do when a page fails to load.',
                'content' => '<h2>Page Loading Issues</h2><p>If a page is not loading properly:</p><ol><li>Refresh the page</li><li>Check your internet connection</li><li>Try clearing cache</li><li>Report the issue if it persists</li></ol>',
                'tags' => ['loading', 'performance', 'troubleshooting'],
                'read_time' => 4,
                'is_featured' => false,
                'is_published' => true,
                'order' => 2,
            ],
            // Best Practices
            [
                'category' => 'best-practices',
                'title' => 'Security Best Practices',
                'type' => 'documentation',
                'author' => 'KONOK Team',
                'short_description' => 'Essential security practices for your account.',
                'content' => '<h2>Security Best Practices</h2><p>Protect your account with these best practices:</p><ul><li>Use a strong, unique password</li><li>Enable two-factor authentication</li><li>Regularly review account activity</li><li>Keep your email updated</li></ul>',
                'tags' => ['security', 'best-practices', 'authentication'],
                'read_time' => 6,
                'is_featured' => true,
                'is_published' => true,
                'order' => 1,
            ],
            [
                'category' => 'best-practices',
                'title' => 'SEO Optimization Tips',
                'type' => 'documentation',
                'author' => 'KONOK Team',
                'short_description' => 'Improve your search engine rankings.',
                'content' => '<h2>SEO Optimization</h2><p>Follow these tips to improve your SEO:</p><ul><li>Use descriptive titles and meta descriptions</li><li>Optimize your content with relevant keywords</li><li>Use proper heading structures</li><li>Add alt text to images</li></ul>',
                'tags' => ['seo', 'optimization', 'marketing'],
                'read_time' => 8,
                'is_featured' => false,
                'is_published' => true,
                'order' => 2,
            ],
            // API Documentation
            [
                'category' => 'api-documentation',
                'title' => 'API Authentication',
                'type' => 'documentation',
                'author' => 'KONOK Team',
                'short_description' => 'Learn how to authenticate with our API.',
                'content' => '<h2>API Authentication</h2><p>Our API uses Bearer token authentication.</p><h3>Getting Your API Key</h3><p>Navigate to Settings > API to generate your API key.</p><h3>Making Authenticated Requests</h3><pre>curl -H "Authorization: Bearer YOUR_TOKEN" https://api.example.com/v1/data</pre>',
                'tags' => ['api', 'authentication', 'developer'],
                'read_time' => 7,
                'is_featured' => true,
                'is_published' => true,
                'order' => 1,
            ],
            [
                'category' => 'api-documentation',
                'title' => 'Rate Limiting',
                'type' => 'documentation',
                'author' => 'KONOK Team',
                'short_description' => 'Understanding API rate limits.',
                'content' => '<h2>Rate Limiting</h2><p>Our API has rate limits to ensure fair usage.</p><h3>Limits</h3><ul><li>Free tier: 100 requests per minute</li><li>Pro tier: 1000 requests per minute</li><li>Enterprise: Custom limits</li></ul>',
                'tags' => ['api', 'rate-limiting', 'developer'],
                'read_time' => 4,
                'is_featured' => false,
                'is_published' => true,
                'order' => 2,
            ],
        ];

        foreach ($articles as $article) {
            $category = KnowledgeCategory::where('slug', $article['category'])->first();
            
            if ($category) {
                KnowledgeArticle::updateOrCreate(
                    ['slug' => Str::slug($article['title'])],
                    [
                        'category_id' => $category->id,
                        'title' => $article['title'],
                        'type' => $article['type'],
                        'author' => $article['author'],
                        'short_description' => $article['short_description'],
                        'content' => $article['content'],
                        'tags' => $article['tags'],
                        'read_time' => $article['read_time'],
                        'is_featured' => $article['is_featured'],
                        'is_published' => $article['is_published'],
                        'order' => $article['order'],
                        'is_active' => true,
                    ]
                );
            }
        }
    }
}
