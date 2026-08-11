<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description"
    content="Graphic TECH">
  <title>@yield('title', 'Graphic TECH')</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700;800&family=Sora:wght@400;500;600;700;800&display=swap">

  <link rel="stylesheet" href="{{ asset('css/base.css') }}">
  <link rel="stylesheet" href="{{ asset('css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
  @yield('extra_css')
  <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
  <a href="#main" class="skip-link">ข้ามไปยังเนื้อหาหลัก</a>

  @include('partials.navbar')

  <main id="main">
    @yield('content')
  </main>

  @include('partials.footer')



  <!-- ═══════════════════════ ADMIN GEAR ═══════════════════════ -->
  <button class="admin-fab" id="adminFab" aria-label="จัดการระบบและตั้งค่าธีม" aria-expanded="false" title="เปิดเมนูแอดมิน / ตั้งค่าธีม">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <circle cx="12" cy="12" r="3"></circle>
      <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"></path>
    </svg>
  </button>

  <div class="admin-panel" id="adminPanel">
    <!-- ส่วนทางเข้าหน้า Dashboard แอดมิน -->
    <div class="admin-panel__row">
      <h5>จัดการหลังบ้าน</h5>
      <a class="admin-link" href="{{ route('admin.dashboard') }}" target="_blank"
        style="background: var(--primary); color: #fff; justify-content: center; font-weight: 600;">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
          style="color: #fff; margin-right: 4px;">
          <path d="M12 20h9"></path>
          <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path>
        </svg>
        เข้าสู่ระบบแอดมิน
      </a>
    </div>

    <hr style="border: none; border-top: 1px solid var(--line); margin: 16px 0;">

    <!-- ส่วนเปลี่ยนสีธีมเดิม (เก็บไว้เพื่อให้ยังใช้งานฟังก์ชันเดิมได้) -->
    <div class="admin-panel__row">
      <h5>โทนสีธีม</h5>
      <div class="swatches" id="themeSwatches">
        <span class="swatch is-active" data-swatch="blue" style="background:#2196F3" title="Blue (Default)"></span>
        <span class="swatch" data-swatch="deep" style="background:#0D47A1" title="Deep Blue"></span>
        <span class="swatch" data-swatch="sky" style="background:#90CAF9" title="Sky"></span>
      </div>
    </div>
  </div>

  <!-- ═══════════════════════ OVERLAY PANEL ═══════════════════════ -->
  <div class="overlay" id="overlay" aria-hidden="true" role="dialog" aria-modal="true">
    <div class="overlay-backdrop" id="overlayBackdrop"></div>
    <div class="overlay-panel" id="overlayPanel">
      <button class="overlay-close" id="overlayClose" aria-label="ปิด">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
          <path d="M18 6L6 18M6 6l12 12" />
        </svg>
      </button>
      <div class="overlay-body" id="overlayContent">
        <div class="overlay-loading">
          <div class="spinner"></div>
          <p>กำลังโหลด...</p>
        </div>
      </div>
    </div>
  </div>

  @yield('extra_scripts')
  <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
