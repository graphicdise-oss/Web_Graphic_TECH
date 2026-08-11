  <!-- ═══════════════════════ FOOTER ═══════════════════════ -->
  <footer class="footer">
    <div class="container footer__top">
      <div class="footer__brand">
        <a href="{{ request()->routeIs('home') ? '#home' : route('home').'#home' }}" class="nav__logo">
          <span class="nav__logo-mark">
            <img src="{{ asset('assets/images/brand/logo.png') }}" alt="Graphic TECH Logo" style="height: 36px; width: auto; object-fit: contain;">
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
          <a href="{{ route('page', 'service-uiux') }}">UI/UX Design</a>
          <a href="{{ route('page', 'service-graphic') }}">Graphic Design</a>
          <a href="{{ route('page', 'service-web') }}">Web Development</a>
          <a href="{{ route('page', 'service-marketing') }}">Digital Marketing</a>
          <a href="{{ route('page', 'service-erp') }}">ERP System</a>
          <a href="{{ route('page', 'service-branding') }}">Branding</a>
        </nav>
      </div>

      <div class="footer__col">
        <h4>บริษัท</h4>
        <nav class="footer__links">
          <a href="{{ route('page', 'about') }}">เกี่ยวกับเรา</a>
          <a href="{{ request()->routeIs('home') ? '#portfolio' : route('home').'#portfolio' }}">ผลงานของเรา</a>
          <a href="{{ request()->routeIs('home') ? '#why' : route('home').'#why' }}">ทำไมต้องเรา</a>
          <a href="{{ request()->routeIs('home') ? '#faq' : route('home').'#faq' }}">คำถามที่พบบ่อย</a>
          <a href="{{ request()->routeIs('home') ? '#contact' : route('home').'#contact' }}">ติดต่อเรา</a>
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

    <div class="container footer__bottom" style="justify-content:center"><p>© 2026 Graphic TECH. All rights reserved.</p></div>
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