@extends('layouts.app')
@section('title', 'ERP System | Graphic TECH')
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
      <h1 class="detail-title">ERP System</h1>
      <p class="detail-subtitle">ระบบจัดการองค์กรครบวงจร (Enterprise Resource Planning) ที่ช่วยให้ธุรกิจทำงานได้อย่างมีประสิทธิภาพ แม่นยำ และเชื่อมทุก Department เข้าด้วยกัน</p>
    </div>
    <div class="detail-stats">
      <div class="detail-stat"><div class="detail-stat-value">40%</div><div class="detail-stat-label">ลดเวลาทำงานเฉลี่ย</div></div>
      <div class="detail-stat"><div class="detail-stat-value">30+</div><div class="detail-stat-label">ระบบที่ติดตั้งแล้ว</div></div>
      <div class="detail-stat"><div class="detail-stat-value">24/7</div><div class="detail-stat-label">Support SLA</div></div>
    </div>
    <div class="detail-section">
      <h2 class="detail-section-title">โมดูลที่เราพัฒนา</h2>
      <div class="detail-icon-grid detail-grid">
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg></div><p class="dic-title">Inventory Management</p><p class="dic-desc">จัดการสต็อก คลังสินค้า และ Supply Chain แบบ Real-time</p></div>
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M12 2v4m0 12v4M4.93 4.93l2.83 2.83m8.48 8.48l2.83 2.83M2 12h4m12 0h4M4.93 19.07l2.83-2.83m8.48-8.48l2.83-2.83"/></svg></div><p class="dic-title">Finance & Accounting</p><p class="dic-desc">บัญชี การเงิน งบประมาณ และรายงานการเงินอัตโนมัติ</p></div>
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div><p class="dic-title">HR & Payroll</p><p class="dic-desc">บริหารบุคลากร เงินเดือน ลา และประเมินผลการทำงาน</p></div>
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M9 17H7A5 5 0 017 7h2M15 7h2a5 5 0 010 10h-2M8 12h8"/></svg></div><p class="dic-title">CRM & Sales</p><p class="dic-desc">บริหารลูกค้า ติดตาม Sales Pipeline และ Order Management</p></div>
      </div>
    </div>
    <div class="detail-section">
      <h2 class="detail-section-title">กระบวนการติดตั้ง</h2>
      <div class="detail-process">
        <div class="detail-step"><div class="step-num">01</div><div class="step-body"><p class="step-title">Business Analysis</p><p class="step-desc">วิเคราะห์ Process ปัจจุบัน ปัญหา และความต้องการขององค์กร</p></div></div>
        <div class="detail-step"><div class="step-num">02</div><div class="step-body"><p class="step-title">System Design</p><p class="step-desc">ออกแบบ Architecture, Database และ Integration Points</p></div></div>
        <div class="detail-step"><div class="step-num">03</div><div class="step-body"><p class="step-title">Development & Config</p><p class="step-desc">พัฒนาและตั้งค่าระบบตาม Workflow ขององค์กร</p></div></div>
        <div class="detail-step"><div class="step-num">04</div><div class="step-body"><p class="step-title">Data Migration & UAT</p><p class="step-desc">นำเข้าข้อมูลเดิม ทดสอบระบบกับผู้ใช้จริง</p></div></div>
        <div class="detail-step"><div class="step-num">05</div><div class="step-body"><p class="step-title">Go-Live & Training</p><p class="step-desc">เปิดใช้งานจริง พร้อม Training และ Support ต่อเนื่อง</p></div></div>
      </div>
    </div>
    <div class="poster-section">
      <h2>โปสเตอร์โปรโมท</h2>
      <div class="poster-grid" id="posterGrid"><p class="poster-empty" id="posterEmpty">ยังไม่มีโปสเตอร์ — แอดมินสามารถเพิ่มได้จากหน้าจัดการระบบ</p></div>
    </div>
    <div class="poster-section">
      <h2>ผลงาน ERP System</h2>
      <div class="port-grid" id="portfolioGrid"><p class="poster-empty" id="portfolioEmpty">ยังไม่มีผลงาน — แอดมินสามารถเพิ่มได้จากหน้าจัดการระบบ</p></div>
    </div>
    <div class="detail-cta"><h3>พร้อม Digitalize องค์กรของคุณ?</h3><p>ขอรับ ERP Needs Assessment ฟรี เพื่อดูว่าโมดูลใดเหมาะกับธุรกิจของคุณ</p><a href="{{ route('home') }}#contact" class="btn btn-primary">ขอ Free Assessment →</a></div>
  </div>
  <script src="{{ asset('js/api-store.js') }}"></script>
  <script>
    const SLUG='service-erp';
    function renderPosters(){const g=document.getElementById('posterGrid'),e=document.getElementById('posterEmpty'),p=window.GTStore.getServicePosters(SLUG);if(!p.length){e.style.display='';return;}e.style.display='none';g.innerHTML=p.map(x=>`<div class="poster-card"><img src="${x.image}" alt="${x.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='200px'"><div class="poster-card__body"><p class="poster-card__title">${x.title}</p>${x.description?`<p class="poster-card__desc">${x.description}</p>`:''}</div></div>`).join('');}
    function renderPortfolio(){const g=document.getElementById('portfolioGrid'),e=document.getElementById('portfolioEmpty'),p=window.GTStore.getServicePortfolio(SLUG);if(!p.length){e.style.display='';return;}e.style.display='none';g.innerHTML=p.map(x=>`<div class="port-card"><img src="${x.image}" alt="${x.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='160px'"><div class="port-card__body">${x.tags&&x.tags.length?`<div class="port-card__tags">${x.tags.map(t=>`<span class="port-card__tag">${t}</span>`).join('')}</div>`:''}<p class="port-card__title">${x.title}</p>${x.description?`<p class="port-card__desc">${x.description}</p>`:''} ${x.year?`<p class="port-card__year">ปี ${x.year}</p>`:''}</div></div>`).join('');}
    renderPosters();renderPortfolio();
  </script>
</div>
@endsection

@section('extra_scripts')
<script src="{{ asset('js/api-store.js') }}"></script>
  <script>
    const SLUG='service-erp';
    function renderPosters(){const g=document.getElementById('posterGrid'),e=document.getElementById('posterEmpty'),p=window.GTStore.getServicePosters(SLUG);if(!p.length){e.style.display='';return;}e.style.display='none';g.innerHTML=p.map(x=>`<div class="poster-card"><img src="${x.image}" alt="${x.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='200px'"><div class="poster-card__body"><p class="poster-card__title">${x.title}</p>${x.description?`<p class="poster-card__desc">${x.description}</p>`:''}</div></div>`).join('');}
    function renderPortfolio(){const g=document.getElementById('portfolioGrid'),e=document.getElementById('portfolioEmpty'),p=window.GTStore.getServicePortfolio(SLUG);if(!p.length){e.style.display='';return;}e.style.display='none';g.innerHTML=p.map(x=>`<div class="port-card"><img src="${x.image}" alt="${x.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='160px'"><div class="port-card__body">${x.tags&&x.tags.length?`<div class="port-card__tags">${x.tags.map(t=>`<span class="port-card__tag">${t}</span>`).join('')}</div>`:''}<p class="port-card__title">${x.title}</p>${x.description?`<p class="port-card__desc">${x.description}</p>`:''} ${x.year?`<p class="port-card__year">ปี ${x.year}</p>`:''}</div></div>`).join('');}
    renderPosters();renderPortfolio();
  </script>
</body>
</html>


@endsection

