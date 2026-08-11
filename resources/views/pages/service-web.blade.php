@extends('layouts.app')
@section('title', 'Web Development | Graphic TECH')
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
<div class="detail-header detail-hero">
      <span class="detail-label">บริการของเรา</span>
      <h1 class="detail-title">Web Development</h1>
      <p class="detail-subtitle">พัฒนาเว็บไซต์และแอปพลิเคชันที่รวดเร็ว ปลอดภัย รองรับทุกอุปกรณ์ และสามารถขยายต่อได้ในอนาคต ด้วยเทคโนโลยีที่ทันสมัยที่สุด</p>
    </div>
    <div class="detail-stats">
      <div class="detail-stat"><div class="detail-stat-value">200+</div><div class="detail-stat-label">เว็บไซต์ที่พัฒนา</div></div>
      <div class="detail-stat"><div class="detail-stat-value">99.9%</div><div class="detail-stat-label">Uptime SLA</div></div>
      <div class="detail-stat"><div class="detail-stat-value">8+</div><div class="detail-stat-label">ปีประสบการณ์</div></div>
    </div>
    <div class="detail-section">
      <h2 class="detail-section-title">สิ่งที่เราส่งมอบ</h2>
      <div class="detail-icon-grid detail-grid">
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg></div><p class="dic-title">Frontend Development</p><p class="dic-desc">React, Next.js, Vue.js, HTML5/CSS3 Responsive</p></div>
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z"/></svg></div><p class="dic-title">Backend & API</p><p class="dic-desc">Node.js, Laravel, REST API, GraphQL</p></div>
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 7V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v2"/></svg></div><p class="dic-title">CMS & WordPress</p><p class="dic-desc">WordPress, Headless CMS, Custom Admin Panel</p></div>
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div><p class="dic-title">Security & Performance</p><p class="dic-desc">SSL, CDN, Load Optimization, Core Web Vitals</p></div>
      </div>
    </div>
    <div class="detail-section">
      <h2 class="detail-section-title">กระบวนการทำงาน</h2>
      <div class="detail-process">
        <div class="detail-step"><div class="step-num">01</div><div class="step-body"><p class="step-title">Discovery & Planning</p><p class="step-desc">วิเคราะห์ความต้องการ กำหนด Scope และเลือก Tech Stack ที่เหมาะสม</p></div></div>
        <div class="detail-step"><div class="step-num">02</div><div class="step-body"><p class="step-title">UI/UX Design</p><p class="step-desc">ออกแบบ Wireframe และ Mockup ก่อนเริ่ม Code</p></div></div>
        <div class="detail-step"><div class="step-num">03</div><div class="step-body"><p class="step-title">Development</p><p class="step-desc">พัฒนา Frontend + Backend ตาม Sprint แบบ Agile</p></div></div>
        <div class="detail-step"><div class="step-num">04</div><div class="step-body"><p class="step-title">Testing & QA</p><p class="step-desc">ทดสอบทุก Functionality, Performance, Security และ Cross-device</p></div></div>
        <div class="detail-step"><div class="step-num">05</div><div class="step-body"><p class="step-title">Launch & Support</p><p class="step-desc">Deploy ขึ้น Production พร้อม 3 เดือน Post-launch Support</p></div></div>
      </div>
    </div>
    <div class="poster-section">
      <h2>โปสเตอร์โปรโมท</h2>
      <div class="poster-grid" id="posterGrid"><p class="poster-empty" id="posterEmpty">ยังไม่มีโปสเตอร์ — แอดมินสามารถเพิ่มได้จากหน้าจัดการระบบ</p></div>
    </div>
    <div class="poster-section">
      <h2>ผลงาน Web Development</h2>
      <div class="port-grid" id="portfolioGrid"><p class="poster-empty" id="portfolioEmpty">ยังไม่มีผลงาน — แอดมินสามารถเพิ่มได้จากหน้าจัดการระบบ</p></div>
    </div>
    <div class="detail-cta"><h3>พร้อมสร้างเว็บไซต์ระดับ Enterprise?</h3><p>ปรึกษา Technical Architect ของเราฟรี พร้อม Proposal ภายใน 48 ชั่วโมง</p><a href="{{ route('home') }}#contact" class="btn btn-primary">ขอ Proposal ฟรี →</a></div>
  </div>
  <script src="{{ asset('js/api-store.js') }}"></script>
  <script>
    const SLUG='service-web';
    function renderPosters(){const g=document.getElementById('posterGrid'),e=document.getElementById('posterEmpty'),p=window.GTStore.getServicePosters(SLUG);if(!p.length){e.style.display='';return;}e.style.display='none';g.innerHTML=p.map(x=>`<div class="poster-card"><img src="${x.image}" alt="${x.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='200px'"><div class="poster-card__body"><p class="poster-card__title">${x.title}</p>${x.description?`<p class="poster-card__desc">${x.description}</p>`:''}</div></div>`).join('');}
    function renderPortfolio(){const g=document.getElementById('portfolioGrid'),e=document.getElementById('portfolioEmpty'),p=window.GTStore.getServicePortfolio(SLUG);if(!p.length){e.style.display='';return;}e.style.display='none';g.innerHTML=p.map(x=>`<div class="port-card"><img src="${x.image}" alt="${x.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='160px'"><div class="port-card__body">${x.tags&&x.tags.length?`<div class="port-card__tags">${x.tags.map(t=>`<span class="port-card__tag">${t}</span>`).join('')}</div>`:''}<p class="port-card__title">${x.title}</p>${x.description?`<p class="port-card__desc">${x.description}</p>`:''} ${x.year?`<p class="port-card__year">ปี ${x.year}</p>`:''}</div></div>`).join('');}
    renderPosters();renderPortfolio();
  </script>
</div>
@endsection

@section('extra_scripts')
<script src="{{ asset('js/api-store.js') }}"></script>
  <script>
    const SLUG='service-web';
    function renderPosters(){const g=document.getElementById('posterGrid'),e=document.getElementById('posterEmpty'),p=window.GTStore.getServicePosters(SLUG);if(!p.length){e.style.display='';return;}e.style.display='none';g.innerHTML=p.map(x=>`<div class="poster-card"><img src="${x.image}" alt="${x.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='200px'"><div class="poster-card__body"><p class="poster-card__title">${x.title}</p>${x.description?`<p class="poster-card__desc">${x.description}</p>`:''}</div></div>`).join('');}
    function renderPortfolio(){const g=document.getElementById('portfolioGrid'),e=document.getElementById('portfolioEmpty'),p=window.GTStore.getServicePortfolio(SLUG);if(!p.length){e.style.display='';return;}e.style.display='none';g.innerHTML=p.map(x=>`<div class="port-card"><img src="${x.image}" alt="${x.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='160px'"><div class="port-card__body">${x.tags&&x.tags.length?`<div class="port-card__tags">${x.tags.map(t=>`<span class="port-card__tag">${t}</span>`).join('')}</div>`:''}<p class="port-card__title">${x.title}</p>${x.description?`<p class="port-card__desc">${x.description}</p>`:''} ${x.year?`<p class="port-card__year">ปี ${x.year}</p>`:''}</div></div>`).join('');}
    renderPosters();renderPortfolio();
  </script>
</body>
</html>


@endsection

