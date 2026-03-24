# HTML Template Structure Analysis

## Overview
This document provides a detailed analysis of the seven key HTML templates in the Petro Industrial Template, identifying structural patterns, layout components, and data placeholders for creating corresponding Blade templates.

---

## 1. ABOUT-COMPANY.HTML (About Us Page)

### Overall Page Structure
```
Header (Shared)
├── Topbar
├── Topbar Logo Section
├── Navbar
Banner Section
├── Title Page: "Our Company"
├── Breadcrumb Navigation
Content Sections (Unique)
├── Feature/Icon Boxes (3 columns)
├── Company Overview (2 columns)
├── Director/Leader Section (2 columns with image)
├── Statistic Counters (4 columns)
├── Mission Section (2 columns with video)
├── Why Choose Us (3 columns with images)
Info Box Section (Shared)
Footer (Shared)
```

### Key HTML Elements & Classes
- **Page Sections:** `.section`, `.overlap`, `.section-border`, `.bglight`, `.bgsection`
- **Feature Boxes:** `.box-icon-2` (icon + heading + description)
- **Layout Grid:** Bootstrap 12-column grid with `.col-sm-*`, `.col-md-*`
- **Headings:** `.section-heading`, `.jumbo-heading` (large display text)
- **Text Styles:** `.lead` (intro text), `.director-title`, `.director-position`
- **Visual Elements:** `.director-image`, `.vidimg` (video container)
- **Typography:** `<blockquote>`, `<ul class="bull">` (bullet list)

### Data Placeholders
- **Page Title:** "Our Company"
- **Breadcrumb:** About Us > Our Company
- **Feature Box Titles:** "QUALITY DRIVEN", "CUSTOMER FOCUSED", "GLOBAL SOURCING"
- **Feature Box Descriptions:** Lorem ipsum text
- **Company Overview Heading:** "OUR REAL COMMITMENT REACHES BEYOND GAS & OIL COMPANY."
- **Director Info:** Name (Peter White), Position, Image (director.png), Biography
- **Statistics:** Counters with numbers (10, 5700, 22, etc.) and titles
- **Video:** Video link with thumbnail image
- **Mission Items:** Bulleted list of mission points
- **Why Choose Us Cards:** 3 cards with image, title, description

### Repeated Patterns
1. **Icon Box Pattern:** Icon + Heading + Description text
2. **Two-Column Layout:** Left content + Right content sections
3. **Three-Column Grid:** Used for features, statistics, benefits
4. **Call-to-Action Sections:** Info boxes with contact details at bottom
5. **Section Dividers:** Different background classes (.bglight, .bgsection) for visual separation

---

## 2. SERVICES.HTML (Services Page)

### Overall Page Structure
```
Header (Shared)
Banner Section
├── Title: "Services 1"
├── Breadcrumb
Main Content
├── Service Box Grid (6 items, 3 columns)
│  ├── Icon
│  ├── Heading
│  ├── Description
│  └── "Read More" Link
Info Box Section (Shared)
Footer (Shared)
```

### Key HTML Elements & Classes
- **Service Container:** `.section.why.overlap`
- **Service Box:** `.box-icon-3` (icon + heading + description + link)
- **Grid Layout:** 3-column grid (6 items = 2 rows)
- **Icon Container:** `.icon` with Font Awesome icons
- **Text Container:** `.body-content`
- **Decorative Elements:** `.line-t`, `.line-b` (top/bottom lines)
- **Link:** `.readmore` (styled read more link)

### Data Placeholders
- **Service Titles:** 
  - MECHANICAL ENGINEERING
  - AGRICULTURAL PROCESSING
  - OILS AND LUBRICANTS
  - POWER AND ENERGY
  - CHEMICAL RESEARCH
  - MATERIAL ENGINEERING
- **Service Descriptions:** Short Lorem ipsum text
- **Icons:** Font Awesome icons (fa-gears, fa-leaf, fa-fire, fa-flash, fa-flask, fa-cubes)
- **Links:** Each service has a "READ MORE" link (services-detail.html)

### Repeated Patterns
1. **Service Card Pattern:** Icon + Title + Description + Link
2. **Consistent Spacing:** Same layout for all cards in grid
3. **Hover Effects:** Line decorations (likely revealed on hover)
4. **2 Rows × 3 Columns:** Standard 6-item grid layout

---

## 3. PROJECT-GRID.HTML (Products/Projects Grid Page)

### Overall Page Structure
```
Header (Shared)
Banner Section
├── Title: "Projects"
├── Breadcrumb
Main Content
├── Filter/Category Navigation
│  └── Filter buttons: all, eco, manufacturing, industry, oil, gas, factory
├── Project Grid (9+ items)
│  ├── Column with multiple category classes
│  ├── Box Image (image + overlay)
│  ├── Title & Category
│  └── Link to detail page
Info Box Section (Shared)
Footer (Shared)
```

### Key HTML Elements & Classes
- **Filter Container:** `.categories`, `.portfolio_filter.dark`
- **Filter Links:** `<a>` with `data-filter="*"` attribute for isotope plugin
- **Grid Container:** `.grid-services`
- **Grid Item:** `.col-sm-6.col-md-4` with filter classes (eco, manufacturing, etc.)
- **Project Card:** `.box-image-4`
- **Media Container:** `.media` with image
- **Body/Overlay:** `.body`, `.content`
- **Title:** `.title` (h4)
- **Category Tag:** `.category`

### Data Placeholders
- **Page Title:** "Projects"
- **Filter Categories:** all, eco, manufacturing, industry, oil, gas, factory
- **Project Items:**
  - Title: "INDUSTRIAL COMPLEX", "The Gas Company", "Warehouse Industry", etc.
  - Category: "Commodoenim"
  - Image: 600x400 placeholder
  - Link: project-detail.html
- **Grid Items:** 9 projects shown (col-sm-6 col-md-4 = 3 per row on desktop)

### Repeated Patterns
1. **Filterable Grid Pattern:** Multiple filter classes on items, isotope JS for filtering
2. **Card Pattern:** Image + overlay text, hover effects
3. **Responsive Grid:** 2 columns on mobile, 3 columns on desktop
4. **Link Structure:** All items link to detail page
5. **Category Tags:** Each item tagged with one or more categories

---

## 4. PROJECT-DETAIL.HTML (Individual Product Detail Page)

### Overall Page Structure
```
Header (Shared)
Banner Section
├── Title: "Single Project"
├── Breadcrumb
Main Content (3-column with sidebar)
├── Left Sidebar (4 col)
│  ├── Project Details Widget
│  │  ├── Client
│  │  ├── Location
│  │  └── Completed Date
│  ├── Navigation Widget (Previous/Next)
│  ├── Download Widget (PDF/Brochure)
│  └── Contact Info Widget
├── Main Content (8 col)
│  ├── Featured Image
│  ├── Project Title
│  ├── Description Paragraphs
│  ├── Blockquote
│  ├── "What We Do" Section
│  └── Checklist
Info Box Section (Shared)
Footer (Shared)
```

### Key HTML Elements & Classes
- **Container:** `.single-page`
- **Sidebar:** `.col-sm-4.col-md-4.col-md-push-8`
- **Main Content:** `.col-sm-8.col-md-8.col-md-pull-4`
- **Widgets:** `.widget`, `.widget-title`
- **Project Details:** `<dl>` with `<dt>` (labels) and `<dd>` (values)
- **Navigation:** `.category-nav` with Previous/Next links
- **Button:** `.btn.btn-secondary.btn-block.btn-sidebar`
- **List:** `.list-info` with icons and text
- **Checklist:** `.checklist` with `<li>` items
- **Typography:** `<blockquote>`, `<h2 class="section-heading">`

### Data Placeholders
- **Page Title:** "Single Project"
- **Project Details:**
  - Client: "Rudhi Sasmito"
  - Location: "Sidoarjo, East Java, ID"
  - Completed: "March, 2016"
- **Navigation:** Links to Previous/Next Project
- **Download:** Company Brochure PDF link
- **Contact Info:**
  - Address
  - Phone
  - Email
  - Business Hours
- **Featured Image:** 800x500 placeholder
- **Project Title:** "Industrial Complex"
- **Content:** Multiple paragraphs of description text
- **Blockquote:** Testimonial or highlighted text
- **What We Do:** Subheading + 3-item checklist

### Repeated Patterns
1. **Sidebar + Main Content Layout:** 4:8 column split with push/pull for responsive reordering
2. **Widget Pattern:** Title + Content structure
3. **Contact Info Pattern:** Icon + Text layout
4. **Navigation Pattern:** Previous/Next links
5. **Content Hierarchy:** Large titles, descriptions, blockquotes

---

## 5. NEWS-GRID.HTML (Blog/News Grid Page)

### Overall Page Structure
```
Header (Shared)
Banner Section
├── Title: "Grid Bar"
├── Breadcrumb
Main Content
├── News/Blog Grid (6 items, 3 columns)
│  ├── Image
│  ├── Title (link)
│  ├── Meta (date, comments)
├── Pagination
Info Box Section (Shared)
Footer (Shared)
```

### Key HTML Elements & Classes
- **Container:** `.section.why.overlap`
- **Grid Container:** Row with columns
- **News Card:** `.box-news-1`
- **Media Container:** `.media.gbr` (with image)
- **Body:** `.body`
- **Title:** `.title` with link
- **Meta:** `.meta`
- **Meta Items:** `.date` (with clock icon), `.comments` (with comment icon)
- **Pagination:** `.pagination` with numbered links

### Data Placeholders
- **Page Title:** "Grid Bar"
- **News Items (6 visible):**
  - Title: "The Best in dolor sit amet...", "Cras malesuada elit leo...", etc.
  - Date: Apr 25, 2017 / May 7, 2017 / May 20, 2017 / etc.
  - Comments Count: 0 Comments
  - Image: 600x400 placeholder
- **Pagination:** Pages 1, 2, 3 (active page highlighted)

### Repeated Patterns
1. **News Card Pattern:** Image + Title + Meta (date/comments)
2. **3-Column Grid:** 3 items per row on desktop
3. **Meta Information:** Date and comment count displayed consistently
4. **Pagination:** Standard numbered pagination at bottom

---

## 6. NEWS-DETAIL.HTML (Single Blog/News Detail Page)

### Overall Page Structure
```
Header (Shared)
Banner Section
├── Title: "Single News"
├── Breadcrumb
Main Content (3-column with sidebar)
├── Right Sidebar (4 col, md-push-8)
│  ├── Text Widget
│  ├── Download Widget
│  ├── Archive Dropdown
│  ├── Tags Widget
│  └── Contact Info (commented out)
├── Main Content (8 col, md-pull-4)
│  ├── Featured Image
│  ├── Title
│  ├── Meta (date, author, category, comments)
│  ├── Content Paragraphs
│  ├── Blockquote
│  ├── Author Box
│  ├── Comments Section
│  └── Leave Comment Form
Info Box Section (Shared)
Footer (Shared)
```

### Key HTML Elements & Classes
- **Sidebar:** `.col-sm-4.col-md-4.col-md-push-8`
- **Main Content:** `.col-sm-8.col-md-8.col-md-pull-4`
- **Post Container:** `.single-news`
- **Widgets:** `.widget`, `.widget-title`
- **Text Widget:** `.widget-text`
- **Archive Widget:** `.widget-archive` with `<select>`
- **Tags Widget:** `.widget.tags`, `.tagcloud`
- **Tag Links:** With `title="X topics"` attribute
- **Meta:** `.meta`, `.meta-date`, `.meta-author`, `.meta-category`, `.meta-comment`
- **Author Box:** `.author-box`, `.media` layout
- **Comments Container:** `.comments-box`
- **Comment Item:** `.media.comment`, `.reply-comment` (for replies)
- **Comment Meta:** Author name, date, reply link
- **Comment Form:** `.leave-comment-box`, `.form-comment`
- **Form Elements:** Text inputs, textarea with placeholder text

### Data Placeholders
- **Page Title:** "Single News"
- **Post Title:** "Traveling more confident with our insurance"
- **Meta Information:**
  - Date: April 25, 2017
  - Author: Rome Doel (with link)
  - Category: Industry, Machine (with links)
  - Comments: 2 Comments
- **Featured Image:** 800x500 placeholder
- **Content:** Multiple paragraphs, blockquote with attribution
- **Archive Options:** April 2017, March 2017, February 2017, January 2017
- **Tags:** industrial, oil and gas, company, petro, manufacturing, mechanical, market, power and energy, engineering, planning, portfolios, themeforest, tips
- **Author Info:**
  - Name: John Doel
  - Avatar: 100x100 placeholder
  - Bio text
- **Comments (3 shown):**
  - Commenter: Susi Doel
  - Date: August 24, 2014
  - Content: Comment text
  - Reply link
- **Comment Form Fields:**
  - Full Name
  - Email
  - Website
  - Message (textarea)

### Repeated Patterns
1. **Sidebar + Main Content Layout:** 4:8 column split with responsive reordering
2. **Widget Pattern:** Consistent widget structure across sidebar
3. **Meta Information:** Standardized metadata display
4. **Comment Pattern:** Nested comments with media layout
5. **Form Pattern:** Bootstrap form styling with placeholders

---

## 7. CONTACT.HTML (Contact Us Page)

### Overall Page Structure
```
Header (Shared)
Banner Section
├── Title: "Contact Us"
├── Breadcrumb
Main Content (3-column with sidebar)
├── Right Sidebar (4 col)
│  ├── Download Widget (Brochure)
│  └── Contact Info Widget
│     ├── Address
│     ├── Phone
│     ├── Email
│     └── Hours
├── Main Content (8 col)
│  ├── Intro Text
│  ├── Contact Form
│  │  ├── Full Name
│  │  ├── Address (labeled as "email")
│  │  ├── Subject
│  │  ├── Message (textarea)
│  │  └── Submit Button "ASK A QUOTE"
│  └── Note text
Maps Section (Embedded Google Maps)
Info Box Section (Shared)
Footer (Shared)
```

### Key HTML Elements & Classes
- **Contact Section:** `.section.contact.overlap`
- **Sidebar:** `.col-sm-4.col-md-4.col-md-push-8`
- **Main Content:** `.col-sm-8.col-md-8.col-md-pull-4`
- **Form:** `.form-contact`, `data-toggle="validator"` (Bootstrap validator)
- **Form Groups:** `.form-group` with `.form-control`
- **Form Validation:** `.help-block.with-errors`
- **Maps Container:** `.maps-wraper`
- **Maps Element:** `#maps` with `data-lat`, `data-lng`, `data-marker`
- **Zoom Controls:** `#cd-zoom-in`, `#cd-zoom-out`
- **Contact Info List:** `.list-info` with icons

### Data Placeholders
- **Page Title:** "Contact Us"
- **Intro Text:** "Suspendisse est nunc mollis id elit ac efficitur rutrum mauris..."
- **Form Heading:** "Contact Details"
- **Form Fields:**
  - Full Name (required)
  - Address/Email (required, but labeled as email)
  - Subject
  - Message (textarea, 6 rows)
- **Submit Button:** "ASK A QUOTE"
- **Contact Info Sidebar:**
  - Address: 99 S.t Jomblo Park Pekanbaru 28292. Indonesia
  - Phone: (0761) 654-123987
  - Email: info@yoursite.com
  - Hours: Mon - Sat 09:00 - 17:00
- **Map Data:**
  - Latitude: -7.452278
  - Longitude: 112.708992
  - Marker Icon: cd-icon-location.png
- **Note:** "Consectetur adipisicing elit sed do eiusmod tempor incididunt..."

### Repeated Patterns
1. **Sidebar + Main Content Layout:** Consistent 4:8 split
2. **Contact Info Pattern:** Icon + Text pairs
3. **Form Pattern:** Bootstrap validator-enabled form
4. **Widget Pattern:** Sidebar widgets with titles
5. **Maps Integration:** Embedded Google Maps with zoom controls

---

## SHARED HEADER & FOOTER STRUCTURE

### Header Components (All Pages)

```html
Topbar (Welcome text + Navigation menu + Social icons)
├── Left: Welcome text "We help the world growing since 1983"
├── Right: Menu links (Career, Give Feedback, Contact Us)
└── Right: Social icons (Facebook, Twitter, Instagram, Pinterest)

Topbar Logo (Contact boxes + Get Quote button)
├── Box 1: Email icon + "Email Support" + email
├── Box 2: Phone icon + "Call Support" + phone
└── Button: "GET A QUOTE"

Navbar (Logo + Main navigation menu)
├── Logo: navbar-brand with image
├── Menu: Dropdown menus for HOME, ABOUT US, SERVICES, PAGES, PROJECTS, NEWS, CONTACT
└── Search: Dropdown search form
```

### Footer Structure (All Pages)

```html
Footer (4-column layout)
├── Column 1: Logo + Description + Social media icons
├── Column 2: "Recent Post" + links with dates
├── Column 3: "Our Services" + service links
└── Column 4: "Subscribe" + email form

Copyright Section: "© 2017 Petro by Rudhi Sasmito - All Rights Reserved"
```

### Info Box Section (Most Pages)

```html
3-Column Info Box
├── Column 1: Phone icon + "CALL US NOW" + phone number
├── Column 2: Map icon + "COME VISIT US" + address
└── Column 3: Envelope icon + "SEND US A MESSAGE" + emails
```

---

## COMMON CSS CLASSES & PATTERNS

### Bootstrap Grid System
- `.row`, `.col-sm-*`, `.col-md-*`, `.col-md-push-*`, `.col-md-pull-*`
- Container width based on device: col-sm (≤768px), col-md (≥992px)

### Section Styling
- `.section` - Main content wrapper with padding
- `.overlap` - Overlaps with previous section
- `.section-border` - Has border styling
- `.bglight` - Light background
- `.bgsection` - Colored background

### Typography
- `.section-heading` - Large section title
- `.section-heading-2` - Alternative heading style
- `.section-heading-3` - Smaller heading
- `.jumbo-heading` - Very large display text
- `.title` - Item title
- `.category` - Category tag
- `.blok-title` - Block title style
- `.lead` - Intro/lead text

### Box Components
- `.box-icon-1` - Icon + content (horizontal)
- `.box-icon-2` - Icon + content with styling
- `.box-icon-3` - Service box with lines
- `.box-icon-4` - Info box style
- `.box-image-2` - Image + text box
- `.box-image-4` - Project/portfolio card
- `.box-news-1` - News card

### Navigation & Widgets
- `.pagination` - Pagination links
- `.widget` - Sidebar widget container
- `.widget-title` - Widget heading
- `.categories`, `.portfolio_filter` - Filter/category navigation
- `.category-nav` - Navigation links

### Responsive Utilities
- `.hidden-xs`, `.hidden-sm` - Hide on small screens
- `.visible-xs`, `.visible-md` - Show on specific screens
- `.pull-left`, `.pull-right` - Float utilities

### Buttons
- `.btn` - Base button
- `.btn-primary` - Primary button
- `.btn-secondary` - Secondary button
- `.btn-cta` - Call-to-action button
- `.btn-block` - Full-width button
- `.btn-sidebar` - Sidebar button style

### Media Objects
- `.media` - Media object container
- `.media-left`, `.media-body` - Media parts
- `.media-heading` - Media title

### Utility Classes
- `.margin-bottom-30`, `.margin-bottom-50` - Spacing
- `.img-responsive` - Responsive image
- `.align-center` - Center alignment
- `.overlap-bottom` - Bottom overlap effect

---

## DATA MODEL SUMMARY FOR BLADE TEMPLATES

### About Company
- Company name, tagline, mission, vision
- Key features/pillars (3-4 items)
- Director/leader info (name, position, image, bio)
- Statistics (4 counters)
- Mission statement
- Why choose us (3 reasons with images/icons)

### Services
- Service name, description, icon, link
- Optional: pricing, category

### Products/Projects
- Product name, title, image, category, link
- Multiple categories per product for filtering
- Featured/highlighted status

### Product Detail
- Product name, description, images
- Project details (client, location, completion date)
- Contact information
- Related/previous/next products

### News/Blog
- Post title, excerpt, featured image
- Publication date, author
- Category, tags
- Comment count

### Blog Detail
- Post title, full content
- Featured image
- Meta (date, author, category, comments)
- Comments with replies
- Author info
- Related/archive data
- Tags list

### Contact
- Form fields (name, email, subject, message)
- Contact info (address, phone, email, hours)
- Map location (latitude, longitude)
- Optional: company brochure download

---

## BLADE TEMPLATE NAMING CONVENTIONS

Based on the HTML structure analysis:

1. **Layouts:**
   - `layouts/app.blade.php` - Main layout with header/footer
   - `layouts/sidebar-right.blade.php` - 8:4 column layout (used in detail pages)

2. **Components:**
   - `components/header.blade.php`
   - `components/footer.blade.php`
   - `components/topbar.blade.php`
   - `components/navbar.blade.php`
   - `components/banner.blade.php` - Page title + breadcrumb
   - `components/info-box.blade.php` - 3-column contact info
   - Various box components (icon-box-1, icon-box-2, etc.)

3. **Pages:**
   - `about/index.blade.php`
   - `services/index.blade.php`
   - `products/index.blade.php` or `projects/index.blade.php`
   - `products/show.blade.php`
   - `blog/index.blade.php` or `news/index.blade.php`
   - `blog/show.blade.php`
   - `contact/index.blade.php`
