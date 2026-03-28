/* ===== AgriScience — Main JS ===== */

// Navbar scroll effect
const navbar = document.querySelector('.navbar-agri');
if (navbar) {
  window.addEventListener('scroll', () => {
    navbar.classList.toggle('scrolled', window.scrollY > 50);
  });
}

// Back to top button
const backBtn = document.querySelector('.back-to-top');
if (backBtn) {
  window.addEventListener('scroll', () => {
    backBtn.classList.toggle('show', window.scrollY > 400);
  });
  backBtn.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
  });
}

// Scroll reveal animation
const reveals = document.querySelectorAll('.reveal');
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('active');
      revealObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.15 });

reveals.forEach(el => revealObserver.observe(el));

// Counter animation
const counters = document.querySelectorAll('[data-count]');
const counterObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const el = entry.target;
      const target = parseInt(el.getAttribute('data-count'));
      const suffix = el.getAttribute('data-suffix') || '';
      const duration = 2000;
      const start = performance.now();

      function update(now) {
        const progress = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        el.textContent = Math.floor(target * eased).toLocaleString() + suffix;
        if (progress < 1) requestAnimationFrame(update);
      }
      requestAnimationFrame(update);
      counterObserver.unobserve(el);
    }
  });
}, { threshold: 0.5 });

counters.forEach(el => counterObserver.observe(el));

// Filter tabs (blogs & research pages)
document.querySelectorAll('.filter-tab').forEach(tab => {
  tab.addEventListener('click', () => {
    const group = tab.closest('.filter-tabs');
    group.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
    tab.classList.add('active');

    const filter = tab.getAttribute('data-filter');
    const cards = document.querySelectorAll('.filterable-card');
    cards.forEach(card => {
      if (filter === 'all' || card.getAttribute('data-category') === filter) {
        card.style.display = '';
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        requestAnimationFrame(() => {
          card.style.transition = 'opacity .4s ease, transform .4s ease';
          card.style.opacity = '1';
          card.style.transform = 'translateY(0)';
        });
      } else {
        card.style.display = 'none';
      }
    });
  });
});

// Close mobile menu on nav-link click
document.querySelectorAll('.navbar-agri .nav-link').forEach(link => {
  link.addEventListener('click', () => {
    const collapse = document.querySelector('#navMenu');
    if (collapse && collapse.classList.contains('show')) {
      const bsCollapse = bootstrap.Collapse.getInstance(collapse);
      if (bsCollapse) bsCollapse.hide();
    }
  });
});

// Accessibility: add aria-labels to social links
document.querySelectorAll('.footer-social a, .team-social a').forEach(link => {
  if (!link.getAttribute('aria-label')) {
    const icon = link.querySelector('i');
    if (icon) {
      const cls = icon.className;
      const name = cls.includes('facebook') ? 'Facebook' :
                   cls.includes('twitter') ? 'Twitter' :
                   cls.includes('linkedin') ? 'LinkedIn' :
                   cls.includes('instagram') ? 'Instagram' :
                   cls.includes('youtube') ? 'YouTube' : 'Social media';
      link.setAttribute('aria-label', name);
    }
  }
});

// Contact form simple validation feedback
const contactForm = document.querySelector('#contactForm');
if (contactForm) {
  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const btn = contactForm.querySelector('button[type="submit"]');
    const origText = btn.innerHTML;
    btn.innerHTML = '<i class="bi bi-check-circle me-2"></i>Message Sent!';
    btn.disabled = true;
    btn.style.background = '#40916c';
    setTimeout(() => {
      btn.innerHTML = origText;
      btn.disabled = false;
      btn.style.background = '';
      contactForm.reset();
    }, 3000);
  });
}
