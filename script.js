// Sofia Dias — interactivity

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach((a) => {
  a.addEventListener('click', (e) => {
    const id = a.getAttribute('href');
    if (!id || id === '#') return;
    const el = document.querySelector(id);
    if (!el) return;
    e.preventDefault();
    el.scrollIntoView({ behavior: 'smooth', block: 'start' });
  });
});

// Reveal-on-scroll
const toReveal = document.querySelectorAll('.section, .project, .marquee-wrap');
toReveal.forEach((el) => el.classList.add('reveal'));
const io = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      entry.target.classList.add('in');
      io.unobserve(entry.target);
    }
  });
}, { threshold: 0.12 });
toReveal.forEach((el) => io.observe(el));

// Contact form — AJAX submit to api/contact.php
const form = document.getElementById('contact-form');
const status = document.getElementById('form-status');
if (form) {
  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    status.textContent = 'Sending…';
    status.className = 'form-status';
    try {
      const res = await fetch(form.action, {
        method: 'POST',
        headers: { 'Accept': 'application/json' },
        body: new FormData(form),
      });
      const data = await res.json();
      if (data.ok) {
        status.textContent = data.message || 'Sent. Talk soon.';
        status.classList.add('ok');
        form.reset();
      } else {
        status.textContent = data.message || 'Something went wrong.';
        status.classList.add('err');
      }
    } catch (err) {
      status.textContent = 'Network error. Try again.';
      status.classList.add('err');
    }
  });
}
