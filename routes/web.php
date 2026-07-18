<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EducationController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\CorporateHomeController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ProjectController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Front-End (Public) Routes - Corporate Theme
|--------------------------------------------------------------------------
*/

Route::get('/', [CorporateHomeController::class, 'index'])->name('home');

// Corporate Pages
Route::get('/about', [CorporateHomeController::class, 'about'])->name('front.about');
Route::get('/services', [CorporateHomeController::class, 'services'])->name('front.services');
Route::get('/services/{slug}', [CorporateHomeController::class, 'serviceDetail'])->name('front.service');
Route::get('/service-category/{slug}', [CorporateHomeController::class, 'serviceCategory'])->name('front.service.category');
Route::get('/solutions', [CorporateHomeController::class, 'solutions'])->name('front.solutions');
Route::get('/solutions/{type}', [CorporateHomeController::class, 'solutionType'])->name('front.solution.type');
Route::get('/industries', [CorporateHomeController::class, 'industries'])->name('front.industries');
Route::get('/industry/{slug}', [CorporateHomeController::class, 'industry'])->name('front.industry');
Route::get('/team', [CorporateHomeController::class, 'team'])->name('front.team');
Route::get('/careers', [CorporateHomeController::class, 'careers'])->name('front.careers');
Route::get('/faqs', [CorporateHomeController::class, 'faqs'])->name('front.faqs');

// Projects
Route::get('/projects', [CorporateHomeController::class, 'projects'])->name('front.projects');
Route::get('/projects/{slug}', [CorporateHomeController::class, 'projectDetail'])->name('front.project');

// Blog
Route::get('/blog', [CorporateHomeController::class, 'blog'])->name('front.blog');
Route::get('/blog/{slug}', [CorporateHomeController::class, 'blogDetail'])->name('front.blog.show');

// Contact
Route::get('/contact', [CorporateHomeController::class, 'contact'])->name('front.contact');
Route::post('/contact', [CorporateHomeController::class, 'contactStore'])->name('front.contact.store');

// Subscribe
Route::post('/subscribe', [CorporateHomeController::class, 'subscribe'])->name('front.subscribe');

// Legal Pages
Route::get('/privacy-policy', [CorporateHomeController::class, 'privacy'])->name('front.privacy');
Route::get('/terms-of-service', [CorporateHomeController::class, 'terms'])->name('front.terms');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Panel Routes (Protected)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Company Profile
    Route::get('/company-profile', [\App\Http\Controllers\Admin\CorporateController::class, 'companyProfileEdit'])->name('company-profile.edit');
    Route::put('/company-profile', [\App\Http\Controllers\Admin\CorporateController::class, 'companyProfileUpdate'])->name('company-profile.update');

    // Hero Sections
    Route::get('/hero-sections', [\App\Http\Controllers\Admin\CorporateController::class, 'heroSectionsIndex'])->name('hero-sections.index');
    Route::post('/hero-sections', [\App\Http\Controllers\Admin\CorporateController::class, 'heroSectionStore'])->name('hero-sections.store');
    Route::delete('/hero-sections/{id}', [\App\Http\Controllers\Admin\CorporateController::class, 'heroSectionDestroy'])->name('hero-sections.destroy');

    // Social Links
    Route::get('/social-links', [\App\Http\Controllers\Admin\CorporateController::class, 'socialLinksIndex'])->name('social-links.index');
    Route::post('/social-links', [\App\Http\Controllers\Admin\CorporateController::class, 'socialLinkStore'])->name('social-links.store');
    Route::delete('/social-links/{id}', [\App\Http\Controllers\Admin\CorporateController::class, 'socialLinkDestroy'])->name('social-links.destroy');

    // Service Categories
    Route::get('/service-categories', [\App\Http\Controllers\Admin\CorporateController::class, 'serviceCategoriesIndex'])->name('service-categories.index');
    Route::post('/service-categories', [\App\Http\Controllers\Admin\CorporateController::class, 'serviceCategoryStore'])->name('service-categories.store');
    Route::delete('/service-categories/{id}', [\App\Http\Controllers\Admin\CorporateController::class, 'serviceCategoryDestroy'])->name('service-categories.destroy');

    // Industries
    Route::get('/industries', [\App\Http\Controllers\Admin\CorporateController::class, 'industriesIndex'])->name('industries.index');
    Route::post('/industries', [\App\Http\Controllers\Admin\CorporateController::class, 'industryStore'])->name('industries.store');
    Route::delete('/industries/{id}', [\App\Http\Controllers\Admin\CorporateController::class, 'industryDestroy'])->name('industries.destroy');

    // Solutions
    Route::get('/solutions', [\App\Http\Controllers\Admin\CorporateController::class, 'solutionsIndex'])->name('solutions.index');
    Route::post('/solutions', [\App\Http\Controllers\Admin\CorporateController::class, 'solutionStore'])->name('solutions.store');
    Route::delete('/solutions/{id}', [\App\Http\Controllers\Admin\CorporateController::class, 'solutionDestroy'])->name('solutions.destroy');

    // Case Studies
    Route::get('/case-studies', [\App\Http\Controllers\Admin\CorporateController::class, 'caseStudiesIndex'])->name('case-studies.index');
    Route::post('/case-studies', [\App\Http\Controllers\Admin\CorporateController::class, 'caseStudyStore'])->name('case-studies.store');
    Route::delete('/case-studies/{id}', [\App\Http\Controllers\Admin\CorporateController::class, 'caseStudyDestroy'])->name('case-studies.destroy');

    // Clients
    Route::get('/clients', [\App\Http\Controllers\Admin\CorporateController::class, 'clientsIndex'])->name('clients.index');
    Route::post('/clients', [\App\Http\Controllers\Admin\CorporateController::class, 'clientStore'])->name('clients.store');
    Route::delete('/clients/{id}', [\App\Http\Controllers\Admin\CorporateController::class, 'clientDestroy'])->name('clients.destroy');

    // Partners
    Route::get('/partners', [\App\Http\Controllers\Admin\CorporateController::class, 'partnersIndex'])->name('partners.index');
    Route::post('/partners', [\App\Http\Controllers\Admin\CorporateController::class, 'partnerStore'])->name('partners.store');
    Route::delete('/partners/{id}', [\App\Http\Controllers\Admin\CorporateController::class, 'partnerDestroy'])->name('partners.destroy');

    // Team Members
    Route::get('/team-members', [\App\Http\Controllers\Admin\CorporateController::class, 'teamMembersIndex'])->name('team-members.index');
    Route::post('/team-members', [\App\Http\Controllers\Admin\CorporateController::class, 'teamMemberStore'])->name('team-members.store');
    Route::delete('/team-members/{id}', [\App\Http\Controllers\Admin\CorporateController::class, 'teamMemberDestroy'])->name('team-members.destroy');

    // FAQs
    Route::get('/faqs', [\App\Http\Controllers\Admin\CorporateController::class, 'faqsIndex'])->name('faqs.index');
    Route::post('/faqs', [\App\Http\Controllers\Admin\CorporateController::class, 'faqStore'])->name('faqs.store');
    Route::delete('/faqs/{id}', [\App\Http\Controllers\Admin\CorporateController::class, 'faqDestroy'])->name('faqs.destroy');

    // Job Departments
    Route::get('/job-departments', [\App\Http\Controllers\Admin\CorporateController::class, 'jobDepartmentsIndex'])->name('job-departments.index');
    Route::post('/job-departments', [\App\Http\Controllers\Admin\CorporateController::class, 'jobDepartmentStore'])->name('job-departments.store');
    Route::delete('/job-departments/{id}', [\App\Http\Controllers\Admin\CorporateController::class, 'jobDepartmentDestroy'])->name('job-departments.destroy');

    // Job Locations
    Route::get('/job-locations', [\App\Http\Controllers\Admin\CorporateController::class, 'jobLocationsIndex'])->name('job-locations.index');
    Route::post('/job-locations', [\App\Http\Controllers\Admin\CorporateController::class, 'jobLocationStore'])->name('job-locations.store');
    Route::delete('/job-locations/{id}', [\App\Http\Controllers\Admin\CorporateController::class, 'jobLocationDestroy'])->name('job-locations.destroy');

    // Careers
    Route::get('/careers', [\App\Http\Controllers\Admin\CorporateController::class, 'careersIndex'])->name('careers.index');
    Route::post('/careers', [\App\Http\Controllers\Admin\CorporateController::class, 'careerStore'])->name('careers.store');
    Route::delete('/careers/{id}', [\App\Http\Controllers\Admin\CorporateController::class, 'careerDestroy'])->name('careers.destroy');

    // Job Applications
    Route::get('/job-applications', [\App\Http\Controllers\Admin\CorporateController::class, 'jobApplicationsIndex'])->name('job-applications.index');
    Route::delete('/job-applications/{id}', [\App\Http\Controllers\Admin\CorporateController::class, 'jobApplicationDestroy'])->name('job-applications.destroy');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');

    // About
    Route::get('/about', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/about', [AboutController::class, 'update'])->name('about.update');

    // Skills
    Route::resource('skills', SkillController::class)->except(['show']);

    // Services
    Route::resource('services', AdminServiceController::class)->except(['show']);

    // Experience
    Route::resource('experience', ExperienceController::class)->except(['show']);

    // Education
    Route::resource('education', EducationController::class)->except(['show']);

    // Projects
    Route::get('/projects/categories', [AdminProjectController::class, 'categories'])->name('projects.categories');
    Route::post('/projects/categories', [AdminProjectController::class, 'storeCategory'])->name('projects.categories.store');
    Route::delete('/projects/categories/{category}', [AdminProjectController::class, 'destroyCategory'])->name('projects.categories.destroy');
    Route::delete('/projects/gallery/{gallery}', [AdminProjectController::class, 'destroyGalleryImage'])->name('projects.gallery.destroy');
    Route::resource('projects', AdminProjectController::class)->except(['show']);

    // Blog
    Route::get('/blog/categories', [AdminBlogController::class, 'categories'])->name('blog.categories');
    Route::post('/blog/categories', [AdminBlogController::class, 'storeCategory'])->name('blog.categories.store');
    Route::delete('/blog/categories/{category}', [AdminBlogController::class, 'destroyCategory'])->name('blog.categories.destroy');
    Route::resource('blog', AdminBlogController::class)->except(['show']);

    // Testimonials
    Route::resource('testimonials', AdminTestimonialController::class)->except(['show']);

    // Contact Messages
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::put('/messages/{message}/read', [MessageController::class, 'markRead'])->name('messages.read');
    Route::put('/messages/{message}/unread', [MessageController::class, 'markUnread'])->name('messages.unread');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');

    // Site Settings
    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::put('/settings', [SettingController::class, 'update'])->name('settings.update');

    // License information
    Route::get('/license', [\App\Http\Controllers\Admin\LicenseController::class, 'index'])->name('license.index');

    // SEO Settings
    Route::get('/seo', [SeoController::class, 'edit'])->name('seo.edit');
    Route::put('/seo', [SeoController::class, 'update'])->name('seo.update');

    // Users & Roles
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('roles', RoleController::class)->except(['show']);
});

/*
|--------------------------------------------------------------------------
| Laravel File Manager (only if package is installed)
|--------------------------------------------------------------------------
*/

if (class_exists(\UniSharp\LaravelFilemanager\Lfm::class)) {
    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'admin']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });
}
