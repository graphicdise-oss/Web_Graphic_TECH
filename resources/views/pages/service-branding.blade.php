@extends('layouts.app')
@section('title', 'Branding | Graphic TECH')
@section('nav_active_services', 'is-active')

@section('extra_css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
<style>
body { background: var(--surface-2, #F4F7FC); }
.svc-page-wrap { max-width: 1100px; margin: 0 auto; padding: 40px 24px 80px; }
.poster-section { margin: 56px 0 0; }
.poster-section h2 { font-size: 1.5rem; font-weight: 700; color: var(--ink); margin-bottom: 20px; display: flex; align-items: center; gap: 10px; }
.poster-section h2::before { content: ''; display: inline-block; width: 4px; height: 22px; background: var(--primary); border-radius: 4px; }
.poster-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 20px; }
.poster-card { background: #fff; border-radius: 14px; overflow: hidden; box-shadow: 0 4px 20px rgba(13,71,161,.07); transition: transform .25s, box-shadow .25s; }
.poster-card:hover { transform: translateY(-6px); box-shadow: 0 14px 34px rgba(13,71,161,.14); }
.poster-card img { width: 100%; aspect-ratio: 3/4; object-fit: cover; display: block; }
.poster-card__body { padding: 14px 16px; }
.poster-card__title { font-weight: 600; color: var(--ink); font-size: .95rem; margin-bottom: 4px; }
.poster-empty { text-align: center; padding: 40px 20px; color: var(--body); opacity: .5; font-size: .9rem; grid-column: 1/-1; }
.port-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; }
.port-card { background: #fff; border-radius: 14px; overflow: hidden; box-shadow: 0 4px 20px rgba(13,71,161,.07); transition: transform .25s, box-shadow .25s; }
.port-card:hover { transform: translateY(-6px); box-shadow: 0 14px 34px rgba(13,71,161,.14); }
.port-card img { width: 100%; aspect-ratio: 16/9; object-fit: cover; display: block; }
.port-card__body { padding: 16px 18px; }
.port-card__tags { display: flex; flex-wrap: wrap; gap: 6px; margin-bottom: 8px; }
.port-card__tag { background: rgba(33,150,243,.1); color: var(--primary); font-size: .75rem; font-weight: 600; padding: 2px 10px; border-radius: 99px; }
.port-card__title { font-weight: 700; color: var(--ink); font-size: 1rem; margin-bottom: 4px; }
.port-card__desc { font-size: .83rem; color: var(--body); line-height: 1.55; }
.port-card__year { font-size: .75rem; color: var(--body); opacity: .6; margin-top: 6px; }
</style>
@endsection

@section('content')
<div class="svc-page-wrap">
<!-- ══ HEADER ══ -->
    <div class="detail-header detail-hero">
      <span class="detail-label">บริการของเรา</span>
      <h1 class="detail-title">Branding</h1>
      <p class="detail-subtitle">
        สร้างตัวตนของแบรนด์ที่จดจำได้ง่าย มีความหมาย และยืนหยัดได้ในระยะยาว
        ตั้งแต่ Strategy ไปจนถึง Visual Identity
      </p>
    </div>

    <!-- ══ COVER ══ -->
    <div class="detail-cover">
      <img src="{{ asset('assets/images/services/cover-branding.jpg') }}" alt="Branding"
           onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
      <div class="detail-cover-placeholder" style="display:none">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/>
        </svg>
        <span>Branding Cover</span>
      </div>
    </div>

    <!-- ══ STATS ══ -->
    <div class="detail-stats">
      <div class="detail-stat">
        <div class="detail-stat-value">70+</div>
        <div class="detail-stat-label">แบรนด์ที่สร้าง</div>
      </div>
      <div class="detail-stat">
        <div class="detail-stat-value">15+</div>
        <div class="detail-stat-label">รางวัลที่ได้รับ</div>
      </div>
      <div class="detail-stat">
        <div class="detail-stat-value">100%</div>
        <div class="detail-stat-label">ลูกค้าแนะนำต่อ</div>
      </div>
    </div>

    <!-- ══ PHILOSOPHY ══ -->
    <div class="detail-section">
      <h2 class="detail-section-title">ปรัชญาของเรา</h2>
      <div class="detail-body">
        <p>
          แบรนด์ที่แข็งแกร่งไม่ได้เกิดจากโลโก้ที่สวย แต่เกิดจาก
          <strong>ความชัดเจนในสิ่งที่คุณเป็น สิ่งที่คุณเชื่อ และสิ่งที่คุณสัญญา</strong>
          กับลูกค้าของคุณ
        </p>
        <p>
          เราเริ่มต้นด้วยการทำความเข้าใจธุรกิจคุณในเชิงลึก ก่อนจะแตะเรื่องดีไซน์
          เพราะดีไซน์ที่ดีคือการแปลง Strategy ออกมาเป็น Visual ไม่ใช่แค่ความสวยงาม
        </p>
      </div>
    </div>

    <!-- ══ WHAT WE DELIVER ══ -->
    <div class="detail-section">
      <h2 class="detail-section-title">สิ่งที่เราส่งมอบ</h2>
      <div class="detail-icon-grid detail-grid">
        <div class="detail-icon-card">
          <div class="dic-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
              <path d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2V9M9 21H5a2 2 0 01-2-2V9m0 0h18"/>
            </svg>
          </div>
          <p class="dic-title">Brand Strategy</p>
          <p class="dic-desc">Positioning, Brand Archetype, Value Proposition, Competitive Mapping</p>
        </div>
        <div class="detail-icon-card">
          <div class="dic-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
              <circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/>
            </svg>
          </div>
          <p class="dic-title">Visual Identity</p>
          <p class="dic-desc">Logo System, Color Palette, Typography, Icon Set, Pattern & Texture</p>
        </div>
        <div class="detail-icon-card">
          <div class="dic-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
              <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
              <polyline points="14 2 14 8 20 8"/>
            </svg>
          </div>
          <p class="dic-title">Brand Guidelines</p>
          <p class="dic-desc">คู่มือการใช้งาน Brand แบบครบถ้วน ทั้ง Do's & Don'ts</p>
        </div>
        <div class="detail-icon-card">
          <div class="dic-icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
              <rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/>
            </svg>
          </div>
          <p class="dic-title">Brand Collateral</p>
          <p class="dic-desc">Stationery, Packaging, Signage, Uniform, Branded Merchandise</p>
        </div>
      </div>
    </div>

    <!-- ══ PROCESS ══ -->
    <div class="detail-section">
      <h2 class="detail-section-title">กระบวนการสร้างแบรนด์</h2>
      <div class="detail-process">
        <div class="detail-step">
          <div class="step-num">01</div>
          <div class="step-body">
            <p class="step-title">Brand Discovery</p>
            <p class="step-desc">Workshop ร่วมกับ Stakeholder เพื่อขุดหา Core Value และ Ambition ของแบรนด์</p>
          </div>
        </div>
        <div class="detail-step">
          <div class="step-num">02</div>
          <div class="step-body">
            <p class="step-title">Strategy Development</p>
            <p class="step-desc">กำหนด Positioning, Audience Persona และ Brand Personality</p>
          </div>
        </div>
        <div class="detail-step">
          <div class="step-num">03</div>
          <div class="step-body">
            <p class="step-title">Visual Exploration</p>
            <p class="step-desc">นำเสนอ 3 Direction พร้อม Rationale อธิบายว่าทำไม</p>
          </div>
        </div>
        <div class="detail-step">
          <div class="step-num">04</div>
          <div class="step-body">
            <p class="step-title">Identity Refinement</p>
            <p class="step-desc">พัฒนา Direction ที่เลือก ขยาย System ให้ครบถ้วน</p>
          </div>
        </div>
        <div class="detail-step">
          <div class="step-num">05</div>
          <div class="step-body">
            <p class="step-title">Brand Rollout</p>
            <p class="step-desc">ส่งมอบ Asset ครบชุด Brand Guidelines และ Support การนำไปใช้</p>
          </div>
        </div>
      </div>
    </div>

    <!-- ═══ DYNAMIC POSTERS ═══ -->
    <div class="poster-section">
      <h2>โปสเตอร์โปรโมท</h2>
      <div class="poster-grid" id="posterGrid">
        <p class="poster-empty" id="posterEmpty">ยังไม่มีโปสเตอร์ — แอดมินสามารถเพิ่มได้จากหน้าจัดการระบบ</p>
      </div>
    </div>

    <!-- ═══ DYNAMIC PORTFOLIO ═══ -->
    <div class="poster-section">
      <h2>ผลงาน Branding</h2>
      <div class="port-grid" id="portfolioGrid">
        <p class="poster-empty" id="portfolioEmpty">ยังไม่มีผลงาน — แอดมินสามารถเพิ่มได้จากหน้าจัดการระบบ</p>
      </div>
    </div>

    <div class="detail-cta">
      <h3>พร้อมสร้างแบรนด์ที่น่าจดจำ?</h3>
      <p>เริ่มต้นด้วย Brand Audit ฟรี เพื่อดูว่าแบรนด์คุณอยู่ที่ไหนในปัจจุบัน</p>
      <a href="{{ route('home') }}#contact" class="btn btn-primary">ขอ Free Brand Audit →</a>
    </div>
  </div>

  <script src="{{ asset('js/api-store.js') }}"></script>
  <script>
    const SLUG = 'service-branding';
    function renderPosters() {
      const grid = document.getElementById('posterGrid');
      const empty = document.getElementById('posterEmpty');
      const posters = window.GTStore.getServicePosters(SLUG);
      if (!posters.length) { empty.style.display = ''; return; }
      empty.style.display = 'none';
      grid.innerHTML = posters.map(p => `
        <div class="poster-card">
          <img src="${p.image}" alt="${p.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='200px'">
          <div class="poster-card__body">
            <p class="poster-card__title">${p.title}</p>
            ${p.description ? `<p class="poster-card__desc">${p.description}</p>` : ''}
          </div>
        </div>`).join('');
    }
    function renderPortfolio() {
      const grid = document.getElementById('portfolioGrid');
      const empty = document.getElementById('portfolioEmpty');
      const items = window.GTStore.getServicePortfolio(SLUG);
      if (!items.length) { empty.style.display = ''; return; }
      empty.style.display = 'none';
      grid.innerHTML = items.map(p => `
        <div class="port-card">
          <img src="${p.image}" alt="${p.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='160px'">
          <div class="port-card__body">
            ${p.tags && p.tags.length ? `<div class="port-card__tags">${p.tags.map(t=>`<span class="port-card__tag">${t}</span>`).join('')}</div>` : ''}
            <p class="port-card__title">${p.title}</p>
            ${p.description ? `<p class="port-card__desc">${p.description}</p>` : ''}
            ${p.year ? `<p class="port-card__year">ปี ${p.year}</p>` : ''}
          </div>
        </div>`).join('');
    }
    renderPosters();
    renderPortfolio();
  </script>
</div>
@endsection

@section('extra_scripts')
<script src="{{ asset('js/api-store.js') }}"></script>
  <script>
    const SLUG = 'service-branding';
    function renderPosters() {
      const grid = document.getElementById('posterGrid');
      const empty = document.getElementById('posterEmpty');
      const posters = window.GTStore.getServicePosters(SLUG);
      if (!posters.length) { empty.style.display = ''; return; }
      empty.style.display = 'none';
      grid.innerHTML = posters.map(p => `
        <div class="poster-card">
          <img src="${p.image}" alt="${p.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='200px'">
          <div class="poster-card__body">
            <p class="poster-card__title">${p.title}</p>
            ${p.description ? `<p class="poster-card__desc">${p.description}</p>` : ''}
          </div>
        </div>`).join('');
    }
    function renderPortfolio() {
      const grid = document.getElementById('portfolioGrid');
      const empty = document.getElementById('portfolioEmpty');
      const items = window.GTStore.getServicePortfolio(SLUG);
      if (!items.length) { empty.style.display = ''; return; }
      empty.style.display = 'none';
      grid.innerHTML = items.map(p => `
        <div class="port-card">
          <img src="${p.image}" alt="${p.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='160px'">
          <div class="port-card__body">
            ${p.tags && p.tags.length ? `<div class="port-card__tags">${p.tags.map(t=>`<span class="port-card__tag">${t}</span>`).join('')}</div>` : ''}
            <p class="port-card__title">${p.title}</p>
            ${p.description ? `<p class="port-card__desc">${p.description}</p>` : ''}
            ${p.year ? `<p class="port-card__year">ปี ${p.year}</p>` : ''}
          </div>
        </div>`).join('');
    }
    renderPosters();
    renderPortfolio();
  </script>
</body>
</html>
@endsection

