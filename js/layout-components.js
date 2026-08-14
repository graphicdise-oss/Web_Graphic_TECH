(function() {
  const isSubfolder = window.location.pathname.indexOf('/pages/') !== -1 || window.location.pathname.indexOf('\\pages\\') !== -1;
  const basePath = isSubfolder ? '../' : './';
  const pagesPath = isSubfolder ? './' : 'pages/';

  const appHeader = `
  <!-- ═══════════════════════ TOP BAR ═══════════════════════ -->
  <div class="topbar">
    <div class="container topbar__inner">
      <div class="topbar__meta">
        <a href="mailto:hello@graphictech.co.th">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z" />
            <path d="M22 6l-10 7L2 6" />
          </svg>
          hello@graphictech.co.th
        </a>
      </div>
      <div class="topbar__social">
        <a href="#" aria-label="Facebook"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M22 12a10 10 0 10-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.24.2 2.24.2v2.46H15.2c-1.24 0-1.63.77-1.63 1.56V12h2.78l-.44 2.89h-2.34v6.99A10 10 0 0022 12z" />
          </svg></a>
        <a href="#" aria-label="Instagram"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2">
            <rect x="2" y="2" width="20" height="20" rx="5" />
            <circle cx="12" cy="12" r="4" />
            <circle cx="17.5" cy="6.5" r="1" />
          </svg></a>
        <a href="#" aria-label="LINE"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M12 2C6.48 2 2 5.94 2 10.7c0 4.27 3.56 7.85 8.37 8.55.33.07.77.22.88.5.1.26.07.66.03.92l-.14.9c-.04.26-.2 1.02.9.56 1.1-.47 5.93-3.5 8.09-6 1.5-1.65 2.22-3.32 2.22-5.43C22.35 5.94 17.87 2 12 2z" />
          </svg></a>
      </div>
    </div>
  </div>

  <!-- ═══════════════════════ NAVBAR ═══════════════════════ -->
  <header class="navbar" id="navbar">
    <div class="container nav__inner">
      <a href="${basePath}index.html#home" class="nav__logo">
        <span class="nav__logo-mark">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M12 2l9 4.9v10.2L12 22l-9-4.9V6.9L12 2z" />
            <path d="M12 22V12M21 6.9L12 12 3 6.9" />
          </svg>
        </span>
        <span class="nav__logo-text">
          <b>Graphic<span>TECH</span></b>
          <small>Creative &amp; Technology Studio</small>
        </span>
      </a>

      <button class="nav__toggle" id="navToggle" aria-label="เปิดเมนู" aria-expanded="false">
        <span></span><span></span><span></span>
      </button>
      <div class="nav__backdrop" id="navBackdrop"></div>

      <nav class="nav__menu" id="navMenu" aria-label="เมนูหลัก">
        <div class="nav__item">
          <a href="${basePath}index.html#home" class="nav__link is-active">หน้าแรก</a>
        </div>
        <div class="nav__item">
          <a href="${basePath}index.html#services" class="nav__link">
            บริการของเรา
            <svg class="caret" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <polyline points="6 9 12 15 18 9" />
            </svg>
          </a>
          <div class="nav__mega">
            <div class="nav__mega-grid">
              <a href="${pagesPath}service-uiux.html" class="mega-link">
                <span class="mega-link__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.6">
                    <rect x="2" y="3" width="20" height="14" rx="2" />
                    <path d="M8 21h8M12 17v4" />
                  </svg></span>
                <span><b>UI/UX Design</b>
                  <p>ออกแบบประสบการณ์ผู้ใช้ที่ใช้งานง่ายและสวยงาม</p>
                </span>
              </a>
              <a href="${pagesPath}service-graphic.html" class="mega-link">
                <span class="mega-link__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.6">
                    <circle cx="13.5" cy="6.5" r="2.5" />
                    <circle cx="6.5" cy="14.5" r="2.5" />
                    <path d="M17 21v-1a4 4 0 00-4-4H5a4 4 0 00-4 4v1" />
                    <path d="M22 11l-3-3-7 7-3-3" />
                  </svg></span>
                <span><b>Graphic Design</b>
                  <p>งานกราฟิกดิจิทัลและสิ่งพิมพ์ที่โดดเด่น</p>
                </span>
              </a>
              <a href="${pagesPath}service-web.html" class="mega-link">
                <span class="mega-link__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.6">
                    <polyline points="16 18 22 12 16 6" />
                    <polyline points="8 6 2 12 8 18" />
                  </svg></span>
                <span><b>Web Development</b>
                  <p>เว็บไซต์และแอปพลิเคชันที่รวดเร็วปลอดภัย</p>
                </span>
              </a>
              <a href="${pagesPath}service-marketing.html" class="mega-link">
                <span class="mega-link__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.6">
                    <path d="M22 12h-4l-3 9L9 3l-3 9H2" />
                  </svg></span>
                <span><b>Digital Marketing</b>
                  <p>กลยุทธ์การตลาดดิจิทัลที่ขับเคลื่อนด้วยข้อมูล</p>
                </span>
              </a>
              <a href="${pagesPath}service-erp.html" class="mega-link">
                <span class="mega-link__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.6">
                    <rect x="3" y="3" width="7" height="7" />
                    <rect x="14" y="3" width="7" height="7" />
                    <rect x="14" y="14" width="7" height="7" />
                    <rect x="3" y="14" width="7" height="7" />
                  </svg></span>
                <span><b>ERP System</b>
                  <p>ระบบจัดการองค์กรครบวงจร เพิ่มประสิทธิภาพธุรกิจ</p>
                </span>
              </a>
              <a href="${pagesPath}service-branding.html" class="mega-link">
                <span class="mega-link__icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="1.6">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                  </svg></span>
                <span><b>Branding</b>
                  <p>สร้างตัวตนแบรนด์ที่จดจำได้และแข็งแกร่ง</p>
                </span>
              </a>
            </div>
            <div class="nav__mega-foot">
              <p><strong>ไม่แน่ใจว่าต้องใช้บริการไหน?</strong> ปรึกษาทีมงานได้ฟรี</p>
              <a href="${basePath}index.html#contact" class="btn btn-primary btn-sm">ปรึกษาฟรี</a>
            </div>
          </div>
        </div>
        <div class="nav__item"><a href="${basePath}index.html#portfolio" class="nav__link">ผลงานของเรา</a></div>
        <div class="nav__item"><a href="${basePath}index.html#faq" class="nav__link">FAQ</a></div>
        <div class="nav__item"><a href="${basePath}index.html#contact" class="nav__link">ติดต่อเรา</a></div>
      </nav>

      <div class="nav__actions">
        <div class="nav__phone">
          <span class="nav__phone-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path
                d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.362 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0122 16.92z" />
            </svg>
          </span>
          <span><small>โทรปรึกษาฟรี</small><b>02-123-4567</b></span>
        </div>
        <a href="${basePath}index.html#contact" class="btn btn-primary btn-sm">ปรึกษาผู้เชี่ยวชาญฟรี</a>
      </div>
    </div>
    <span class="scroll-progress" id="scrollProgress"></span>
  </header>
  `;

  const appFooter = `
  <!-- ═══════════════════════ FOOTER ═══════════════════════ -->
  <footer class="footer">
    <div class="container footer__top">
      <div class="footer__brand">
        <a href="${basePath}index.html#home" class="nav__logo">
          <span class="nav__logo-mark">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
              stroke-linejoin="round">
              <path d="M12 2l9 4.9v10.2L12 22l-9-4.9V6.9L12 2z" />
              <path d="M12 22V12M21 6.9L12 12 3 6.9" />
            </svg>
          </span>
          <span class="nav__logo-text">
            <b>Graphic<span>TECH</span></b>
            <small>Creative &amp; Technology Studio</small>
          </span>
        </a>
        <p>เราสร้างสรรค์ เราพัฒนา เราส่งมอบ — พาร์ทเนอร์ด้านดีไซน์และเทคโนโลยีที่ช่วยให้ธุรกิจของคุณเติบโตอย่างมั่นคง
        </p>
        <div class="footer__social">
          <a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M22 12a10 10 0 10-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.49-3.89 3.77-3.89 1.09 0 2.24.2 2.24.2v2.46H15.2c-1.24 0-1.63.77-1.63 1.56V12h2.78l-.44 2.89h-2.34v6.99A10 10 0 0022 12z" />
            </svg></a>
          <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
              stroke-width="2">
              <rect x="2" y="2" width="20" height="20" rx="5" />
              <circle cx="12" cy="12" r="4" />
              <circle cx="17.5" cy="6.5" r="1" />
            </svg></a>
          <a href="#" aria-label="LINE"><svg viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M12 2C6.48 2 2 5.94 2 10.7c0 4.27 3.56 7.85 8.37 8.55.33.07.77.22.88.5.1.26.07.66.03.92l-.14.9c-.04.26-.2 1.02.9.56 1.1-.47 5.93-3.5 8.09-6 1.5-1.65 2.22-3.32 2.22-5.43C22.35 5.94 17.87 2 12 2z" />
            </svg></a>
          <a href="#" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="currentColor">
              <path
                d="M23.5 6.2a3 3 0 00-2.1-2.1C19.5 3.5 12 3.5 12 3.5s-7.5 0-9.4.6a3 3 0 00-2.1 2.1A31 31 0 000 12a31 31 0 00.5 5.8 3 3 0 002.1 2.1c1.9.6 9.4.6 9.4.6s7.5 0 9.4-.6a3 3 0 002.1-2.1A31 31 0 0024 12a31 31 0 00-.5-5.8zM9.6 15.6V8.4l6.3 3.6-6.3 3.6z" />
            </svg></a>
        </div>
      </div>

      <div class="footer__col">
        <h4>บริการ</h4>
        <nav class="footer__links">
          <a href="${pagesPath}service-uiux.html">UI/UX Design</a>
          <a href="${pagesPath}service-graphic.html">Graphic Design</a>
          <a href="${pagesPath}service-web.html">Web Development</a>
          <a href="${pagesPath}service-marketing.html">Digital Marketing</a>
          <a href="${pagesPath}service-erp.html">ERP System</a>
          <a href="${pagesPath}service-branding.html">Branding</a>
        </nav>
      </div>

      <div class="footer__col">
        <h4>บริษัท</h4>
        <nav class="footer__links">
          <a href="${basePath}index.html#about">เกี่ยวกับเรา</a>
          <a href="${basePath}index.html#portfolio">ผลงานของเรา</a>
          <a href="${basePath}index.html#why">ทำไมต้องเรา</a>
          <a href="${basePath}index.html#faq">คำถามที่พบบ่อย</a>
          <a href="${basePath}index.html#contact">ติดต่อเรา</a>
        </nav>
      </div>

      <div class="footer__col">
        <h4>ติดต่อเรา</h4>
        <ul class="footer__contact">
          <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0118 0z" />
              <circle cx="12" cy="10" r="3" />
            </svg>
            <span>123 อาคารเทคโนโลยี ชั้น 8 ถ.สุขุมวิท กรุงเทพฯ 10110</span>
          </li>
          <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path
                d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.362 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0122 16.92z" />
            </svg>
            <a href="tel:021234567">02-123-4567</a>
          </li>
          <li>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z" />
              <path d="M22 6l-10 7L2 6" />
            </svg>
            <a href="mailto:hello@graphictech.co.th">hello@graphictech.co.th</a>
          </li>
        </ul>
      </div>
    </div>

    <div class="container footer__bottom">
      <p>© 2026 Graphic TECH. All rights reserved.</p>
      <nav>
        <a href="${basePath}index.html#about">เกี่ยวกับเรา</a>
        <a href="${basePath}index.html#contact">นโยบายความเป็นส่วนตัว</a>
        <a href="${basePath}index.html#contact">ข้อตกลงการใช้งาน</a>
      </nav>
    </div>
  </footer>

  <!-- ═══════════════════════ FLOATING ACTION BUTTONS ═══════════════════════ -->
  <div class="fab-stack">
    <a class="to-top" id="toTop" aria-label="กลับขึ้นด้านบน">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
        <path d="M12 19V5M5 12l7-7 7 7" />
      </svg>
    </a>
    <a class="fab fab--line" href="https://line.me/R/ti/p/@graphictech" target="_blank" rel="noopener"
      aria-label="แชทผ่าน LINE">
      <span class="fab__label">แชทผ่าน LINE</span>
      <svg viewBox="0 0 24 24" fill="currentColor">
        <path
          d="M12 2C6.48 2 2 5.94 2 10.7c0 4.27 3.56 7.85 8.37 8.55.33.07.77.22.88.5.1.26.07.66.03.92l-.14.9c-.04.26-.2 1.02.9.56 1.1-.47 5.93-3.5 8.09-6 1.5-1.65 2.22-3.32 2.22-5.43C22.35 5.94 17.87 2 12 2z" />
      </svg>
    </a>
    <a class="fab fab--wa" href="https://wa.me/66812345678" target="_blank" rel="noopener"
      aria-label="แชทผ่าน WhatsApp">
      <span class="fab__label">แชทผ่าน WhatsApp</span>
      <svg viewBox="0 0 24 24" fill="currentColor">
        <path
          d="M17.5 14.4c-.3-.15-1.7-.85-2-.94-.27-.1-.46-.15-.66.15-.2.3-.75.94-.92 1.13-.17.2-.34.22-.63.08-.3-.15-1.24-.46-2.36-1.46-.87-.78-1.46-1.73-1.63-2.03-.17-.3-.02-.46.13-.6.13-.14.3-.34.44-.52.15-.17.2-.3.3-.5.1-.2.05-.37-.02-.52-.08-.15-.66-1.6-.91-2.2-.24-.58-.48-.5-.66-.5h-.57c-.2 0-.52.08-.79.37-.27.3-1.04 1-1.04 2.45s1.06 2.85 1.2 3.05c.15.2 2.1 3.2 5.08 4.5.71.3 1.26.49 1.7.62.71.23 1.35.2 1.86.12.57-.08 1.7-.7 1.94-1.36.24-.67.24-1.24.17-1.36-.07-.12-.27-.2-.57-.34z" />
        <path d="M12 2a10 10 0 00-8.5 15.2L2 22l4.9-1.5A10 10 0 1012 2z" />
      </svg>
    </a>
    <a class="fab fab--phone fab--pulse" href="tel:021234567" aria-label="โทรหาเรา">
      <span class="fab__label">โทร 02-123-4567</span>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path
          d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.362 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0122 16.92z" />
      </svg>
    </a>
  </div>
  `;

  // Insert Header
  const headerEl = document.getElementById('app-header');
  if (headerEl) {
    headerEl.innerHTML = appHeader;
  }

  // Insert Footer
  const footerEl = document.getElementById('app-footer');
  if (footerEl) {
    footerEl.innerHTML = appFooter;
  }

  // Bind Events for Nav Toggle
  setTimeout(() => {
    const navToggle = document.getElementById('navToggle');
    const navMenu = document.getElementById('navMenu');
    const navBackdrop = document.getElementById('navBackdrop');
    if (navToggle && navMenu && navBackdrop) {
      navToggle.addEventListener('click', () => {
        navToggle.classList.toggle('open');
        navMenu.classList.toggle('open');
        navBackdrop.classList.toggle('open');
      });
      navBackdrop.addEventListener('click', () => {
        navToggle.classList.remove('open');
        navMenu.classList.remove('open');
        navBackdrop.classList.remove('open');
      });
    }

    // Bind back to top
    const toTop = document.getElementById('toTop');
    if (toTop) {
      toTop.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
      window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
          toTop.classList.add('visible');
        } else {
          toTop.classList.remove('visible');
        }
      });
    }
  }, 100);

})();
