<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Client;
use App\Models\Faq;
use App\Models\Industry;
use App\Models\Project;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\Solution;
use App\Models\TeamMember;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class CorporateHomeController extends Controller
{
    public function index()
    {
        $siteSetting = Setting::first();
        
        // Get company profile
        $companyProfile = null;
        if (\Illuminate\Support\Facades\Schema::hasTable('company_profiles')) {
            $companyProfile = \App\Models\CompanyProfile::first();
        }
        
        // Get featured services
        $services = Service::active()->ordered()->limit(6)->get();
        
        // Get featured projects
        $projects = Project::active()->featured()->ordered()->limit(6)->get();
        
        // Get team members
        $teamMembers = TeamMember::active()->featured()->ordered()->limit(4)->get();
        
        // Get testimonials
        $testimonials = Testimonial::active()->limit(3)->get();
        
        // Get clients
        $clients = Client::active()->featured()->ordered()->limit(8)->get();
        
        // Get recent blogs
        $blogs = Blog::active()->published()->orderBy('created_at', 'desc')->limit(3)->get();
        
        return view('corporate.pages.home', compact(
            'siteSetting',
            'companyProfile',
            'services',
            'projects',
            'teamMembers',
            'testimonials',
            'clients',
            'blogs'
        ));
    }

    public function about()
    {
        $siteSetting = Setting::first();
        
        $companyProfile = null;
        if (\Illuminate\Support\Facades\Schema::hasTable('company_profiles')) {
            $companyProfile = \App\Models\CompanyProfile::first();
        }
        
        $teamMembers = TeamMember::active()->ordered()->get();
        
        $testimonials = Testimonial::active()->limit(6)->get();
        
        return view('corporate.pages.about', compact(
            'siteSetting',
            'companyProfile',
            'teamMembers',
            'testimonials'
        ));
    }

    public function services()
    {
        $siteSetting = Setting::first();
        
        $categories = ServiceCategory::active()->ordered()->with(['services' => function($q) {
            $q->active();
        }])->get();
        
        $services = Service::active()->ordered()->get();
        
        return view('corporate.pages.services', compact(
            'siteSetting',
            'categories',
            'services'
        ));
    }

    public function serviceDetail($slug)
    {
        $siteSetting = Setting::first();
        $service = Service::where('slug', $slug)->firstOrFail();
        
        $relatedServices = Service::active()
            ->where('id', '!=', $service->id)
            ->where('category_id', $service->category_id)
            ->limit(4)
            ->get();
        
        return view('corporate.pages.service-detail', compact(
            'siteSetting',
            'service',
            'relatedServices'
        ));
    }

    public function serviceCategory($slug)
    {
        $siteSetting = Setting::first();
        $category = ServiceCategory::where('slug', $slug)->firstOrFail();
        $services = Service::active()->where('category_id', $category->id)->ordered()->get();
        
        return view('corporate.pages.services', compact(
            'siteSetting',
            'category',
            'services'
        ));
    }

    public function solutionType($type)
    {
        $siteSetting = Setting::first();
        $solutions = Solution::active()->ofType($type)->ordered()->get();
        
        return view('corporate.pages.solutions', compact(
            'siteSetting',
            'solutions',
            'type'
        ));
    }

    public function industry($slug)
    {
        $siteSetting = Setting::first();
        $industry = Industry::where('slug', $slug)->firstOrFail();
        
        return view('corporate.pages.industry', compact(
            'siteSetting',
            'industry'
        ));
    }

    public function projects()
    {
        $siteSetting = Setting::first();
        
        $projects = Project::active()->ordered()->with('category')->get();
        $categories = \App\Models\ProjectCategory::where('is_active', true)->get();
        
        return view('corporate.pages.projects', compact(
            'siteSetting',
            'projects',
            'categories'
        ));
    }

    public function projectDetail($slug)
    {
        $siteSetting = Setting::first();
        $project = Project::where('slug', $slug)->firstOrFail();
        
        return view('corporate.pages.project-detail', compact(
            'siteSetting',
            'project'
        ));
    }

    public function team()
    {
        $siteSetting = Setting::first();
        
        $leadership = TeamMember::active()->where('team_type', 'leadership')->ordered()->get();
        $management = TeamMember::active()->where('team_type', 'management')->ordered()->get();
        $technical = TeamMember::active()->where('team_type', 'technical')->ordered()->get();
        
        return view('corporate.pages.team', compact(
            'siteSetting',
            'leadership',
            'management',
            'technical'
        ));
    }

    public function contact()
    {
        $siteSetting = Setting::first();
        
        return view('corporate.pages.contact', compact('siteSetting'));
    }

    public function contactStore(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        \App\Models\ContactMessage::create($validated);

        return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }

    public function blog()
    {
        $siteSetting = Setting::first();
        
        $blogs = Blog::active()->published()->with('category')->orderBy('created_at', 'desc')->paginate(9);
        
        return view('corporate.pages.blog', compact('siteSetting', 'blogs'));
    }

    public function blogDetail($slug)
    {
        $siteSetting = Setting::first();
        $blog = Blog::where('slug', $slug)->firstOrFail();
        
        $relatedBlogs = Blog::active()->published()
            ->where('id', '!=', $blog->id)
            ->limit(3)
            ->get();
        
        return view('corporate.pages.blog-detail', compact(
            'siteSetting',
            'blog',
            'relatedBlogs'
        ));
    }

    public function solutions()
    {
        $siteSetting = Setting::first();
        
        $solutions = Solution::active()->ordered()->get();
        
        return view('corporate.pages.solutions', compact('siteSetting', 'solutions'));
    }

    public function industries()
    {
        $siteSetting = Setting::first();
        
        $industries = Industry::active()->ordered()->get();
        
        return view('corporate.pages.industries', compact('siteSetting', 'industries'));
    }

    public function careers()
    {
        $siteSetting = Setting::first();
        
        $careers = \App\Models\Career::active()->open()->ordered()->with(['department', 'location'])->get();
        
        return view('corporate.pages.careers', compact('siteSetting', 'careers'));
    }

    public function faqs()
    {
        $siteSetting = Setting::first();
        
        $faqs = Faq::active()->ordered()->get()->groupBy('category');
        
        return view('corporate.pages.faqs', compact('siteSetting', 'faqs'));
    }

    public function privacy()
    {
        $siteSetting = Setting::first();
        return view('corporate.pages.privacy', compact('siteSetting'));
    }

    public function terms()
    {
        $siteSetting = Setting::first();
        return view('corporate.pages.terms', compact('siteSetting'));
    }

    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $subscriber = \App\Models\Subscriber::firstOrCreate(
            ['email' => $validated['email']],
            ['is_active' => true]
        );

        return response()->json([
            'success' => true,
            'message' => 'Thank you for subscribing to our newsletter!'
        ]);
    }
}
