# Graphic TECH

Laravel 12 application for the Graphic TECH marketing site: a public site
(home + one page per service, DB-driven) and a session-authenticated admin
dashboard for managing portfolio items, hero banners, promotional posters,
testimonials, and inbox messages.

## Stack

- Laravel 12 / PHP 8.2+, SQLite by default (see `config/database.php`)
- Plain hand-written CSS/JS served from `public/css` and `public/js` —
  **no** Vite/Tailwind/Node build step. Blade views link assets with the
  `asset()` helper directly.
- Blade views only, no SPA framework. Public pages use a shared layout
  (`resources/views/layouts/app.blade.php` + `resources/views/partials/*`);
  the admin dashboard (`resources/views/admin/*`) is a self-contained view
  with its own inline styles and `public/js/admin.js`.

## Structure

```
app/Http/Controllers/          HomeController, AdminController, MessageController
app/Http/Controllers/Admin/    CRUD controllers for the dashboard (Portfolio, Banner,
                                Testimonial, Message, Poster)
app/Models/                    Service, Portfolio, Banner, Poster, Testimonial, Message, User
app/Support/PlaceholderImage.php   Generates a data-URI SVG placeholder when a
                                    record has no real uploaded image yet
database/migrations/           Services own portfolios/posters via service_id FK
database/seeders/              Seeds the 6 services (with page content as JSON),
                                sample portfolio/banners/testimonials/messages,
                                and the admin user
resources/views/               home.blade.php (public homepage),
                                pages/service.blade.php (dynamic — one Service
                                record renders every /pages/{slug} service page),
                                pages/about.blade.php, admin/*
routes/web.php                 Public routes + auth-gated /admin/* routes
routes/api.php                 Public read-only JSON endpoints (GET only)
public/                        Document root — css/, js/, assets/, index.php
```

## Setup

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
php artisan serve
```

Visit `http://localhost:8000`. Admin dashboard: `http://localhost:8000/admin`
(redirects to the login form if not authenticated).

Default admin login (seeded by `DatabaseSeeder`):

- Username: `admin` (or the full email `admin@graphictech.co.th`)
- Password: `1234`

**Change this password** via Admin → Settings before using this anywhere
beyond local development.

## Admin dashboard

Everything in the dashboard writes to the real database (SQLite by
default) through the routes under `routes/web.php`'s `auth`-protected
`/admin` group — there is no client-side-only/localStorage data layer.
Sections:

- **Portfolio** — add/edit/delete work samples. The category select maps
  1:1 to a `Service` name, so items are linked to `service_id`
  automatically and show up on that service's page.
- **Banners** — the homepage hero slider.
- **Posters** — promotional images shown on a specific service page (or
  every page if left unassigned).
- **Testimonials**, **Messages** (contact form inbox), **Settings**
  (display name / password for the logged-in admin user).

## Notes

- Images can be a pasted URL or an uploaded file (stored as a base64
  data-URI directly in the database column — fine for a small/medium
  catalog; move to real file storage + `storage/app/public` if the
  library grows large).
- `routes/api.php` exposes read-only `GET /api/portfolio`, `/api/banners`,
  `/api/testimonials` for any future external/mobile consumer; nothing in
  this app currently calls them.
