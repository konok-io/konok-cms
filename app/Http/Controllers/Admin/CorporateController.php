<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
use App\Models\Skill;
use App\Models\SocialLink;
use App\Models\Solution;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CorporateController extends Controller
{
    // ==================== Company Profile ====================
    public function companyProfileEdit()
    {
        $profile = CompanyProfile::first() ?? new CompanyProfile();
        return view('admin.corporate.company-profile', compact('profile'));
    }

    public function companyProfileUpdate(Request $request)
    {
        $data = $request->validate([
            'company_name' => 'required|string|max:255',
            'short_name' => 'nullable|string|max:50',
            'tagline' => 'nullable|string|max:500',
            'description' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'core_values' => 'nullable|string',
            'achievements' => 'nullable|string',
            'founded_year' => 'nullable|string',
            'employees_count' => 'nullable|integer',
            'address' => 'nullable|string',
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'website' => 'nullable|string',
            'logo' => 'nullable|string',
            'favicon' => 'nullable|string',
            'is_active' => 'boolean',
        ]);

        $profile = CompanyProfile::first();
        if ($profile) {
            $profile->update($data);
        } else {
            CompanyProfile::create($data);
        }

        return redirect()->back()->with('success', 'Company profile updated successfully!');
    }

    // ==================== Hero Sections ====================
    public function heroSectionsIndex()
    {
        $heroes = HeroSection::orderBy('order')->get();
        return view('admin.corporate.hero-sections', compact('heroes'));
    }

    public function heroSectionStore(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string',
            'button_url' => 'nullable|string',
            'background_image' => 'nullable|string',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        HeroSection::create($data);
        return redirect()->back()->with('success', 'Hero section created successfully!');
    }

    public function heroSectionDestroy($id)
    {
        HeroSection::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Hero section deleted successfully!');
    }

    // ==================== Social Links ====================
    public function socialLinksIndex()
    {
        $socialLinks = SocialLink::orderBy('order')->get();
        return view('admin.corporate.social-links', compact('socialLinks'));
    }

    public function socialLinkStore(Request $request)
    {
        $data = $request->validate([
            'platform' => 'required|string|max:50',
            'url' => 'required|url',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        SocialLink::create($data);
        return redirect()->back()->with('success', 'Social link created successfully!');
    }

    public function socialLinkDestroy($id)
    {
        SocialLink::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Social link deleted successfully!');
    }

    // ==================== Service Categories ====================
    public function serviceCategoriesIndex()
    {
        $categories = ServiceCategory::orderBy('order')->get();
        return view('admin.corporate.service-categories', compact('categories'));
    }

    public function serviceCategoryStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|string',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        ServiceCategory::create($data);
        return redirect()->back()->with('success', 'Service category created successfully!');
    }

    public function serviceCategoryDestroy($id)
    {
        ServiceCategory::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Service category deleted successfully!');
    }

    // ==================== Industries ====================
    public function industriesIndex()
    {
        $industries = Industry::orderBy('order')->get();
        return view('admin.corporate.industries', compact('industries'));
    }

    public function industryStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|string',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        Industry::create($data);
        return redirect()->back()->with('success', 'Industry created successfully!');
    }

    public function industryDestroy($id)
    {
        Industry::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Industry deleted successfully!');
    }

    // ==================== Solutions ====================
    public function solutionsIndex()
    {
        $solutions = Solution::orderBy('order')->get();
        return view('admin.corporate.solutions', compact('solutions'));
    }

    public function solutionStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'type' => 'nullable|string',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|string',
            'features' => 'nullable|string',
            'order' => 'integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        Solution::create($data);
        return redirect()->back()->with('success', 'Solution created successfully!');
    }

    public function solutionDestroy($id)
    {
        Solution::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Solution deleted successfully!');
    }

    // ==================== Case Studies ====================
    public function caseStudiesIndex()
    {
        $caseStudies = CaseStudy::with('project')->orderBy('order')->get();
        return view('admin.corporate.case-studies', compact('caseStudies'));
    }

    public function caseStudyStore(Request $request)
    {
        $data = $request->validate([
            'project_id' => 'nullable|exists:projects,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'client_name' => 'nullable|string',
            'industry' => 'nullable|string',
            'services_used' => 'nullable|string',
            'challenge' => 'nullable|string',
            'solution' => 'nullable|string',
            'results' => 'nullable|string',
            'testimonial' => 'nullable|string',
            'testimonial_author' => 'nullable|string',
            'featured_image' => 'nullable|string',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        CaseStudy::create($data);
        return redirect()->back()->with('success', 'Case study created successfully!');
    }

    public function caseStudyDestroy($id)
    {
        CaseStudy::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Case study deleted successfully!');
    }

    // ==================== Clients ====================
    public function clientsIndex()
    {
        $clients = Client::orderBy('order')->get();
        return view('admin.corporate.clients', compact('clients'));
    }

    public function clientStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'logo' => 'nullable|string',
            'website' => 'nullable|string',
            'industry' => 'nullable|string',
            'description' => 'nullable|string',
            'order' => 'integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        Client::create($data);
        return redirect()->back()->with('success', 'Client created successfully!');
    }

    public function clientDestroy($id)
    {
        Client::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Client deleted successfully!');
    }

    // ==================== Partners ====================
    public function partnersIndex()
    {
        $partners = Partner::orderBy('order')->get();
        return view('admin.corporate.partners', compact('partners'));
    }

    public function partnerStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'logo' => 'nullable|string',
            'website' => 'nullable|string',
            'description' => 'nullable|string',
            'order' => 'integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        Partner::create($data);
        return redirect()->back()->with('success', 'Partner created successfully!');
    }

    public function partnerDestroy($id)
    {
        Partner::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Partner deleted successfully!');
    }

    // ==================== Team Members ====================
    public function teamMembersIndex()
    {
        $teamMembers = TeamMember::orderBy('order')->get();
        return view('admin.corporate.team-members', compact('teamMembers'));
    }

    public function teamMemberStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'designation' => 'nullable|string',
            'department' => 'nullable|string',
            'short_bio' => 'nullable|string',
            'biography' => 'nullable|string',
            'photo' => 'nullable|string',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'twitter' => 'nullable|string',
            'facebook' => 'nullable|string',
            'team_type' => 'nullable|string',
            'order' => 'integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        TeamMember::create($data);
        return redirect()->back()->with('success', 'Team member created successfully!');
    }

    public function teamMemberDestroy($id)
    {
        TeamMember::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Team member deleted successfully!');
    }

    // ==================== FAQs ====================
    public function faqsIndex()
    {
        $faqs = Faq::orderBy('order')->get();
        return view('admin.corporate.faqs', compact('faqs'));
    }

    public function faqStore(Request $request)
    {
        $data = $request->validate([
            'category' => 'nullable|string|max:100',
            'question' => 'required|string',
            'answer' => 'required|string',
            'order' => 'integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        Faq::create($data);
        return redirect()->back()->with('success', 'FAQ created successfully!');
    }

    public function faqDestroy($id)
    {
        Faq::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'FAQ deleted successfully!');
    }

    // ==================== Job Departments ====================
    public function jobDepartmentsIndex()
    {
        $departments = JobDepartment::orderBy('order')->get();
        return view('admin.corporate.job-departments', compact('departments'));
    }

    public function jobDepartmentStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'description' => 'nullable|string',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        JobDepartment::create($data);
        return redirect()->back()->with('success', 'Department created successfully!');
    }

    public function jobDepartmentDestroy($id)
    {
        JobDepartment::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Department deleted successfully!');
    }

    // ==================== Job Locations ====================
    public function jobLocationsIndex()
    {
        $locations = JobLocation::orderBy('order')->get();
        return view('admin.corporate.job-locations', compact('locations'));
    }

    public function jobLocationStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'city' => 'nullable|string',
            'country' => 'nullable|string',
            'is_remote' => 'boolean',
            'order' => 'integer',
            'is_active' => 'boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        JobLocation::create($data);
        return redirect()->back()->with('success', 'Location created successfully!');
    }

    public function jobLocationDestroy($id)
    {
        JobLocation::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Location deleted successfully!');
    }

    // ==================== Careers ====================
    public function careersIndex()
    {
        $careers = Career::with(['department', 'location'])->orderBy('order')->get();
        return view('admin.corporate.careers', compact('careers'));
    }

    public function careerStore(Request $request)
    {
        $data = $request->validate([
            'department_id' => 'nullable|exists:job_departments,id',
            'location_id' => 'nullable|exists:job_locations,id',
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'requirements' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'benefits' => 'nullable|string',
            'employment_type' => 'nullable|string',
            'experience_level' => 'nullable|string',
            'salary_range' => 'nullable|string',
            'application_deadline' => 'nullable|date',
            'order' => 'integer',
            'is_featured' => 'boolean',
            'is_active' => 'boolean',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        Career::create($data);
        return redirect()->back()->with('success', 'Job listing created successfully!');
    }

    public function careerDestroy($id)
    {
        Career::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Job listing deleted successfully!');
    }

    // ==================== Job Applications ====================
    public function jobApplicationsIndex()
    {
        $applications = JobApplication::with('career')->orderByDesc('created_at')->get();
        return view('admin.corporate.job-applications', compact('applications'));
    }

    public function jobApplicationDestroy($id)
    {
        JobApplication::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Application deleted successfully!');
    }
}
