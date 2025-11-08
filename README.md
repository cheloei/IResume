# IResume

IResume is a personal résumé / portfolio web application originally built with Laravel. It was one of my early projects with Laravel and demonstrates basic full‑stack web application patterns (authentication, CRUD, file uploads, and a simple administrative UI). I created this project last year while learning Laravel.

Important notes about the project
- I built this project last year with Laravel. It was an early learning project.
- I no longer specialize in Laravel — I have since moved to .NET — so I may not remember all implementation details.
- The codebase may contain bugs, rough edges, or older Laravel idioms. Treat this repository as archive-quality example work rather than a production-ready system.
- I consider this project a good showcase for my résumé despite the caveats above.

Table of contents
- About
- Features
- Tech stack
- Getting started
- Environment & configuration
- Database
- Common commands
- Testing
- Known issues & limitations
- Recommended improvements
- Contributing
- License
- Contact

About
This repository contains the source code for a résumé/portfolio site. It includes:
- A public-facing résumé and portfolio pages.
- An admin area to manage content (projects, experience, education).
- Basic authentication and file upload support.

Features
- Public résumé pages (experience, education, skills, projects).
- Admin CRUD for résumé sections and portfolio items.
- Authentication for admin access.
- File uploads (e.g., project images, profile photo).
- Simple responsive layout (mobile-first).

Tech stack
- PHP (Laravel framework)
- Composer for PHP dependency management
- MySQL or other relational database supported by Laravel
- Blade templates for server-rendered views
- HTML / CSS / basic JavaScript

Getting started (quick)
These instructions assume a Unix-like environment. Adjust for Windows as needed.

1. Clone the repo
```bash
git clone https://github.com/cheloei/IResume.git
cd IResume
```

2. Install PHP dependencies
```bash
composer install
```

3. Copy environment file and set keys
```bash
cp .env.example .env
php artisan key:generate
```

4. Configure your .env
- Set DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD
- Update MAIL_ settings if email is required

5. Run migrations (and optionally seeders)
```bash
php artisan migrate
php artisan db:seed   # optional if seeders are available
```

6. Run the application
```bash
php artisan serve
# Visit http://127.0.0.1:8000
```

Environment & configuration
- PHP >= 7.3 or 8.x (check composer.json for exact constraints)
- Composer
- A SQL database supported by Laravel (MySQL recommended)
- If you prefer Docker, add a docker-compose file or use a community Laravel Docker template (not included)

Database
- Migration files are included (check database/migrations).
- There may be seeders to create sample content; if not, create an admin user via tinker or a database insert.

Common artisan commands
- php artisan migrate --force (use with care)
- php artisan migrate:refresh
- php artisan tinker
- php artisan storage:link (if file storage is used)
```

Known issues & limitations
- I wrote this project when I was learning Laravel. The code may contain:
  - Non-idiomatic patterns or older Laravel approaches
  - Missing or thin validation in places
  - Limited or no automated tests
  - Unhandled edge cases and potential bugs
- I do not actively maintain this repository — I have moved my focus to .NET — so I may not be able to fix issues promptly.
- Use this repo primarily as a learning/resume artifact rather than a production-ready product.

Recommended improvements (if you want to update it)
- Add a test suite (unit/feature tests).
- Harden validation and authorization checks.
- Replace any deprecated Laravel APIs with current equivalents.
- Add CI (GitHub Actions) to run tests and static analysis.
- Improve frontend (use a component library or SPA framework if desired).
- Add Docker configuration for reproducible local development.

Contributing
- I welcome improvements by others. If you open issues or PRs, please:
  - Describe the change clearly.
  - Keep changes focused and small.
  - Add or update tests when applicable.
- Note: I may be slow to review changes because I’m not actively using Laravel day-to-day.

License
- This repository is provided "as-is" for demonstration and learning.
- Add a LICENSE file (MIT is common) if you want to permit reuse. If no license is present, assume "All rights reserved."

Contact
- Author: cheloei
- GitHub: https://github.com/cheloei

Acknowledgements
- Built with the Laravel framework and community packages. Thank you to the maintainers of Laravel and its ecosystem.

Final notes
This project was an important learning step for me in web development and Laravel. Although I’ve since transitioned to .NET and may not remember every detail, I keep this repository as a résumé piece and welcome constructive improvements from the community.
