@extends('layouts.app')
@section('title', 'UI/UX Design | Graphic TECH')
@section('description', 'ออกแบบประสบการณ์ผู้ใช้ที่ใช้งานง่าย สวยงาม และตอบโจทย์เป้าหมายทางธุรกิจ')
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
  .poster-card__desc { font-size: .82rem; color: var(--body); line-height: 1.5; }
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

  <div class="detail-header detail-hero">
    <span class="detail-label">บริการของเรา</span>
    <h1 class="detail-title">UI/UX Design</h1>
    <p class="detail-subtitle">ออกแบบประสบการณ์ผู้ใช้ที่ใช้งานง่าย สวยงาม และตอบโจทย์เป้าหมายทางธุรกิจอย่างแท้จริง ตั้งแต่ Research จนถึง Prototype พร้อม Handoff</p>
  </div>

  <div class="detail-stats">
    <div class="detail-stat"><div class="detail-stat-value">120+</div><div class="detail-stat-label">โปรเจกต์ที่สำเร็จ</div></div>
    <div class="detail-stat"><div class="detail-stat-value">98%</div><div class="detail-stat-label">ลูกค้าพึงพอใจ</div></div>
    <div class="detail-stat"><div class="detail-stat-value">5+</div><div class="detail-stat-label">ปีประสบการณ์</div></div>
  </div>

  <div class="detail-section">
    <h2 class="detail-section-title">สิ่งที่เราส่งมอบ</h2>
    <div class="detail-icon-grid detail-grid">
      <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></div><p class="dic-title">User Research</p><p class="dic-desc">User Interview, Persona, Journey Map, Heuristic Evaluation</p></div>
      <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg></div><p class="dic-title">Wireframe &amp; IA</p><p class="dic-desc">Information Architecture, Sitemap, Low-fidelity Wireframe</p></div>
      <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><path d="M12 8v4l3 3"/></svg></div><p class="dic-title">UI Design</p><p class="dic-desc">Design System, High-fidelity Mockup, Responsive Design</p></div>
      <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M5 3l14 9-14 9V3z"/></svg></div><p class="dic-title">Interactive Prototype</p><p class="dic-desc">Clickable Prototype, Usability Testing, Figma Handoff</p></div>
    </div>
  </div>

  <div class="detail-section">
    <h2 class="detail-section-title">กระบวนการทำงาน</h2>
    <div class="detail-process">
      <div class="detail-step"><div class="step-num">01</div><div class="step-body"><p class="step-title">Discover</p><p class="step-desc">ทำความเข้าใจธุรกิจ ผู้ใช้งาน และเป้าหมายของโปรเจกต์</p></div></div>
      <div class="detail-step"><div class="step-num">02</div><div class="step-body"><p class="step-title">Define</p><p class="step-desc">วิเคราะห์และกำหนด User Persona, Journey Map, Problem Statement</p></div></div>
      <div class="detail-step"><div class="step-num">03</div><div class="step-body"><p class="step-title">Design</p><p class="step-desc">ออกแบบ Wireframe → UI → Design System ที่สอดคล้องกับ Brand</p></div></div>
      <div class="detail-step"><div class="step-num">04</div><div class="step-body"><p class="step-title">Prototype &amp; Test</p><p class="step-desc">สร้าง Interactive Prototype และทดสอบกับ Real Users</p></div></div>
      <div class="detail-step"><div class="step-num">05</div><div class="step-body"><p class="step-title">Handoff</p><p class="step-desc">ส่งมอบ Design Spec ครบถ้วนพร้อม Dev Handoff บน Figma</p></div></div>
    </div>
  </div>

  <div class="poster-section">
    <h2>โปสเตอร์โปรโมท</h2>
    <div class="poster-grid" id="posterGrid"><p class="poster-empty" id="posterEmpty">ยังไม่มีโปสเตอร์ — แอดมินสามารถเพิ่มได้จากหน้าจัดการระบบ</p></div>
  </div>

  <div class="poster-section">
    <h2>ผลงาน UI/UX Design</h2>
    <div class="port-grid" id="portfolioGrid"><p class="poster-empty" id="portfolioEmpty">ยังไม่มีผลงาน — แอดมินสามารถเพิ่มได้จากหน้าจัดการระบบ</p></div>
  </div>

  <div class="detail-cta">
    <h3>พร้อมยกระดับ UX ของคุณ?</h3>
    <p>ปรึกษาทีม UX Designer ของเราได้ฟรี พร้อม UX Audit เบื้องต้น</p>
    <a href="{{ route('home') }}#contact" class="btn btn-primary">ขอ Free UX Audit →</a>
  </div>
</div>
@endsection

@section('extra_scripts')
<script src="{{ asset('js/api-store.js') }}"></script>
<script>
  const SLUG = 'service-uiux';
  function renderPosters() {
    const grid = document.getElementById('posterGrid'), empty = document.getElementById('posterEmpty');
    const posters = window.GTStore.getServicePosters(SLUG);
    if (!posters.length) { empty.style.display = ''; return; }
    empty.style.display = 'none';
    grid.innerHTML = posters.map(p => `<div class="poster-card"><img src="${p.image}" alt="${p.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='200px'"><div class="poster-card__body"><p class="poster-card__title">${p.title}</p>${p.description ? `<p class="poster-card__desc">${p.description}</p>` : ''}</div></div>`).join('');
  }
  function renderPortfolio() {
    const grid = document.getElementById('portfolioGrid'), empty = document.getElementById('portfolioEmpty');
    const items = window.GTStore.getServicePortfolio(SLUG);
    if (!items.length) { empty.style.display = ''; return; }
    empty.style.display = 'none';
    grid.innerHTML = items.map(p => `<div class="port-card"><img src="${p.image}" alt="${p.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='160px'"><div class="port-card__body">${p.tags&&p.tags.length?`<div class="port-card__tags">${p.tags.map(t=>`<span class="port-card__tag">${t}</span>`).join('')}</div>`:''}<p class="port-card__title">${p.title}</p>${p.description?`<p class="port-card__desc">${p.description}</p>`:''}${p.year?`<p class="port-card__year">ปี ${p.year}</p>`:''}</div></div>`).join('');
  }
  renderPosters(); renderPortfolio();
</script>
@endsection
