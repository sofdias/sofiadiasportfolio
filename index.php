<?php require __DIR__ . '/data.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sofia Dias — Graphic Designer</title>
  <meta name="description" content="Portfolio of Sofia Dias — graphic designer based in Lisbon. Visual identity, editorial, digital design and brand systems." />
  <meta property="og:title" content="Sofia Dias — Graphic Designer" />
  <meta property="og:description" content="Visual identity, editorial, digital design and brand systems by Sofia Dias." />
  <meta property="og:type" content="website" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Space+Grotesk:wght@400;500;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css" />
</head>
<body class="noise">

<header class="nav">
  <div class="container nav-inner">
    <a href="#top" class="brand">SOFIA<span class="accent">.</span>DIAS</a>
    <nav class="nav-links">
      <a href="#work">Work</a>
      <a href="#about">About</a>
      <a href="#skills">Toolkit</a>
      <a href="#contact">Contact</a>
    </nav>
    <a href="#contact" class="btn btn-primary nav-cta">Let's talk →</a>
  </div>
</header>

<section id="top" class="hero">
  <div class="grid-lines"></div>
  <div class="container hero-inner">
    <div class="eyebrow"><span class="bar"></span><span>Lisbon, PT · Available for freelance</span></div>
    <h1 class="display hero-title">Graphic<br/><span>designer</span><span class="accent">.</span></h1>
    <div class="hero-sub">
      <p>I build identities, editorial systems and digital work for brands that want to look sharper than the room they walk into. Ten years across print, e-commerce and screens — quiet on the surface, loud in the details.</p>
    </div>
    <div class="hero-ctas">
      <a href="#work" class="btn btn-primary">See the work <span>↓</span></a>
      <a href="#contact" class="btn btn-ghost">Start a project</a>
    </div>
  </div>
</section>

<div class="marquee-wrap">
  <div class="marquee display">
    <?php for ($r=0; $r<3; $r++): foreach ($marquee_items as $t): ?>
      <span class="marquee-item"><?= htmlspecialchars($t) ?> <span class="accent">✦</span></span>
    <?php endforeach; endfor; ?>
  </div>
</div>

<section id="about" class="section">
  <div class="container grid-12">
    <div class="col-3"><p class="kicker">(About)</p></div>
    <div class="col-9">
      <p class="display about-headline">Quietly obsessed with type, grids and the thing that makes a brand feel <span class="accent">true</span>.</p>
      <div class="about-grid">
        <p>I'm Sofia — born in Geneva, rooted in Portugal, currently in Lisbon. A Bachelor in Communication Design and a Master's in Graphic Design from IPCB, sharpened by an Erasmus+ stint at a Brussels digital agency.</p>
        <p>Four years leading design at CARISPIBET shipped hundreds of e-commerce assets across Amazon and Shopify. The rest is freelance — logos, full identities, editorial, photography — for clients who needed a steady hand and a strong opinion.</p>
      </div>
    </div>
  </div>
</section>

<section id="work" class="section divider">
  <div class="container">
    <div class="work-head">
      <div>
        <p class="kicker">(Selected Work)</p>
        <h2 class="display work-title">Projects /</h2>
      </div>
      <p class="meta"><?= count($projects) ?> of many</p>
    </div>
    <div class="projects">
      <?php foreach ($projects as $i => $p): $rev = ($i % 2 === 1); ?>
        <article class="project <?= $rev ? 'reverse' : '' ?>">
          <div class="project-media">
            <img src="<?= htmlspecialchars($p['img']) ?>" alt="<?= htmlspecialchars($p['title']) ?>" loading="lazy" />
            <span class="tag"><?= htmlspecialchars($p['tag']) ?></span>
          </div>
          <div class="project-body">
            <div class="project-meta">
              <span><?= htmlspecialchars($p['n']) ?></span>
              <span class="rule"></span>
              <span><?= htmlspecialchars($p['year']) ?></span>
            </div>
            <h3 class="display project-name"><?= htmlspecialchars($p['title']) ?></h3>
            <p class="muted"><?= htmlspecialchars($p['copy']) ?></p>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section id="skills" class="section divider tinted">
  <div class="container grid-12">
    <div class="col-4">
      <p class="kicker">(Toolkit)</p>
      <h2 class="display skills-title">Sharp<br/>tools.<br/><span class="accent">Sharper</span><br/>instincts.</h2>
    </div>
    <div class="col-8 skills-grid">
      <?php foreach ($skills as $g): ?>
        <div>
          <h3 class="skill-head"><?= htmlspecialchars($g['title']) ?></h3>
          <ul class="skill-list">
            <?php foreach ($g['items'] as $it): ?>
              <li class="display"><?= htmlspecialchars($it) ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section divider">
  <div class="container grid-12">
    <div class="col-4">
      <p class="kicker">(Education)</p>
      <h2 class="display skills-title">Always<br/>studying.</h2>
    </div>
    <ol class="col-8 edu-list">
      <?php foreach ($education as $e): ?>
        <li class="edu-item">
          <span class="edu-year"><?= htmlspecialchars($e['year']) ?></span>
          <div class="edu-body">
            <h3 class="display edu-title"><?= htmlspecialchars($e['title']) ?></h3>
            <p class="muted"><?= htmlspecialchars($e['place']) ?></p>
          </div>
          <?php if (!empty($e['tag'])): ?>
            <span class="edu-tag"><?= htmlspecialchars($e['tag']) ?></span>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<section id="contact" class="section divider contact">
  <div class="grid-lines"></div>
  <div class="container">
    <p class="kicker">(Contact)</p>
    <h2 class="display contact-title">Got a brief<span class="accent">?</span><br/>
      <a href="mailto:sofia.gr.13@gmail.com" class="contact-link">Send it.</a>
    </h2>

    <form id="contact-form" class="contact-form" action="api/contact.php" method="post" novalidate>
      <div class="field">
        <label for="name">Name</label>
        <input id="name" name="name" type="text" required />
      </div>
      <div class="field">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" required />
      </div>
      <div class="field field-full">
        <label for="message">Brief</label>
        <textarea id="message" name="message" rows="4" required></textarea>
      </div>
      <div class="field-full form-actions">
        <button type="submit" class="btn btn-primary">Send brief →</button>
        <p id="form-status" class="form-status" role="status"></p>
      </div>
    </form>

    <div class="contact-grid">
      <div>
        <p class="muted-label">Email</p>
        <a href="mailto:sofia.gr.13@gmail.com">sofia.gr.13@gmail.com</a>
      </div>
      <div>
        <p class="muted-label">Phone</p>
        <a href="tel:+351965509730">+351 965 509 730</a>
      </div>
      <div>
        <p class="muted-label">Elsewhere</p>
        <a href="https://linkedin.com/in/sofia-dias" target="_blank" rel="noreferrer">LinkedIn ↗</a>
        <p class="muted">Odivelas, Lisbon</p>
      </div>
    </div>
  </div>
</section>

<footer class="footer">
  <div class="container footer-inner">
    <span>© <?= date('Y') ?> Sofia Dias</span>
    <span>Designed &amp; built with care in Lisbon</span>
  </div>
</footer>

<script src="script.js"></script>
</body>
</html>
