(function () {
  const esc = (s) => String(s).replace(/[&<>"']/g, (c) => ({ "&":"&amp;","<":"&lt;",">":"&gt;","\"":"&quot;","'":"&#39;" }[c]));
  const D = window.SITE_DATA || { marquee: [], projects: [], skills: [], education: [] };

  // Year
  const y = document.getElementById("year");
  if (y) y.textContent = new Date().getFullYear();

  // Marquee
  const mq = document.getElementById("marquee");
  if (mq) {
    let html = "";
    for (let r = 0; r < 3; r++) {
      D.marquee.forEach((t) => {
        html += `<span class="marquee-item">${esc(t)} <span class="accent">✦</span></span>`;
      });
    }
    mq.innerHTML = html;
  }

  // Projects
  const pr = document.getElementById("projects");
  if (pr) {
    pr.innerHTML = D.projects.map((p, i) => `
      <article class="project ${i % 2 === 1 ? "reverse" : ""}">
        <div class="project-media">
          <img src="${esc(p.img)}" alt="${esc(p.title)}" loading="lazy" />
          <span class="tag">${esc(p.tag)}</span>
        </div>
        <div class="project-body">
          <div class="project-meta">
            <span>${esc(p.n)}</span><span class="rule"></span><span>${esc(p.year)}</span>
          </div>
          <h3 class="display project-name">${esc(p.title)}</h3>
          <p class="muted">${esc(p.copy)}</p>
        </div>
      </article>`).join("");
  }

  // Skills
  const sg = document.getElementById("skills-grid");
  if (sg) {
    sg.innerHTML = D.skills.map((g) => `
      <div>
        <h3 class="skill-head">${esc(g.title)}</h3>
        <ul class="skill-list">${g.items.map((it) => `<li class="display">${esc(it)}</li>`).join("")}</ul>
      </div>`).join("");
  }

  // Education
  const el = document.getElementById("edu-list");
  if (el) {
    el.innerHTML = D.education.map((e) => `
      <li class="edu-item">
        <span class="edu-year">${esc(e.year)}</span>
        <div class="edu-body">
          <h3 class="display edu-title">${esc(e.title)}</h3>
          <p class="muted">${esc(e.place)}</p>
        </div>
        ${e.tag ? `<span class="edu-tag">${esc(e.tag)}</span>` : ""}
      </li>`).join("");
  }

  // Smooth scroll
  document.querySelectorAll('a[href^="#"]').forEach((a) => {
    a.addEventListener("click", (ev) => {
      const id = a.getAttribute("href");
      if (id && id.length > 1) {
        const target = document.querySelector(id);
        if (target) { ev.preventDefault(); target.scrollIntoView({ behavior: "smooth", block: "start" }); }
      }
    });
  });

  // Contact form → mailto
  const form = document.getElementById("contact-form");
  const status = document.getElementById("form-status");
  if (form) {
    form.addEventListener("submit", (ev) => {
      ev.preventDefault();
      const name = form.name.value.trim();
      const email = form.email.value.trim();
      const message = form.message.value.trim();
      if (!name || !email || !message) {
        if (status) status.textContent = "Please fill in every field.";
        return;
      }
      const subject = encodeURIComponent(`New message from ${name}`);
      const body = encodeURIComponent(`${message}\n\n— ${name} (${email})`);
      window.location.href = `mailto:sofia.gr.13@gmail.com?subject=${subject}&body=${body}`;
      if (status) status.textContent = "Opening your email client…";
    });
  }
})();
