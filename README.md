# Nathan West Michigan Realty — WordPress Block Theme

A premium, modern real estate lead-generation theme built for Nathan's West Michigan real estate business. Designed for first-time buyers and VA buyers in Grand Rapids, Grand Haven, Lowell, Rockford, and surrounding communities.

---

## Table of Contents

1. [Theme Overview](#theme-overview)
2. [Local Development Setup](#local-development-setup)
3. [Theme File Structure](#theme-file-structure)
4. [Installing on WordPress](#installing-on-wordpress)
5. [Initial Site Configuration](#initial-site-configuration)
6. [Updating Content](#updating-content)
7. [Adding Photos & Media](#adding-photos--media)
8. [Connecting Contact Forms](#connecting-contact-forms)
9. [Connecting IDX / MLS Listings](#connecting-idx--mls-listings)
10. [SEO Setup (Rank Math / Yoast)](#seo-setup)
11. [Performance Optimization](#performance-optimization)
12. [Going Live Checklist](#going-live-checklist)

---

## Theme Overview

**Theme Name:** Nathan West Michigan Realty  
**Theme Slug:** `nathan-west-michigan-realty`  
**WordPress Version:** 6.3+ (block theme / FSE)  
**PHP Version:** 8.0+  

### Design System

| Token | Value |
|-------|-------|
| Navy | `#0B1F3A` |
| White | `#FFFFFF` |
| Light Gray | `#F5F7FA` |
| Dark Text | `#111827` |
| Gold Accent | `#C8A96B` |
| Heading Font | Montserrat (Google Fonts) |
| Body Font | Inter (Google Fonts) |

### Custom Post Types

| Post Type | Purpose |
|-----------|---------|
| `area_guide` | City/area landing pages (Grand Rapids, Grand Haven, etc.) |
| `testimonial` | Client reviews for display on homepage / pages |
| `listing_preview` | Manual property listings (before IDX is connected) |

---

## Local Development Setup

### Option A: LocalWP (Recommended for Beginners)

1. Download and install [LocalWP](https://localwp.com) (free)
2. Create a new WordPress site (PHP 8.x, latest WordPress)
3. Click "Go to site folder" → navigate to `wp-content/themes/`
4. Copy the `nathan-west-michigan-realty` folder into that directory
5. In LocalWP, open the WordPress admin → Appearance → Themes → Activate

### Option B: WAMP / XAMPP / Laragon

1. Install your local server (Laragon is recommended on Windows)
2. Place your WordPress install in the `www` directory
3. Copy the theme folder to `wp-content/themes/`
4. Activate via WordPress admin

### Option C: WP-CLI (Advanced)

```bash
# Navigate to your WordPress root
cd /path/to/wordpress

# Install the theme
wp theme activate nathan-west-michigan-realty

# Flush rewrite rules
wp rewrite flush
```

---

## Theme File Structure

```
nathan-west-michigan-realty/
│
├── style.css                    # Theme header (required by WordPress)
├── functions.php                # Main entry point — loads all includes
├── theme.json                   # Global design tokens, colors, typography, spacing
├── index.php                    # Required fallback (empty)
│
├── inc/                         # PHP includes
│   ├── theme-setup.php          # Theme supports, nav menus, image sizes, Customizer
│   ├── enqueue.php              # Scripts and styles (Google Fonts, theme.css, theme.js)
│   ├── custom-post-types.php    # area_guide, testimonial, listing_preview CPTs + meta
│   └── block-patterns.php      # Pattern category registration
│
├── templates/                   # Full page templates (block HTML)
│   ├── front-page.html          # Homepage (auto-assigned)
│   ├── home.html                # Blog post index
│   ├── single.html              # Single blog post
│   ├── page.html                # Default page template
│   ├── archive.html             # Category / tag / date archives
│   ├── 404.html                 # 404 Not Found page
│   ├── blank.html               # No header/footer (for landing pages)
│   ├── page-buy.html            # Buy a Home page
│   ├── page-sell.html           # Sell Your Home page
│   ├── page-va-loans.html       # VA Loans page (with sidebar + form)
│   ├── page-first-time-buyers.html
│   ├── page-about.html          # About Nathan
│   ├── page-contact.html        # Contact page (with contact info + form placeholder)
│   ├── page-home-valuation.html # Free Home Valuation page
│   ├── page-featured-listings.html  # Listings grid + IDX placeholder
│   ├── page-area-landing.html   # City/area landing page (for area_guide CPT)
│   ├── page-neighborhood-guide.html # Neighborhood guide template
│   ├── page-privacy.html        # Privacy Policy
│   └── page-terms.html          # Terms of Use
│
├── parts/                       # Template parts (reusable sections)
│   ├── header.html              # Sticky dark navy header + navigation
│   └── footer.html              # 4-column footer + disclaimer
│
├── patterns/                    # Block patterns (appear in Pattern Inserter)
│   ├── hero.php                 # Full-screen homepage hero
│   ├── trust-strip.php          # 4 credibility items below hero
│   ├── featured-listings.php    # 3 listing cards + IDX placeholder
│   ├── process-section.php      # 3-step buyer process
│   ├── area-cards.php           # 4 city/area cards (GR, GH, Lowell, Rockford)
│   ├── lead-magnet.php          # Email capture for free buyer guide/VA guide
│   ├── about-preview.php        # Agent photo + short story + CTAs
│   ├── testimonials.php         # 3 testimonial cards + social proof bar
│   ├── final-cta.php            # Dark navy closing CTA section
│   └── page-hero.php            # Compact interior page hero banner
│
└── assets/
    ├── css/
    │   └── theme.css            # All custom CSS (complements theme.json)
    ├── js/
    │   └── theme.js             # Progressive enhancement JS
    └── images/
        ├── placeholder-readme.txt   # Image replacement instructions
        └── hero-placeholder.jpg     # Hero image placeholder (replace this!)
```

---

## Installing on WordPress

### Method 1: Upload via WordPress Admin (Easiest)

1. Zip the `nathan-west-michigan-realty` folder (right-click → Compress/Zip)
2. Log in to your WordPress admin (`yoursite.com/wp-admin`)
3. Go to **Appearance → Themes → Add New Theme → Upload Theme**
4. Choose your zip file → click **Install Now**
5. Click **Activate**
6. Go to **Settings → Permalinks** → click **Save Changes** (flushes rewrite rules for CPTs)

### Method 2: FTP / File Manager

1. Connect via FTP (FileZilla) or use your host's File Manager
2. Navigate to `wp-content/themes/`
3. Upload the `nathan-west-michigan-realty` folder
4. Activate via **Appearance → Themes**
5. Flush permalinks (Settings → Permalinks → Save)

### Method 3: cPanel File Manager

1. Log into cPanel → File Manager
2. Navigate to `public_html/wp-content/themes/` (or wherever WordPress is installed)
3. Upload and extract the theme zip
4. Activate in WordPress admin

---

## Initial Site Configuration

After activating the theme, follow these steps in order:

### 1. Set Homepage

- Go to **Settings → Reading**
- Set "Your homepage displays" to **A static page**
- Set **Homepage** to the page titled "Home" (create it if needed)
- Set **Posts page** to a page titled "Blog"

### 2. Assign Templates to Pages

Create these pages in WordPress and assign the matching template:

| Page Title | Slug | Template to Assign |
|-----------|------|-------------------|
| Home | `/` | *(front-page.html is automatic)* |
| Buy a Home | `/buy` | **Buy Page** |
| Sell Your Home | `/sell` | **Sell Page** |
| VA Loans | `/va-loans` | **VA Loans Page** |
| First-Time Buyers | `/first-time-buyers` | **First-Time Buyers Page** |
| About | `/about` | **About Page** |
| Contact | `/contact` | **Contact Page** |
| Home Valuation | `/home-valuation` | **Home Valuation Page** |
| Featured Listings | `/featured-listings` | **Featured Listings Page** |
| Blog | `/blog` | *(set as Posts Page in Reading settings)* |
| Privacy Policy | `/privacy-policy` | **Privacy Policy Page** |
| Terms of Use | `/terms` | **Terms Page** |

To assign a template: Edit the page → look for "Template" in the right sidebar → select the template.

### 3. Set Up Navigation Menu

- Go to **Appearance → Editor → Navigation** (or use the Site Editor)
- Assign your primary navigation menu links

### 4. Upload Your Logo

- Go to **Appearance → Editor → Header** template part
- Click the logo block → upload your logo
- Recommended: SVG or PNG with transparent background, max height 200px

### 5. Update Contact Info

- Go to **Appearance → Customize**
- You'll find fields for: Phone Number, Contact Email, License Number, Brokerage Name
- These appear in the footer automatically

### 6. Flush Permalinks

- **Settings → Permalinks → Save Changes** (do this after any CPT changes)

---

## Updating Content

### Homepage Sections

The homepage (`front-page.html`) is built from reusable patterns. Edit each section in the Site Editor:

1. Go to **Appearance → Editor**
2. Click **Templates → Front Page**
3. Click any section to edit it inline

Each section corresponds to a pattern:
- **Hero**: Edit headline, subheadline, CTA button links
- **Trust Strip**: Edit the 4 credibility items and icons
- **Featured Listings**: Replace placeholder cards with real listing data
- **Process**: Edit the 3 steps text
- **Area Cards**: Edit city names, descriptions, and links; replace placeholder images
- **Lead Magnet**: Edit offer headline and update the form with your email marketing tool
- **About Preview**: Replace agent photo, edit bio text
- **Testimonials**: Replace with real client testimonials
- **Final CTA**: Edit headline and CTA buttons

### Blog Posts

- Go to **Posts → Add New**
- Use the block editor to write your content
- Add a featured image (recommended: 900×600px)
- Assign a category (e.g., "VA Loans", "First-Time Buyers", "Market Updates", "Neighborhoods")

### Area Guides

- Go to **Area Guides → Add New**
- Set the title (e.g., "Grand Rapids")
- Write the area description using blocks
- Add a featured image (800×500px)
- Assign a Neighborhood taxonomy term
- Fill in the Quick Facts in the sidebar (via the page template)
- Assign the **City / Area Landing Page** template

### Testimonials

- Go to **Testimonials → Add New**
- Title = reviewer name
- Body = the testimonial quote
- Add meta fields: reviewer city, stars (1-5), source (Google/Zillow/etc.)

### Listing Previews

- Go to **Listing Previews → Add New**
- Title = property address
- Body = property description
- Featured Image = listing photo
- Fill in custom meta: price, beds, baths, sqft, city, status, MLS ID

---

## Adding Photos & Media

### Required Photos (Replace Placeholders)

| Image | Size | Notes |
|-------|------|-------|
| Hero background | 1920×900px | West Michigan home exterior or landscape |
| Agent headshot | 600×750px | Professional, well-lit, smiling |
| Grand Rapids area | 800×500px | Skyline or neighborhood |
| Grand Haven area | 800×500px | Lighthouse or beach |
| Lowell area | 800×500px | Riverfront or downtown |
| Rockford area | 800×500px | Downtown or trails |
| Listing photos | 600×400px | Property exteriors |

### Where to Get Free Photos

- [Unsplash.com](https://unsplash.com) — search "Michigan home", "Grand Rapids", etc.
- [Pexels.com](https://pexels.com) — free commercial use
- Hire a local photographer for agent headshot (strongly recommended)

### Uploading Images in the Editor

1. Click any image block in the Site Editor
2. Click **Replace** → **Upload** → choose your file
3. WordPress will generate responsive sizes automatically

### Image Optimization

Install **ShortPixel** or **Smush** plugin to auto-compress images on upload. Target: under 150KB per image for optimal performance.

---

## Connecting Contact Forms

The contact and valuation pages have placeholder divs where you insert your form.

### Recommended Plugins (Free Options)

- **WPForms Lite** — drag-and-drop, easy
- **Contact Form 7** — flexible, widely used
- **Fluent Forms** — modern, good free tier

### Steps

1. Install your form plugin
2. Create a form with the recommended fields (see below)
3. Copy the shortcode (e.g., `[wpforms id="5"]`)
4. Go to **Appearance → Editor → Templates → Contact Page**
5. Find the placeholder div → delete it → add a **Shortcode** block → paste your shortcode

### Recommended Form Fields

**Contact Form:**
- Name (required)
- Email (required)
- Phone
- Message
- I'm interested in: [Buying / Selling / VA Loan / Just Exploring] (dropdown)
- How did you find me? (optional)

**Home Valuation Form:**
- Property Address (required)
- Bedrooms, Bathrooms, Square Footage, Year Built
- Condition (dropdown: Excellent / Good / Fair / Needs Work)
- Name, Email, Phone (required)
- Best time to contact (dropdown)

**Lead Magnet Form (for `nwmr-magnet-form`):**
The lead magnet sections use HTML forms that currently call a WordPress AJAX endpoint (`nwmr_lead_magnet`). To make them functional:
- Option A: Replace with your form plugin's shortcode (add a Shortcode block instead)
- Option B: Connect to Mailchimp/ConvertKit via a plugin like MailPoet, Mailchimp for WP, or FluentCRM
- Option C: Use a webhook to your CRM (the AJAX handler in `theme.js` is ready — wire it to your endpoint)

---

## Connecting IDX / MLS Listings

The site has placeholder zones on the Featured Listings page for IDX integration.

### Popular IDX Providers

| Provider | Notes |
|---------|-------|
| **Showcase IDX** | Popular, modern UI, WordPress plugin available |
| **iHomefinder** | Reliable, many options |
| **IDX Broker** | Full-featured, widely used |
| **Homes.com IDX** | Good free option |
| **Realtyna WPL** | Self-hosted IDX (one-time purchase) |

### Integration Steps

1. Sign up with your chosen IDX provider (usually requires MLS board approval first)
2. Install their WordPress plugin
3. Get the shortcode or widget code from their dashboard
4. In the Site Editor, go to **Templates → Featured Listings Page**
5. Find the `nwmr-idx-placeholder` div
6. Delete it and add a **Shortcode** block with your IDX shortcode

### Homepage Listings

The homepage "Featured Listings" pattern shows 3 placeholder listing cards.
Once IDX is connected, you can:
- Replace the card HTML with your IDX plugin's "featured listings" shortcode
- Or keep the manual `listing_preview` CPT cards and feature specific properties

### Hero Search Bar

The hero search form currently redirects to `/contact?search=query`.
Once IDX is connected:
1. Get your IDX search results URL pattern (e.g., `/idx-listings?q=term`)
2. Edit `assets/js/theme.js` → find the comment `// TODO: Replace with IDX search URL`
3. Replace the redirect URL with your IDX search URL

---

## SEO Setup

### Rank Math (Recommended)

1. Install **Rank Math SEO** plugin
2. Run the setup wizard
3. Set the Homepage SEO title: "Nathan | West Michigan Real Estate | First-Time & VA Buyers"
4. Set Homepage meta description: ~155 characters describing your service area and specialty
5. Create sitemaps (Rank Math does this automatically)
6. Connect Google Search Console

### Yoast SEO (Alternative)

1. Install **Yoast SEO** plugin
2. Run the configuration wizard
3. Each page/post will have Yoast meta boxes for title and description

### Page-Level SEO Tips

For each page, set:
- **Title**: Include your primary keyword + location (e.g., "VA Loans Grand Rapids MI | Nathan West Michigan Realty")
- **Meta Description**: 150-160 characters, include a CTA
- **Featured Image** (becomes Open Graph image for social sharing)

### Schema Markup

Rank Math will automatically add:
- `LocalBusiness` schema (configure your business info)
- `RealEstateListing` schema (add for listing preview pages)
- `BreadcrumbList` for interior pages
- `Article` schema for blog posts

Configure LocalBusiness schema in: **Rank Math → Titles & Meta → Local SEO**

---

## Performance Optimization

### Recommended Plugins

| Plugin | Purpose |
|--------|---------|
| **LiteSpeed Cache** or **WP Rocket** | Page caching + minification |
| **ShortPixel** | Image compression (WebP conversion) |
| **Cloudflare** | CDN + DDoS protection (free tier available) |

### Theme Performance Notes

- Google Fonts are loaded with `display=swap` for performance
- Images use native `loading="lazy"` attribute
- JS is deferred (`strategy: 'defer'`)
- The theme has no jQuery dependency
- CSS is minimal and uses CSS custom properties for efficiency

### Core Web Vitals Targets

| Metric | Target |
|--------|-------|
| LCP | < 2.5s |
| FID/INP | < 100ms |
| CLS | < 0.1 |

Biggest LCP impact: The hero background image. Ensure it's compressed and served via CDN.

---

## Going Live Checklist

Before launching, complete these items:

**Content**
- [ ] Replace all placeholder images with real photos
- [ ] Write real page content for all pages (Buy, Sell, VA Loans, First-Time Buyers, About)
- [ ] Create at least 3-5 Area Guide posts (Grand Rapids, Grand Haven, Lowell, Rockford)
- [ ] Add 3-5 real testimonials
- [ ] Write 3-5 blog posts for initial content
- [ ] Add your real contact info (phone, email) in Customizer

**Technical**
- [ ] Connect contact forms and test email delivery
- [ ] Add Google Analytics 4 (use **Site Kit by Google** plugin or paste GA4 code)
- [ ] Set up Google Search Console and submit sitemap
- [ ] Install Rank Math or Yoast and configure SEO settings
- [ ] Enable SSL/HTTPS (usually free via Let's Encrypt through your host)
- [ ] Set up daily backups (use **UpdraftPlus** plugin — free)
- [ ] Run a site speed test at [PageSpeed Insights](https://pagespeed.web.dev)

**Legal**
- [ ] Update Privacy Policy with your actual information (include contact form data collection, Google Analytics, etc.)
- [ ] Update Terms of Use
- [ ] Update footer disclaimer: real license number and brokerage
- [ ] Add real Equal Housing Opportunity notice

**Lead Generation**
- [ ] Test all contact forms (send a test submission to yourself)
- [ ] Test lead magnet form (send yourself the buyer guide)
- [ ] Verify phone number link works on mobile
- [ ] Connect your email marketing platform (Mailchimp, ConvertKit, etc.)

**IDX**
- [ ] Complete MLS board IDX approval process
- [ ] Connect IDX provider and test search functionality
- [ ] Update hero search bar to redirect to IDX search

---

## Support & Customization

To make changes to the design:
- **Colors / Typography**: Edit `theme.json`
- **Styles / Layout**: Edit `assets/css/theme.css`
- **Page structure**: Use the **Site Editor** (Appearance → Editor)
- **PHP functionality**: Edit files in the `inc/` folder

The theme is built to be fully editable from the WordPress block editor — most changes can be made without touching code.

---

*Built with ❤️ for West Michigan homebuyers and the agent who serves them.*
