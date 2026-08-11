/* ============================================================
   CONTACT-FORM.JS — Graphic TECH
   Client-side validation + AJAX submit for #contactForm.
   Posts to the form's own `action` (routes/web.php: messages.store)
   with the CSRF token from the page's meta tag. Falls back to a
   normal full-page POST if fetch/JS is unavailable.
   ============================================================ */

(function () {
  'use strict';

  const form = document.getElementById('contactForm');
  if (!form) return;
  const success = document.getElementById('formSuccess');

  function validateField(field) {
    const wrapper = field.closest('.field');
    if (!wrapper) return true;

    let valid = field.checkValidity();

    /* Extra check: simple email shape for the email field */
    if (field.type === 'email' && field.value.trim()) {
      valid = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value.trim());
    }

    wrapper.classList.toggle('has-error', !valid);
    return valid;
  }

  form.querySelectorAll('input[required], textarea[required]').forEach(function (field) {
    field.addEventListener('blur', function () { validateField(field); });
    field.addEventListener('input', function () {
      if (field.closest('.field').classList.contains('has-error')) validateField(field);
    });
  });

  form.addEventListener('submit', function (e) {
    e.preventDefault();
    if (success) success.classList.remove('is-visible');

    const requiredFields = Array.from(form.querySelectorAll('input[required], textarea[required]'));
    const allValid = requiredFields.map(validateField).every(Boolean);
    if (!allValid) {
      const firstError = form.querySelector('.field.has-error input, .field.has-error textarea');
      if (firstError) firstError.focus();
      return;
    }

    const submitBtn = form.querySelector('button[type="submit"]');
    if (submitBtn) submitBtn.disabled = true;

    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    fetch('/api/contact', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': token || ''
      },
      body: JSON.stringify(msgPayload)
    }).then(res => {
      // Continue regardless of success for UI smoothness
    }).catch(err => console.error(err));

    fetch(form.action, {
      method: 'POST',
      headers: {
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest',
        'X-CSRF-TOKEN': tokenMeta ? tokenMeta.content : '',
      },
      body: new FormData(form),
    })
      .then(function (res) { return res.ok ? res : Promise.reject(res); })
      .then(function () {
        if (success) {
          success.classList.add('is-visible');
          success.style.display = 'flex';
        }
        form.reset();
        requiredFields.forEach(function (f) {
          const w = f.closest('.field');
          if (w) w.classList.remove('has-error');
        });
        if (success) success.scrollIntoView({ behavior: 'smooth', block: 'center' });
      })
      .catch(function () {
        /* Network/validation failure on the AJAX path — fall back to a
           real form submit so the message still has a chance to land. */
        form.submit();
      })
      .finally(function () {
        if (submitBtn) submitBtn.disabled = false;
      });
  });

})();
