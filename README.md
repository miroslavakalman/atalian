<a id="readme-top"></a>

<!-- PROJECT SHIELDS -->




<!-- PROJECT LOGO --><br /> <div align="center"> <a href="https://atalian.ru"> <img src="https://atalian.ru/logo.png" alt="Atalian Logo" width="150" height="50"> </a> <h3 align="center">Atalian Russia Corporate Website</h3> <p align="center"> Complete Laravel migration from legacy WordPress platform <br /> <a href="https://atalian.ru"><strong>Visit Live Site »</strong></a> <br /> <br /> <a href="#contact">Report Critical Issue</a> &middot; <a href="#development-setup">Local Setup</a> &middot; <a href="#architecture">View Architecture</a> </p> </div><!-- TABLE OF CONTENTS --><details> <summary>Table of Contents</summary> <ol> <li> <a href="#about-the-project">About The Project</a> <ul> <li><a href="#migration-context">Migration Context</a></li> <li><a href="#built-with">Built With</a></li> </ul> </li> <li> <a href="#getting-started">Getting Started</a> <ul> <li><a href="#prerequisites">Prerequisites</a></li> <li><a href="#installation">Installation</a></li> </ul> </li> <li><a href="#development-setup">Development Setup</a></li> <li><a href="#architecture">Architecture</a></li> <li><a href="#roadmap">Roadmap & Technical Debt</a></li> <li><a href="#maintenance">Maintenance</a></li> <li><a href="#contact">Contact</a></li> <li><a href="#acknowledgments">Acknowledgments</a></li> </ol> </details><!-- ABOUT THE PROJECT -->
About The Project

This project represents a complete ground-up rebuild of Atalian Russia's corporate website, migrating from an outdated WordPress installation to a modern Laravel application. As the sole developer, I focused on creating a maintainable, secure, and performant foundation for the company's digital presence.

Key Improvements:

Performance: ~60% reduction in page load times

Security: Eliminated WordPress vulnerabilities; implemented custom anti-spam

Maintainability: Clean Laravel architecture replacing WordPress plugin bloat

SEO: Improved structure and meta management

UX: Bilingual support (RU/EN) with seamless switching

<p align="right">(<a href="#readme-top">back to top</a>)</p>
Migration Context
Previous Platform: WordPress (outdated design, security concerns, poor performance)

New Platform: Custom Laravel 10.x application

Timeline: [October, 2025] - [January, 2026]

Developer: Single full-stack developer (end-to-end implementation)

Built With
<p align="right">(<a href="#readme-top">back to top</a>)</p><!-- GETTING STARTED -->
Getting Started
To get a local copy up and running for development or testing purposes, follow these steps.

Prerequisites
PHP 8.1+

Composer 2.0+

Node.js 18+ (for asset compilation)

SQLite 3.35+

Installation
Clone the repository

sh
git clone [internal-repository-url]
cd atalian-website
Install PHP dependencies

sh
composer install
Install NPM packages and compile assets

sh
npm install
npm run build
Copy environment file and configure

sh
cp .env.example .env
# Edit .env with local settings and Yandex Maps API key
Generate application key and run migrations

sh
php artisan key:generate
php artisan migrate --seed
Start the development server

sh
php artisan serve
<p align="right">(<a href="#readme-top">back to top</a>)</p><!-- DEVELOPMENT SETUP -->
Development Setup
Environment Configuration
Key environment variables for local development:

env
APP_ENV=local
APP_KEY=(generated via artisan)
APP_URL=http://localhost:8000

DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite

YANDEX_MAPS_API_KEY=your_test_key_here
Common Development Commands
bash
# Run development server
php artisan serve

# Compile assets for production
npm run production

# Run database migrations
php artisan migrate

# Clear application cache
php artisan optimize:clear
<p align="right">(<a href="#readme-top">back to top</a>)</p><!-- ARCHITECTURE -->
Architecture
Anti-Spam Implementation
The site uses a custom multi-layer validation system instead of CAPTCHA:

Location: app/Http/Middleware/SpamPrevention.php

Techniques: Honeypot fields, submission timing analysis, pattern detection

Result: Reduced spam from daily attacks to near-zero without impacting UX

Database Design
Choice: SQLite for simplicity in this read-heavy application

Rationale: Eliminates MySQL maintenance overhead while handling current traffic efficiently

Migration Path: Schema can be migrated to PostgreSQL if needed

Localization System
Implementation: Laravel i18n with session-based language switching

Structure: resources/lang/ru/ and resources/lang/en/ directories

Content Management: Blade templates with @lang() directives

<p align="right">(<a href="#readme-top">back to top</a>)</p><!-- ROADMAP -->
Roadmap & Technical Debt
Complete migration from WordPress to Laravel

Implement custom anti-spam solution

Deploy to production

Add comprehensive test suite

Implement CI/CD pipeline

Create admin panel for non-technical content updates

Document API integration patterns

Known Technical Debt:

Minimal test coverage (focus was on rapid production deployment)

Manual deployment process (no CI/CD)

Limited documentation for non-technical users

<p align="right">(<a href="#readme-top">back to top</a>)</p><!-- MAINTENANCE -->
Maintenance
Production Environment
Hosting: ISPManager

Deployment: Manual via Git pull

Backups: Automated database backups via cron job

Monitoring: Basic error logging; external uptime monitoring

Emergency Procedures
Server Access: Credentials stored in [Password Manager/Physical Safe]

Domain/DNS: Managed via Reg.ru

Backup Restoration: Script at scripts/restore-backup.sh

Yandex Maps API: Key rotation documented internally

<p align="right">(<a href="#readme-top">back to top</a>)</p><!-- CONTACT -->
Contact
Maintainer: Miroslava K.
Email: miroslavakalman@mail.ru - For technical/business-critical issues only

Project Status: Actively maintained in production
Last Updated: January 11, 2026

<p align="right">(<a href="#readme-top">back to top</a>)</p><!-- ACKNOWLEDGMENTS -->
Acknowledgments
Laravel Documentation

Best-README-Template

Yandex Maps API

SQLite for its simplicity and reliability

<p align="right">(<a href="#readme-top">back to top</a>)</p><!-- MARKDOWN LINKS & IMAGES -->[production-shield]: https://img.shields.io/badge/Status-Production-brightgreen?style=for-the-badge
[production-url]: https://atalian.ru
[laravel-shield]: https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[laravel-url]: https://laravel.com
[php-shield]: https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white
[php-url]: https://www.php.net
[license-shield]: https://img.shields.io/badge/License-Proprietary-blue?style=for-the-badge
[license-url]: #
[product-screenshot]: https://atalian.ru/screenshot.png
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com
[PHP.net]: https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white
[PHP-url]: https://php.net
[SQLite.org]: https://img.shields.io/badge/SQLite-07405E?style=for-the-badge&logo=sqlite&logoColor=white
[SQLite-url]: https://sqlite.org
[Yandex-shield]: https://img.shields.io/badge/Yandex_Maps-API-red?style=for-the-badge
[Yandex-url]: https://yandex.ru/dev/maps/
Key adaptations for your corporate context:
