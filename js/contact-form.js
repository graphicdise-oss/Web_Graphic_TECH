/* ============================================================
   CONTACT-FORM.JS — Graphic TECH
   Client-side validation + submit feedback for #contactForm.

   NOTE: This form has no backend endpoint wired up yet. On
   successful validation it shows a success message and resets
   the form. To go live, replace the TODO block below with a
   fetch() call to your form-handling endpoint / email service
   (e.g. Formspree, a serverless function, or your own API).
   ============================================================ */

(function () {
  'use strict';

  const form    = document.getElementById('contactForm');
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

    fetch('https://formsubmit.co/ajax/56fd09c065887486d53b2b90141e5b1a', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
      },
      body: JSON.stringify(Object.fromEntries(new FormData(form)))
    })
    .then(response => response.json())
    .then(data => {
      if (submitBtn) submitBtn.disabled = false;
      if (success) success.classList.add('is-visible');
      form.reset();
      requiredFields.forEach(function (f) {
        const w = f.closest('.field');
        if (w) w.classList.remove('has-error');
      });
      if (success) success.scrollIntoView({ behavior: 'smooth', block: 'center' });
    })
    .catch(error => {
      if (submitBtn) submitBtn.disabled = false;
      alert('เกิดข้อผิดพลาดในการส่งข้อความ กรุณาลองใหม่อีกครั้ง');
    });
  });

})();
