@php
  $services = \App\Models\Service::orderBy('id')->get();
@endphp

<!-- ═══════════════════════ TOP BAR ═══════════════════════ -->
<div class="topbar">
  <div class="container topbar__inner">
    <div class="topbar__meta">
      <a href="tel:021234567" class="topbar__hide-sm">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path
            d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.362 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0122 16.92z" />
        </svg>
        02-123-4567
      </a>
      <a href="mailto:hello@graphictech.co.th">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z" />
          <path d="M22 6l-10 7L2 6" />
        </svg>
        hello@graphictech.co.th
      </a>
      <span class="topbar__hide-sm">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <rect x="3" y="4" width="18" height="18" rx="2" />
          <path d="M16 2v4M8 2v4M3 10h18" />
        </svg>
        จันทร์–เสาร์ 9:00–18:00
      </span>
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

    <button class="nav__toggle" id="navToggle" aria-label="เปิดเมนู" aria-expanded="false">
      <span></span><span></span><span></span>
    </button>
    <div class="nav__backdrop" id="navBackdrop"></div>

    <nav class="nav__menu" id="navMenu" aria-label="เมนูหลัก">
      <div class="nav__item">
        <a href="{{ route('home') }}" class="nav__link {{ request()->routeIs('home') ? 'is-active' : '' }}">หน้าแรก</a>
      </div>
      <div class="nav__item">
        <a href="{{ route('home') }}#services" class="nav__link">
          บริการของเรา
          <svg class="caret" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6 9 12 15 18 9" />
          </svg>
        </a>
        <div class="nav__mega">
          <div class="nav__mega-grid">
            @foreach ($services as $service)
              <a href="{{ route('page', $service->slug) }}" class="mega-link" target="_blank" rel="noopener">
                <span class="mega-link__icon">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">{!! $service->icon !!}</svg>
                </span>
                <span><b>{{ $service->name }}</b>
                  <p>{{ $service->description }}</p>
                </span>
              </a>
            @endforeach
          </div>
          <div class="nav__mega-foot">
            <p><strong>ไม่แน่ใจว่าต้องใช้บริการไหน?</strong> ปรึกษาทีมงานได้ฟรี</p>
            <a href="{{ route('home') }}#contact" class="btn btn-primary btn-sm">ปรึกษาฟรี</a>
          </div>
        </div>
      </div>
      <div class="nav__item"><a href="{{ route('home') }}#portfolio" class="nav__link">ผลงานของเรา</a></div>
      <div class="nav__item"><a href="{{ route('home') }}#why" class="nav__link">ทำไมต้องเรา</a></div>
      <div class="nav__item"><a href="{{ route('page', 'about') }}" class="nav__link" target="_blank" rel="noopener">เกี่ยวกับเรา</a></div>
      <div class="nav__item"><a href="{{ route('home') }}#faq" class="nav__link">FAQ</a></div>
      <div class="nav__item"><a href="{{ route('home') }}#contact" class="nav__link">ติดต่อเรา</a></div>
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
      <a href="{{ route('home') }}#contact" class="btn btn-primary btn-sm">ปรึกษาผู้เชี่ยวชาญฟรี</a>
    </div>
  </div>
  <span class="scroll-progress" id="scrollProgress"></span>
</header>
