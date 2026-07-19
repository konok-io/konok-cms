# Konok-CMS Agent Memory

## Repository Info
- **Name**: konok-cms
- **URL**: https://github.com/konok-io/konok-cms
- **Type**: Laravel CMS (PHP)
- **Current Branch**: main

---

## Project Overview

This is a comprehensive Laravel-based CMS with two themes:
1. **Corporate Theme** - Full corporate website with industries, solutions, services, careers, etc.
2. **Portfolio Theme** - Personal portfolio with skills, experience, projects, blog

---

## 36 Models Overview

### Core Business Models
| Model | Key Properties | Relationships |
|-------|----------------|---------------|
| User | name, email, password, avatar, is_active | hasRoles (Spatie), hasNotifications |
| About | name, title, short_intro, description, photo, cv_file, contact info, social links | - |
| Blog | title, slug, featured_image, description, status, views, published_at | belongsTo: BlogCategory, User |
| BlogCategory | name, slug | hasMany: Blog |
| Project | title, slug, featured_image, technologies (JSON), description, status, is_featured | belongsTo: ProjectCategory, hasMany: ProjectGallery, CaseStudy |
| ProjectCategory | name, slug, description, icon, image, order, is_active | hasMany: Project |
| ProjectGallery | project_id, image, sort_order | belongsTo: Project |
| Service | name, slug, icon, image, features/benefits (JSON), order, is_featured, is_active | belongsTo: ServiceCategory |
| ServiceCategory | name, slug, description, icon, image, order, is_active | hasMany: Service |
| Skill | name, percentage, icon, sort_order, is_active | - |
| Experience | company_name, designation, start_date, end_date, is_current, description, sort_order | - |
| Education | institute_name, degree, start_year, end_year, description, sort_order | - |
| Testimonial | client_name, company, photo, rating, review, is_active, sort_order | - |
| ContactMessage | name, email, phone, subject, message, is_read, ip_address | - |
| Subscriber | email, subscribed_at | - |

### Corporate/Enterprise Models
| Model | Key Properties | Relationships |
|-------|----------------|---------------|
| CompanyProfile | company_name, tagline, vision, mission, core_values (JSON), hero fields, stats, is_active | - |
| HeroSection | title, subtitle, background_image, buttons, particles, video, order, is_active | - |
| TeamMember | name, designation, department, bio, photo, social links, skills (JSON), team_type, order, is_active | - |
| Client | name, slug, logo, website, industry, is_featured, is_active, order | - |
| Partner | name, slug, logo, website, partner_type, is_featured, is_active, order | - |
| Industry | name, slug, description, icon, image, solutions, order, is_active | - |
| Solution | name, slug, type (ERP/POS/CRM/etc), icon, features (JSON), specifications (JSON), is_featured, is_active | - |
| CaseStudy | project_id, title, client_name, background/challenge/approach/solution/results, statistics (JSON), is_featured, is_active | belongsTo: Project |
| Faq | category, question, answer, order, is_featured, is_active | - |
| Career | department_id, location_id, title, requirements/responsibilities/benefits (JSON), employment_type, salary_range, deadline, is_active | belongsTo: JobDepartment, JobLocation, hasMany: JobApplication |
| JobDepartment | name, slug, description, is_active, order | hasMany: Career |
| JobLocation | name, slug, city, country, is_remote, is_active, order | hasMany: Career |
| JobApplication | career_id, full_name, email, phone, resume, linkedin_url, cover_letter, status | belongsTo: Career |
| KnowledgeArticle | category_id, title, content, type (article/tutorial/guide/etc), tags (JSON), read_time, is_published, is_active | belongsTo: KnowledgeCategory |
| KnowledgeCategory | name, slug, description, icon, order, is_active | hasMany: KnowledgeArticle |

### System Models
| Model | Key Properties | Relationships |
|-------|----------------|---------------|
| Setting | site_name, logo, email, phone, address, google_map, social links | Singleton pattern (instance()) |
| SeoSetting | meta_title, meta_description, meta_keywords, og_image | Singleton pattern (instance()) |
| Visitor | ip_address, browser, platform, device, country, page_url, visited_date | - |
| SocialLink | platform, url, icon, color, is_active, order | - |
| ActivityLog | user_id, action, module, model_type, model_id, old_values/new_values (JSON), ip_address | belongsTo: User, morphTo: subject |

---

## Controllers Structure

### Admin Controllers (app/Http/Controllers/Admin/)
- DashboardController - Stats overview, visitor chart
- AboutController - About record management
- BlogController - Blog CRUD + categories
- ProjectController - Project CRUD + gallery + categories
- ServiceController - Service CRUD
- SkillController - Skill CRUD
- ExperienceController - Experience CRUD
- EducationController - Education CRUD
- TestimonialController - Testimonial CRUD
- CorporateController - All corporate content (Company Profile, Hero, Social Links, Service Categories, Industries, Solutions, Case Studies, Clients, Partners, Team Members, FAQs, Departments, Locations, Careers, Applications)
- MessageController - Contact message management
- SettingController - Site settings
- SeoController - SEO settings
- UserController - User management
- RoleController - Role & permission management
- ProfileController - Current user profile
- LicenseController - MRH license info

### Front Controllers (app/Http/Controllers/Front/)
- HomeController - Portfolio homepage
- AboutController - Portfolio about page
- BlogController - Blog listing/detail
- ProjectController - Project listing/detail
- ServiceController - Services listing
- ContactController - Contact form
- CorporateHomeController - Full corporate frontend

### API Controllers (app/Http/Controllers/Api/)
- BlogController - Public blog API
- ProjectController - Public project API
- ServiceController - Public service API

---

## Key Routes

### Public Routes (/api/v1/)
```
GET /api/v1/projects, /api/v1/projects/{slug}
GET /api/v1/blogs, /api/v1/blogs/{slug}
GET /api/v1/services, /api/v1/services/{id}
```

### Web Routes
- Corporate Theme: /, /about, /services, /services/{slug}, /industries, /industry/{slug}, /team, /careers, /projects, /blog, /contact
- Admin: /admin/* (protected)

---

## Middleware
- **AdminMiddleware**: Restricts to Admin/Editor roles
- **TrackVisitor**: Logs visitor data for front pages

---

## Helper Functions (app/Helpers/helpers.php)
- `isRTL()` - Check if current locale is RTL
- `getDir()` - Get direction (rtl/ltr)
- `rtlAlign()` - Text alignment based on direction
- `rtlMargin()` - Margin based on direction
- `rtlPadding()` - Padding based on direction

---

## Key Directories
- `app/Models/` - All Eloquent models
- `app/Http/Controllers/` - All controllers
- `database/migrations/` - 31 migrations
- `database/seeders/` - Database seeders
- `resources/views/admin/` - Admin blade templates
- `resources/views/corporate/` - Corporate frontend
- `resources/views/front/` - Portfolio frontend
- `config/` - Configuration files
- `routes/` - web.php, api.php

---

## Current Issues/Fixes Applied
- RTL admin panel layout fixes
- Home page dynamic content
- Industry page fully dynamic
- Testimonial demo data
- Case studies in project details

---

## Data Flow

### Public User Flow
1. Visitor → TrackVisitor middleware → Logs browser, platform, device, page
2. Home (/) → CorporateHomeController@index → Loads company profile, hero sections, services, stats
3. Browse → Services/Projects/Blog/Careers → Paginated listings
4. Contact → Creates ContactMessage
5. Subscribe → Creates Subscriber

### Admin Flow
1. Login → LoginController@login → Validates credentials, checks role
2. Dashboard → Stats overview
3. CRUD Operations → Standard resource controllers
4. File Uploads → storage/app/public/

---

## File Upload Pattern
```php
// Store file
$path = $request->file('field_name')->store('folder_name', 'public');

// Delete old file
if ($oldFile && Storage::disk('public')->exists($oldFile)) {
    Storage::disk('public')->delete($oldFile);
}
```

---

## Important Notes
- Uses Spatie Permission for roles/permissions
- Uses Laravel File Manager (lfm) for file uploads
- Singleton pattern for Setting and SeoSetting models
- JSON columns for flexible data (features, benefits, tags, statistics)
- Visitor tracking enabled for all public pages
