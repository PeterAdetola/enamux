# Enamux Structural Engineering - Laravel Website

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![License](https://img.shields.io/badge/License-Proprietary-blue?style=for-the-badge)

A professional structural engineering consultancy website built with Laravel, featuring a markdown-based project gallery system and automated GitHub deployment.

---

## 📋 Table of Contents

- [About](#about)
- [Features](#features)
- [Technology Stack](#technology-stack)
- [Project Structure](#project-structure)
- [Installation](#installation)
- [Configuration](#configuration)
- [Markdown Projects System](#markdown-projects-system)
- [Deployment](#deployment)
- [Brand Guidelines](#brand-guidelines)
- [Contributing](#contributing)
- [License](#license)

---

## 🏢 About

Enamux is a leading structural engineering consultancy firm specializing in complex, large-scale infrastructure projects across Nigeria. This website showcases our portfolio of projects including multi-purpose arenas, residential developments, adaptive reuse projects, and academic infrastructure.

**Location:** Lagos, Nigeria  
**Website:** [enamux.test](https://enamux.test)  
**Established:** 2020

---

## ✨ Features

### Core Features
- 🏗️ **Project Portfolio System** - Markdown-based project gallery with flexible layouts
- 📱 **Responsive Design** - Mobile-first approach with Bootstrap grid
- 🎨 **Brand Compliance** - Oswald typography with strict brand guidelines
- 🔄 **Auto-Deployment** - GitHub webhook integration for automated updates
- 📊 **Project Categories** - Filter by type (Arena, Residential, Academic, etc.)
- 🖼️ **Image Galleries** - Organized by drawing type (Plans, 3D, Sections)

### Technical Features
- ⚡ **No Database for Projects** - File-based content management
- 🔍 **SEO Optimized** - Clean URLs and meta tags
- 🎯 **DirectAdmin Compatible** - No SSH/Git required on server
- 📦 **Helper Functions** - Easy project retrieval throughout the app
- 🔐 **Secure Webhooks** - HMAC signature verification
- 📝 **Comprehensive Logging** - Deployment tracking and debugging

---

## 🛠️ Technology Stack

### Backend
- **Laravel 10.x** - PHP Framework
- **PHP 8.1+** - Server-side language
- **Composer** - Dependency management

### Frontend
- **Bootstrap 5** - CSS Framework
- **Owl Carousel** - Image carousels
- **Oswald Font** - Brand typography
- **Merriweather Font** - Body text

### Development & Deployment
- **Git/GitHub** - Version control
- **GitHub Actions** - CI/CD via webhooks
- **DirectAdmin** - Server management
- **FTP/File Manager** - Manual deployments (fallback)

### Content Management
- **Markdown** - Project content format
- **YAML Frontmatter** - Project metadata
- **CommonMark** - Markdown parser

---

## 📁 Project Structure

```
enamux_laravel/
├── app/
│   ├── Helpers/
│   │   ├── AppHelpers.php           # Helper functions
│   │   └── ProjectGalleryParser.php # Markdown parser
│   ├── Http/Controllers/
│   │   └── ProjectController.php    # Projects controller
│   └── Models/
├── public/
│   ├── frontend/                    # Frontend assets
│   │   ├── assets/
│   │   │   ├── css/
│   │   │   ├── js/
│   │   │   └── img/
│   ├── projects/                    # Project files (markdown-based)
│   │   ├── 042_arena/
│   │   │   ├── project.md
│   │   │   └── images/
│   │   ├── chateau_house/
│   │   └── rangers_hotel/
│   ├── uploads/                     # User uploads
│   └── github-deploy.php            # Auto-deploy webhook
├── resources/
│   └── views/
│       ├── frontend/
│       │   ├── main_master.blade.php
│       │   └── projects/
│       │       ├── index.blade.php
│       │       └── show.blade.php
├── routes/
│   └── web.php
├── storage/
│   └── logs/
│       └── deploy.log               # Deployment logs
├── .env.example
├── .gitignore
├── composer.json
├── README.md
└── package.json
```

---

## 🚀 Installation

### Prerequisites
- PHP 8.1 or higher
- Composer
- Node.js & NPM (for assets)
- MySQL/MariaDB (for general Laravel features)

### Local Development Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/YOUR_USERNAME/enamux.git
   cd enamux
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configure database** (edit `.env`)
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=enamux
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Run migrations** (if needed)
   ```bash
   php artisan migrate
   ```

6. **Build assets**
   ```bash
   npm run dev
   ```

7. **Start development server**
   ```bash
   php artisan serve
   ```

8. **Visit:** `http://localhost:8000`

---

## ⚙️ Configuration

### Environment Variables

Key `.env` variables:

```env
APP_NAME=Enamux
APP_ENV=production
APP_DEBUG=false
APP_URL=https://enamux.test

# Database
DB_CONNECTION=mysql
DB_DATABASE=enamux

# Mail (if needed)
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
```

### Autoload Helpers

Ensure helpers are autoloaded in `composer.json`:

```json
"autoload": {
    "files": [
        "app/Helpers/AppHelpers.php"
    ]
}
```

Then run:
```bash
composer dump-autoload
```

---

## 📝 Markdown Projects System

### Overview

Projects are stored as markdown files instead of database records, providing:
- ✅ Version control for content
- ✅ Easy editing without database access
- ✅ Flexible content structure per project
- ✅ Git-based content management

### Project Structure

Each project folder contains:
```
public/projects/042_arena/
├── project.md              # Content & metadata
└── images/                 # All project images
    ├── structural_plan/
    ├── structural_3d/
    ├── architectural_section/
    └── steel_roof_details/
```

### Project.md Format

```markdown
---
title: "042 Arena"
location: "Enugu State"
project_type: "Multi-Purpose Arena"
capacity: "20,000 seats"
icon: "img/icons/arena-icon.png"
order: 1
featured: true
---

## Project Overview
Your project description here...

## Design Strategy
More content...

---

## Gallery Configuration

### Structural Plans

\```gallery
columns: 3
images:
  - structural_plan/foundation_plan.jpg
  - structural_plan/ground_floor_plan.jpg
\```

### Architectural 3D

\```gallery
columns: 2
images:
  - architectural_3d/view_01.jpg
  - architectural_3d/view_02.jpg
\```
```

### Adding a New Project

1. **Create folder:**
   ```bash
   mkdir -p public/projects/your_project_slug/images
   ```

2. **Create project.md:**
   ```bash
   touch public/projects/your_project_slug/project.md
   ```

3. **Add metadata and content** (see format above)

4. **Upload images** to appropriate subfolders

5. **Commit and push:**
   ```bash
   git add public/projects/your_project_slug/
   git commit -m "Add new project: Your Project Name"
   git push origin main
   ```

6. **Wait 30 seconds** - site updates automatically! ✨

### Helper Functions

```php
// Get all projects
$projects = getProjects();

// Get single project
$project = getProject('042_arena');

// Get featured projects
$featured = getFeaturedProjects(3);

// Get by type
$residential = getProjectsByType('Luxury Residential');

// Get recent projects
$recent = getRecentProjects(5);
```

---

## 🚀 Deployment

### Automated Deployment (Recommended)

The project uses GitHub webhooks for automatic deployment:

1. **Push to GitHub:**
   ```bash
   git push origin main
   ```

2. **GitHub webhook triggers** `public/github-deploy.php`

3. **Script automatically:**
    - Downloads latest code
    - Updates files
    - Preserves uploads & projects
    - Syncs public directory
    - Logs deployment

4. **Site updated in 30-60 seconds!** ✅

### Manual Deployment (Fallback)

If webhook fails:

1. **ZIP your project** (exclude vendor, node_modules)
2. **Upload via DirectAdmin File Manager**
3. **Extract to** `enamux_laravel/`
4. **Run via SSH** (if available):
   ```bash
   composer install --no-dev
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

### Monitoring Deployments

**View logs via File Manager:**
- Navigate to: `enamux_laravel/storage/logs/deploy.log`

**Check webhook status:**
- GitHub → Repository → Settings → Webhooks
- View "Recent Deliveries"

---

## 🎨 Brand Guidelines

### Typography

**Headings (Oswald):**
- Font: `'Oswald', sans-serif`
- Weight: `400` (Regular)
- Transform: `uppercase`
- Letter-spacing: `5px - 15px` (varies by size)

**Body Text (Merriweather):**
- Font: `'Merriweather', serif`
- Line-height: `1.8`

**Color Palette:**
- Primary: `#1A2B45` (Dark blue)
- Accent: `#c0996b` (Gold/Tan)
- Background: `#253855` (Brand secondary)
- Text: `#666` (Body text)

**Heading Sizes:**
- H1: `40-48px`
- H2: `35-40px`
- H4: `20-24px`
- H6: `20px`

### Example Usage

```html
<h2 class="section-title" style="font-size: 40px; text-transform: uppercase; letter-spacing: 10px; word-spacing: 5px;">
    OUR <span style="color: #c0996b;">PROJECTS</span>
</h2>
```

---

## 🤝 Contributing

This is a private commercial project. External contributions are not accepted.

### Internal Development Workflow

1. Create feature branch
2. Make changes
3. Test locally
4. Push to main
5. Auto-deploy handles the rest

---

## 📄 License

Proprietary - © 2020-2026 Enamux Structural Engineering Consultants

All rights reserved. This software and associated documentation files are the property of Enamux and may not be copied, modified, or distributed without explicit permission.

---

## 📞 Contact

**Enamux Structural Engineering Consultants**

- **Website:** [enamux.test](https://enamux.test)
- **Email:** info@enamux.test
- **Location:** Lagos, Nigeria

---

## 🙏 Acknowledgments

- Laravel Framework
- Bootstrap CSS
- Owl Carousel
- GitHub for version control
- DirectAdmin hosting platform

---

## 📊 Project Stats

- **Laravel Version:** 10.x
- **PHP Version:** 8.1+
- **Projects:** 4+ major infrastructure projects
- **Lines of Code:** ~15,000
- **Last Updated:** February 2026

---

## 🔄 Version History

### v1.0.0 (February 2026)
- ✅ Initial release
- ✅ Markdown-based project system
- ✅ GitHub auto-deployment
- ✅ 4 showcase projects
- ✅ Brand-compliant design
- ✅ Responsive layout

---

**Built with ❤️ by the Pacmedia Creatives**
