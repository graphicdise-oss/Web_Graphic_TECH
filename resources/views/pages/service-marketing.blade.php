@extends('layouts.app')
@section('title', 'Digital Marketing | Graphic TECH')
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
      <h1 class="detail-title">Digital Marketing</h1>
      <p class="detail-subtitle">วางกลยุทธ์การตลาดดิจิทัลที่ขับเคลื่อนด้วยข้อมูลและ Data Analytics เพิ่ม ROI, ยอดขาย และ Brand Awareness อย่างวัดผลได้จริง</p>
    </div>
    <div class="detail-stats">
      <div class="detail-stat"><div class="detail-stat-value">3x</div><div class="detail-stat-label">เฉลี่ย ROI ที่เพิ่มขึ้น</div></div>
      <div class="detail-stat"><div class="detail-stat-value">50+</div><div class="detail-stat-label">แบรนด์ที่ดูแล</div></div>
      <div class="detail-stat"><div class="detail-stat-value">∞</div><div class="detail-stat-label">แคมเปญที่ปรับได้</div></div>
    </div>
    <div class="detail-section">
      <h2 class="detail-section-title">สิ่งที่เราส่งมอบ</h2>
      <div class="detail-icon-grid detail-grid">
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg></div><p class="dic-title">SEO & Content</p><p class="dic-desc">On-page SEO, Content Strategy, Keyword Research, Link Building</p></div>
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg></div><p class="dic-title">Paid Ads</p><p class="dic-desc">Google Ads, Facebook Ads, LINE Ads, Programmatic Advertising</p></div>
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div><p class="dic-title">Social Media</p><p class="dic-desc">Content Planning, Community Management, Influencer Marketing</p></div>
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M18 20V10M12 20V4M6 20v-6"/></svg></div><p class="dic-title">Analytics & Report</p><p class="dic-desc">GA4, Data Studio Dashboard, KPI Tracking, Monthly Report</p></div>
      </div>
    </div>
    <div class="detail-section">
      <h2 class="detail-section-title">กระบวนการทำงาน</h2>
      <div class="detail-process">
        <div class="detail-step"><div class="step-num">01</div><div class="step-body"><p class="step-title">Audit & Analysis</p><p class="step-desc">วิเคราะห์สถานะปัจจุบัน คู่แข่ง และกลุ่มเป้าหมาย</p></div></div>
        <div class="detail-step"><div class="step-num">02</div><div class="step-body"><p class="step-title">Strategy Planning</p><p class="step-desc">วางแผน Marketing Funnel, Channel Mix และ Budget Allocation</p></div></div>
        <div class="detail-step"><div class="step-num">03</div><div class="step-body"><p class="step-title">Content & Campaign</p><p class="step-desc">ผลิตคอนเทนต์, ออกแบบ Creative และเปิดแคมเปญ</p></div></div>
        <div class="detail-step"><div class="step-num">04</div><div class="step-body"><p class="step-title">Optimize</p><p class="step-desc">ติดตามผลแบบ Real-time และปรับ Bidding, Targeting, Creative</p></div></div>
        <div class="detail-step"><div class="step-num">05</div><div class="step-body"><p class="step-title">Report & Scale</p><p class="step-desc">รายงานผลรายเดือน วิเคราะห์ Insight และวางแผนขยายผล</p></div></div>
      </div>
    </div>
    <div class="poster-section">
      <h2>โปสเตอร์โปรโมท</h2>
      <div class="poster-grid" id="posterGrid"><p class="poster-empty" id="posterEmpty">ยังไม่มีโปสเตอร์ — แอดมินสามารถเพิ่มได้จากหน้าจัดการระบบ</p></div>
    </div>
    <div class="poster-section">
      <h2>ผลงาน Digital Marketing</h2>
      <div class="port-grid" id="portfolioGrid"><p class="poster-empty" id="portfolioEmpty">ยังไม่มีผลงาน — แอดมินสามารถเพิ่มได้จากหน้าจัดการระบบ</p></div>
    </div>
    <div class="detail-cta"><h3>พร้อมเพิ่ม ROI ให้ธุรกิจ?</h3><p>ขอรับ Digital Marketing Audit ฟรี และดูว่าจุดไหนที่ยังสูญเปล่า</p><a href="{{ route('home') }}#contact" class="btn btn-primary">ขอ Free Audit →</a></div>
  </div>
  <script src="{{ asset('js/api-store.js') }}"></script>
  <script>
    const SLUG='service-marketing';
    function renderPosters(){const g=document.getElementById('posterGrid'),e=document.getElementById('posterEmpty'),p=window.GTStore.getServicePosters(SLUG);if(!p.length){e.style.display='';return;}e.style.display='none';g.innerHTML=p.map(x=>`<div class="poster-card"><img src="${x.image}" alt="${x.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='200px'"><div class="poster-card__body"><p class="poster-card__title">${x.title}</p>${x.description?`<p class="poster-card__desc">${x.description}</p>`:''}</div></div>`).join('');}
    function renderPortfolio(){const g=document.getElementById('portfolioGrid'),e=document.getElementById('portfolioEmpty'),p=window.GTStore.getServicePortfolio(SLUG);if(!p.length){e.style.display='';return;}e.style.display='none';g.innerHTML=p.map(x=>`<div class="port-card"><img src="${x.image}" alt="${x.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='160px'"><div class="port-card__body">${x.tags&&x.tags.length?`<div class="port-card__tags">${x.tags.map(t=>`<span class="port-card__tag">${t}</span>`).join('')}</div>`:''}<p class="port-card__title">${x.title}</p>${x.description?`<p class="port-card__desc">${x.description}</p>`:''} ${x.year?`<p class="port-card__year">ปี ${x.year}</p>`:''}</div></div>`).join('');}
    renderPosters();renderPortfolio();
  </script>
</div>
@endsection

@section('extra_scripts')
<script src="{{ asset('js/api-store.js') }}"></script>
  <script>
    const SLUG='service-marketing';
    function renderPosters(){const g=document.getElementById('posterGrid'),e=document.getElementById('posterEmpty'),p=window.GTStore.getServicePosters(SLUG);if(!p.length){e.style.display='';return;}e.style.display='none';g.innerHTML=p.map(x=>`<div class="poster-card"><img src="${x.image}" alt="${x.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='200px'"><div class="poster-card__body"><p class="poster-card__title">${x.title}</p>${x.description?`<p class="poster-card__desc">${x.description}</p>`:''}</div></div>`).join('');}
    function renderPortfolio(){const g=document.getElementById('portfolioGrid'),e=document.getElementById('portfolioEmpty'),p=window.GTStore.getServicePortfolio(SLUG);if(!p.length){e.style.display='';return;}e.style.display='none';g.innerHTML=p.map(x=>`<div class="port-card"><img src="${x.image}" alt="${x.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='160px'"><div class="port-card__body">${x.tags&&x.tags.length?`<div class="port-card__tags">${x.tags.map(t=>`<span class="port-card__tag">${t}</span>`).join('')}</div>`:''}<p class="port-card__title">${x.title}</p>${x.description?`<p class="port-card__desc">${x.description}</p>`:''} ${x.year?`<p class="port-card__year">ปี ${x.year}</p>`:''}</div></div>`).join('');}
    renderPosters();renderPortfolio();
  </script>
</body>
</html>


@endsection

