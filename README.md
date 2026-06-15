# Sofia Dias — Portfolio (PHP / HTML / CSS / JS)

Static-ish portfolio site, rendered server-side with PHP.

## Files

- `index.php` — main page, renders all sections from `data.php`
- `data.php` — projects, skills, education, marquee items (edit here to update content)
- `style.css` — all styles (dark theme, electric yellow + burnt orange)
- `script.js` — smooth scroll, reveal-on-scroll, AJAX contact form
- `api/contact.php` — contact form endpoint (emails + logs to `api/messages.log`)
- `assets/portfolio/` — project images

## Run locally

Requires PHP 7.4+.

```bash
cd sofia-site
php -S localhost:8000
```

Open http://localhost:8000.

## Deploy

Upload the folder to any PHP host (shared hosting, Apache, Nginx + PHP-FPM).
For the contact form to send email, `mail()` must be configured on the server;
otherwise messages are still saved to `api/messages.log`.
