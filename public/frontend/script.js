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

// Gallery slider (homepage) — looping carousel with autoplay, drag and dots
document.querySelectorAll('[data-gallery-slider]').forEach((slider) => {
  const track = slider.querySelector('.gallery-track');
  const controls = slider.querySelector('.gallery-controls');
  const dotsWrap = slider.querySelector('.gallery-dots');
  const prevBtn = slider.querySelector('.gallery-nav.prev');
  const nextBtn = slider.querySelector('.gallery-nav.next');
  if (!track || !controls) return;

  const slides = Array.from(track.children);
  const total = slides.length;
  if (!total) return;

  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const autoplayDelay = 5000;
  const slideDuration = 680;

  let clones = [];
  let dots = [];
  let index = 0;
  let step = 0;
  let looping = false;
  let timer = null;
  let settleTimer = null;

  const perView = () => (window.innerWidth < 576 ? 1 : window.innerWidth < 992 ? 2 : 3);
  const offsetFor = (i) => -((looping ? total + i : i) * step);

  function render(animate) {
    const animating = animate && !reduceMotion;
    track.classList.toggle('is-animating', animating);
    track.style.transform = `translate3d(${offsetFor(index)}px, 0, 0)`;
    dots.forEach((dot, i) => dot.classList.toggle('active', i === ((index % total) + total) % total));

    // Once a wrapping move has played out, snap back onto the real slides.
    clearTimeout(settleTimer);
    animating ? (settleTimer = setTimeout(normalise, slideDuration)) : normalise();
  }

  // Silently re-centre on the original slides after stepping into the clones.
  function normalise() {
    if (!looping || (index >= 0 && index < total)) return;
    index = ((index % total) + total) % total;
    track.classList.remove('is-animating');
    track.style.transform = `translate3d(${offsetFor(index)}px, 0, 0)`;
  }

  // A copy of every slide on each side lets the carousel wrap in either direction.
  function buildClones() {
    clones.forEach((clone) => clone.remove());
    clones = [];
    if (!looping) return;

    const copy = () => {
      const fragment = document.createDocumentFragment();
      slides.forEach((slide) => {
        const clone = slide.cloneNode(true);
        clone.setAttribute('aria-hidden', 'true');
        clone.querySelectorAll('a').forEach((link) => link.setAttribute('tabindex', '-1'));
        fragment.appendChild(clone);
        clones.push(clone);
      });
      return fragment;
    };

    track.insertBefore(copy(), slides[0]);
    track.appendChild(copy());
  }

  function buildDots() {
    dotsWrap.innerHTML = '';
    dots = [];
    if (!looping) return;

    for (let i = 0; i < total; i++) {
      const dot = document.createElement('button');
      dot.type = 'button';
      dot.className = 'gallery-dot';
      dot.setAttribute('aria-label', `Go to gallery ${i + 1}`);
      dot.addEventListener('click', () => { stopAutoplay(); index = i; render(true); startAutoplay(); });
      dotsWrap.appendChild(dot);
      dots.push(dot);
    }
  }

  function layout() {
    const wasLooping = looping;
    looping = total > perView();
    slider.toggleAttribute('data-static', !looping);
    controls.hidden = !looping;

    if (looping !== wasLooping) { buildClones(); buildDots(); }
    if (!looping) index = 0;

    const gap = parseFloat(getComputedStyle(track).columnGap) || 0;
    step = slides[0].getBoundingClientRect().width + gap;
    render(false);
    looping ? startAutoplay() : stopAutoplay();
  }

  function move(delta) {
    if (!looping) return;
    index += delta;
    render(true);
  }

  function startAutoplay() {
    stopAutoplay();
    if (!looping || reduceMotion) return;
    timer = setInterval(() => move(1), autoplayDelay);
  }
  function stopAutoplay() {
    if (timer) { clearInterval(timer); timer = null; }
  }

  prevBtn.addEventListener('click', () => { stopAutoplay(); move(-1); startAutoplay(); });
  nextBtn.addEventListener('click', () => { stopAutoplay(); move(1); startAutoplay(); });

  slider.addEventListener('mouseenter', stopAutoplay);
  slider.addEventListener('mouseleave', startAutoplay);
  slider.addEventListener('focusin', stopAutoplay);
  slider.addEventListener('focusout', startAutoplay);
  document.addEventListener('visibilitychange', () => (document.hidden ? stopAutoplay() : startAutoplay()));

  slider.addEventListener('keydown', (e) => {
    if (e.key !== 'ArrowLeft' && e.key !== 'ArrowRight') return;
    e.preventDefault();
    stopAutoplay();
    move(e.key === 'ArrowLeft' ? -1 : 1);
    startAutoplay();
  });

  // Pointer drag / touch swipe
  let dragStartX = 0;
  let dragDelta = 0;
  let dragging = false;

  track.addEventListener('pointerdown', (e) => {
    if (!looping || e.button !== 0) return;
    dragging = true;
    dragDelta = 0;
    dragStartX = e.clientX;
    stopAutoplay();
    track.classList.add('is-dragging');
    track.classList.remove('is-animating');
    track.setPointerCapture(e.pointerId);
  });

  track.addEventListener('pointermove', (e) => {
    if (!dragging) return;
    dragDelta = e.clientX - dragStartX;
    track.style.transform = `translate3d(${offsetFor(index) + dragDelta}px, 0, 0)`;
  });

  function endDrag(e) {
    if (!dragging) return;
    dragging = false;
    track.classList.remove('is-dragging');
    if (track.hasPointerCapture?.(e.pointerId)) track.releasePointerCapture(e.pointerId);

    const moved = Math.round(-dragDelta / step);
    index += Math.abs(dragDelta) > step * 0.15 ? (moved || (dragDelta < 0 ? 1 : -1)) : 0;
    render(true);
    startAutoplay();
  }

  track.addEventListener('pointerup', endDrag);
  track.addEventListener('pointercancel', endDrag);

  // Swallow the click that ends a drag so it does not open the gallery
  track.addEventListener('click', (e) => {
    if (Math.abs(dragDelta) > 6) { e.preventDefault(); e.stopPropagation(); }
    dragDelta = 0;
  }, true);

  let resizeTimer = null;
  window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(layout, 150);
  });

  layout();
  window.addEventListener('load', layout);
});
