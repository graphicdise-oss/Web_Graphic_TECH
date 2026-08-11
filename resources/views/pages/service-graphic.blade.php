@extends('layouts.app')
@section('title', 'Graphic Design | Graphic TECH')
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
      <h1 class="detail-title">Graphic Design</h1>
      <p class="detail-subtitle">สร้างสรรค์งานกราฟิกที่โดดเด่น ทั้งสื่อดิจิทัลและสิ่งพิมพ์ ให้แบรนด์คุณสะดุดตา จดจำได้ และสร้างความประทับใจแรกอย่างทรงพลัง</p>
    </div>

    <div class="detail-stats">
      <div class="detail-stat"><div class="detail-stat-value">500+</div><div class="detail-stat-label">ชิ้นงานที่สร้าง</div></div>
      <div class="detail-stat"><div class="detail-stat-value">80+</div><div class="detail-stat-label">แบรนด์ที่ดูแล</div></div>
      <div class="detail-stat"><div class="detail-stat-value">7+</div><div class="detail-stat-label">ปีประสบการณ์</div></div>
    </div>

    <div class="detail-section">
      <h2 class="detail-section-title">สิ่งที่เราส่งมอบ</h2>
      <div class="detail-icon-grid detail-grid">
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="13.5" cy="6.5" r="2.5"/><circle cx="6.5" cy="14.5" r="2.5"/><path d="M17 21v-1a4 4 0 00-4-4H5a4 4 0 00-4 4v1"/></svg></div><p class="dic-title">Key Visual</p><p class="dic-desc">ภาพหลักของแคมเปญที่สื่อสารแบรนด์ได้ในชิ้นงานเดียว</p></div>
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg></div><p class="dic-title">Print Design</p><p class="dic-desc">โบรชัวร์ แคตตาล็อก นามบัตร บรรจุภัณฑ์ และสิ่งพิมพ์ทุกประเภท</p></div>
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></div><p class="dic-title">Social Content</p><p class="dic-desc">ออกแบบคอนเทนต์สำหรับ Social Media ทุก Platform</p></div>
        <div class="detail-icon-card"><div class="dic-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/></svg></div><p class="dic-title">Motion & Animation</p><p class="dic-desc">Animated Graphic, GIF Banner, Short Video Graphics</p></div>
      </div>
    </div>

    <div class="detail-section">
      <h2 class="detail-section-title">กระบวนการทำงาน</h2>
      <div class="detail-process">
        <div class="detail-step"><div class="step-num">01</div><div class="step-body"><p class="step-title">Creative Brief</p><p class="step-desc">รับ Brief จากลูกค้า เข้าใจเป้าหมาย กลุ่มเป้าหมาย และ Tone & Manner</p></div></div>
        <div class="detail-step"><div class="step-num">02</div><div class="step-body"><p class="step-title">Concept Development</p><p class="step-desc">พัฒนา Creative Concept 2-3 ทิศทาง พร้อม Moodboard</p></div></div>
        <div class="detail-step"><div class="step-num">03</div><div class="step-body"><p class="step-title">Design Execution</p><p class="step-desc">ลงมือออกแบบตาม Concept ที่อนุมัติ ใส่ใจรายละเอียดทุกจุด</p></div></div>
        <div class="detail-step"><div class="step-num">04</div><div class="step-body"><p class="step-title">Revision & Approval</p><p class="step-desc">ปรับแก้ตาม Feedback จนได้ผลลัพธ์ที่ดีที่สุด</p></div></div>
        <div class="detail-step"><div class="step-num">05</div><div class="step-body"><p class="step-title">File Delivery</p><p class="step-desc">ส่งมอบไฟล์ครบทุก Format สำหรับทั้งสิ่งพิมพ์และดิจิทัล</p></div></div>
      </div>
    </div>

    <div class="poster-section">
      <h2>โปสเตอร์โปรโมท</h2>
      <div class="poster-grid" id="posterGrid">
        <p class="poster-empty" id="posterEmpty">ยังไม่มีโปสเตอร์ — แอดมินสามารถเพิ่มได้จากหน้าจัดการระบบ</p>
      </div>
    </div>

    <div class="poster-section">
      <h2>ผลงาน Graphic Design</h2>
      <div class="port-grid" id="portfolioGrid">
        <p class="poster-empty" id="portfolioEmpty">ยังไม่มีผลงาน — แอดมินสามารถเพิ่มได้จากหน้าจัดการระบบ</p>
      </div>
    </div>

    <div class="detail-cta">
      <h3>พร้อมสร้างงานกราฟิกที่โดดเด่น?</h3>
      <p>แชร์ Brief ของคุณกับเรา เราจะเสนอ Creative Concept ให้ฟรีก่อนตัดสินใจ</p>
      <a href="{{ route('home') }}#contact" class="btn btn-primary">ส่ง Brief ฟรี →</a>
    </div>
  </div>

  <script src="{{ asset('js/api-store.js') }}"></script>
  <script>
    const SLUG = 'service-graphic';
    function renderPosters() {
      const grid = document.getElementById('posterGrid');
      const empty = document.getElementById('posterEmpty');
      const posters = window.GTStore.getServicePosters(SLUG);
      if (!posters.length) { empty.style.display = ''; return; }
      empty.style.display = 'none';
      grid.innerHTML = posters.map(p => `<div class="poster-card"><img src="${p.image}" alt="${p.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='200px'"><div class="poster-card__body"><p class="poster-card__title">${p.title}</p>${p.description ? `<p class="poster-card__desc">${p.description}</p>` : ''}</div></div>`).join('');
    }
    function renderPortfolio() {
      const grid = document.getElementById('portfolioGrid');
      const empty = document.getElementById('portfolioEmpty');
      const items = window.GTStore.getServicePortfolio(SLUG);
      if (!items.length) { empty.style.display = ''; return; }
      empty.style.display = 'none';
      grid.innerHTML = items.map(p => `<div class="port-card"><img src="${p.image}" alt="${p.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='160px'"><div class="port-card__body">${p.tags&&p.tags.length?`<div class="port-card__tags">${p.tags.map(t=>`<span class="port-card__tag">${t}</span>`).join('')}</div>`:''}<p class="port-card__title">${p.title}</p>${p.description?`<p class="port-card__desc">${p.description}</p>`:''} ${p.year?`<p class="port-card__year">ปี ${p.year}</p>`:''}</div></div>`).join('');
    }
    renderPosters(); renderPortfolio();
  </script>
</div>
@endsection

@section('extra_scripts')
<script src="{{ asset('js/api-store.js') }}"></script>
  <script>
    const SLUG = 'service-graphic';
    function renderPosters() {
      const grid = document.getElementById('posterGrid');
      const empty = document.getElementById('posterEmpty');
      const posters = window.GTStore.getServicePosters(SLUG);
      if (!posters.length) { empty.style.display = ''; return; }
      empty.style.display = 'none';
      grid.innerHTML = posters.map(p => `<div class="poster-card"><img src="${p.image}" alt="${p.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='200px'"><div class="poster-card__body"><p class="poster-card__title">${p.title}</p>${p.description ? `<p class="poster-card__desc">${p.description}</p>` : ''}</div></div>`).join('');
    }
    function renderPortfolio() {
      const grid = document.getElementById('portfolioGrid');
      const empty = document.getElementById('portfolioEmpty');
      const items = window.GTStore.getServicePortfolio(SLUG);
      if (!items.length) { empty.style.display = ''; return; }
      empty.style.display = 'none';
      grid.innerHTML = items.map(p => `<div class="port-card"><img src="${p.image}" alt="${p.title}" onerror="this.style.background='#e4ecf7';this.style.minHeight='160px'"><div class="port-card__body">${p.tags&&p.tags.length?`<div class="port-card__tags">${p.tags.map(t=>`<span class="port-card__tag">${t}</span>`).join('')}</div>`:''}<p class="port-card__title">${p.title}</p>${p.description?`<p class="port-card__desc">${p.description}</p>`:''} ${p.year?`<p class="port-card__year">ปี ${p.year}</p>`:''}</div></div>`).join('');
    }
    renderPosters(); renderPortfolio();
  </script>
</body>
</html>


@endsection

