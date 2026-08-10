/* ============================================================
   TESTIMONIALS.JS — Graphic TECH
   Dynamic slide carousel for customer reviews section connected to GTStore.
   ============================================================ */

(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {
    const track = document.getElementById('testimonialTrack');
    if (!track) return;

    // Get dynamic testimonials from GTStore if available
    const testimonials = (window.GTStore && window.GTStore.getTestimonials)
      ? window.GTStore.getTestimonials()
      : [];

    if (testimonials.length > 0) {
      track.innerHTML = '';
      const itemsPerSlide = 3;
      for (let i = 0; i < testimonials.length; i += itemsPerSlide) {
        const group = testimonials.slice(i, i + itemsPerSlide);
        const slide = document.createElement('div');
        slide.className = 't-slide';
        
        slide.innerHTML = group.map(t => `
          <div class="t-card">
            <div class="t-card__rating">
              ${'★'.repeat(t.rating || 5)}${'☆'.repeat(5 - (t.rating || 5))}
            </div>
            <p class="t-card__text">"${escapeHtml(t.comment)}"</p>
            <div class="t-card__author">
              <div class="t-card__avatar">${escapeHtml(t.avatar || 'GT')}</div>
              <div>
                <b>${escapeHtml(t.name)}</b>
                <small>${escapeHtml(t.position)}${t.company ? ', ' + escapeHtml(t.company) : ''}</small>
              </div>
            </div>
          </div>
        `).join('');
        track.appendChild(slide);
      }
    }

    const slides = Array.from(track.querySelectorAll('.t-slide'));
    if (slides.length === 0) return;

    const dotsWrap = document.getElementById('tDots');
    if (dotsWrap) {
      dotsWrap.innerHTML = '';
      slides.forEach((_, i) => {
        const dot = document.createElement('button');
        dot.className = `t-dot ${i === 0 ? 'is-active' : ''}`;
        dot.setAttribute('aria-label', `Slide ${i + 1}`);
        dotsWrap.appendChild(dot);
      });
    }

    const dots = dotsWrap ? Array.from(dotsWrap.querySelectorAll('.t-dot')) : [];
    const prevBtn = document.getElementById('tPrev');
    const nextBtn = document.getElementById('tNext');

    let index = 0;
    let autoTimer = null;

    function goTo(i) {
      index = (i + slides.length) % slides.length;
      track.style.transform = `translateX(-${index * 100}%)`;
      dots.forEach(function (d, di) { d.classList.toggle('is-active', di === index); });
    }

    function next() { goTo(index + 1); }
    function prev() { goTo(index - 1); }

    function startAuto() {
      stopAuto();
      if (slides.length > 1) {
        autoTimer = setInterval(next, 6000);
      }
    }
    function stopAuto() {
      if (autoTimer) clearInterval(autoTimer);
    }

    if (nextBtn) nextBtn.addEventListener('click', function () { next(); startAuto(); });
    if (prevBtn) prevBtn.addEventListener('click', function () { prev(); startAuto(); });
    dots.forEach(function (dot, i) {
      dot.addEventListener('click', function () { goTo(i); startAuto(); });
    });

    const wrap = track.closest('.t-track-wrap');
    if (wrap) {
      wrap.addEventListener('mouseenter', stopAuto);
      wrap.addEventListener('mouseleave', startAuto);
    }

    function escapeHtml(str) {
      if (!str) return '';
      return String(str)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#039;');
    }

    goTo(0);
    startAuto();
  });
})();
