<?php

namespace App\Http\Controllers\Premium;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Career;
use App\Models\Client;
use App\Models\CompanyProfile;
use App\Models\Industry;
use App\Models\Partner;
use App\Models\Project;
use App\Models\Service;
use App\Models\Setting;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class PremiumHomeController extends Controller
{
    /**
     * Display the premium home page
     */
    public function index()
    {
        // Get company profile
        $companyProfile = CompanyProfile::first();
        
        // Get site settings
        $siteSetting = Setting::first();
        
        // Get services
        $services = Service::active()
            ->orderBy('order')
            ->limit(8)
            ->get();
        
        // Get featured projects
        $projects = Project::active()
            ->featured()
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();
        
        // Get testimonials
        $testimonials = Testimonial::active()
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
        
        // Get team members
        $teamMembers = TeamMember::active()
            ->where('team_type', 'management')
            ->orderBy('order')
            ->limit(4)
            ->get();
        
        // Get latest blog posts
        $blogs = Blog::active()
            ->published()
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();
        
        // Get clients
        $clients = Client::active()
            ->featured()
            ->orderBy('order')
            ->limit(10)
            ->get();
        
        // Get partners
        $partners = Partner::active()
            ->featured()
            ->orderBy('order')
            ->limit(10)
            ->get();
        
        // Get industries
        $industries = Industry::active()
            ->orderBy('order')
            ->limit(6)
            ->get();
        
        // Get career openings
        $careers = Career::active()
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();
        
        return view('premium.pages.home', compact(
            'companyProfile',
            'siteSetting',
            'services',
            'projects',
            'testimonials',
            'teamMembers',
            'blogs',
            'clients',
            'partners',
            'industries',
            'careers'
        ));
    }
}
