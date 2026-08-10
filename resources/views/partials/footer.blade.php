@php
  $footerServices = \App\Models\Service::orderBy('id')->get();
@endphp

<!-- ═══════════════════════ FOOTER ═══════════════════════ -->
<footer class="footer">
  <div class="container footer__top">
    <div class="footer__brand">
      <a href="{{ route('home') }}" class="nav__logo">
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
      <p>เราสร้างสรรค์ เราพัฒนา เราส่งมอบ — พาร์ทเนอร์ด้านดีไซน์และเทคโนโลยีที่ช่วยให้ธุรกิจของคุณเติบโตอย่างมั่นคง</p>
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
        @foreach ($footerServices as $service)
          <a href="{{ route('page', $service->slug) }}" target="_blank" rel="noopener">{{ $service->name }}</a>
        @endforeach
      </nav>
    </div>

    <div class="footer__col">
      <h4>บริษัท</h4>
      <nav class="footer__links">
        <a href="{{ route('page', 'about') }}" target="_blank" rel="noopener">เกี่ยวกับเรา</a>
        <a href="{{ route('home') }}#portfolio">ผลงานของเรา</a>
        <a href="{{ route('home') }}#why">ทำไมต้องเรา</a>
        <a href="{{ route('home') }}#faq">คำถามที่พบบ่อย</a>
        <a href="{{ route('home') }}#contact">ติดต่อเรา</a>
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
    <p>© {{ date('Y') }} Graphic TECH. All rights reserved.</p>
    <nav>
      <a href="{{ route('page', 'about') }}" target="_blank" rel="noopener">เกี่ยวกับเรา</a>
      <a href="{{ route('home') }}#contact">นโยบายความเป็นส่วนตัว</a>
      <a href="{{ route('home') }}#contact">ข้อตกลงการใช้งาน</a>
    </nav>
  </div>
</footer>
