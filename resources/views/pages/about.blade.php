@extends('layouts.app')

@section('title', 'เกี่ยวกับเรา | Graphic TECH')
@section('description', 'Graphic TECH คือสตูดิโอครีเอทีฟที่ผสานดีไซน์เข้ากับเทคโนโลยี')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endpush

@section('content')
  <div class="svc-page-wrap">
    <a href="{{ route('home') }}" class="svc-back">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M19 12H5M12 19l-7-7 7-7" />
      </svg>
      กลับหน้าหลัก
    </a>

    <div class="detail-header detail-hero">
      <span class="detail-label">Our Story</span>
      <h1 class="detail-title">เกี่ยวกับเรา</h1>
      <p class="detail-subtitle">
        Graphic TECH คือสตูดิโอครีเอทีฟที่ผสานดีไซน์เข้ากับเทคโนโลยี
        เพื่อสร้างประสบการณ์ที่มีความหมายให้กับแบรนด์ของคุณ
      </p>
    </div>

    <div class="detail-cover">
      <img src="{{ asset('assets/images/ui/about-team.jpg') }}" alt="Graphic TECH Team"
        onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
      <div class="detail-cover-placeholder" style="display:none">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
          <circle cx="9" cy="7" r="4" />
          <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
        </svg>
        <span>Team Photo</span>
      </div>
    </div>

    <div class="detail-stats detail-section">
      <div class="detail-stat">
        <div class="detail-stat-value">8+</div>
        <div class="detail-stat-label">ปีประสบการณ์</div>
      </div>
      <div class="detail-stat">
        <div class="detail-stat-value">200+</div>
        <div class="detail-stat-label">โปรเจกต์สำเร็จ</div>
      </div>
      <div class="detail-stat">
        <div class="detail-stat-value">95%</div>
        <div class="detail-stat-label">ลูกค้าพอใจ</div>
      </div>
    </div>

    <div class="detail-section">
      <h2 class="detail-section-title">เรื่องราวของเรา</h2>
      <div class="detail-body">
        <p>
          เริ่มต้นในปี 2016 จากทีมนักออกแบบและนักพัฒนาเพียง 3 คน ที่มีความเชื่อร่วมกันว่า
          <strong>ดีไซน์ที่ดีต้องทำงานได้จริง</strong> — สวยงามไม่พอ ต้องสื่อสารได้ชัดเจน
          และแก้ปัญหาธุรกิจได้
        </p>
        <p>
          ปัจจุบัน Graphic TECH เติบโตเป็นทีมกว่า 25 คน ให้บริการลูกค้าตั้งแต่
          สตาร์ตอัปไปจนถึงองค์กรระดับประเทศ ครอบคลุมทุกมิติของการสื่อสารแบรนด์
          ตั้งแต่ Brand Identity จนถึงระบบ ERP
        </p>
      </div>
    </div>

    <div class="detail-divider"></div>

    <div class="detail-section">
      <h2 class="detail-section-title">ค่านิยมของเรา</h2>
      <ul class="detail-list">
        <li><strong>Design with Purpose</strong> — ทุกการตัดสินใจด้านดีไซน์มีเหตุผลรองรับ ไม่ใช่แค่สวย</li>
        <li><strong>Technology First</strong> — ใช้เทคโนโลยีที่เหมาะสม ไม่ใช้เพราะกระแส</li>
        <li><strong>Transparency</strong> — สื่อสารตรงไปตรงมา ทั้งความก้าวหน้าและอุปสรรค</li>
        <li><strong>Long-term Partnership</strong> — มองลูกค้าเป็นพาร์ทเนอร์ ไม่ใช่แค่ลูกค้า</li>
        <li><strong>Continuous Learning</strong> — อัปเดตทักษะและความรู้ใหม่อยู่เสมอ</li>
      </ul>
    </div>

    <div class="detail-section">
      <h2 class="detail-section-title">ทีมงานหลัก</h2>
      <div class="detail-team">
        @foreach ([
            ['name' => 'ก้องภพ วิชัยดิษฐ', 'role' => 'Creative Director'],
            ['name' => 'พิชามญชุ์ ศรีโสภา', 'role' => 'Head of UX'],
            ['name' => 'ณัฐวุฒิ ทองประสาน', 'role' => 'Tech Lead'],
            ['name' => 'ชนิกานต์ รัตนมงคล', 'role' => 'Strategy Director'],
        ] as $member)
          <div class="team-card">
            <div class="team-avatar">
              <div class="team-avatar-placeholder">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
                  <circle cx="12" cy="8" r="4" /><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7" />
                </svg>
              </div>
            </div>
            <div class="team-info">
              <p class="team-name">{{ $member['name'] }}</p>
              <p class="team-role">{{ $member['role'] }}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="detail-cta">
      <h3>อยากร่วมงานกับเรา?</h3>
      <p>เราเปิดรับนักสร้างสรรค์ที่อยากทำงานจริงจัง</p>
      <a href="mailto:career@graphictech.co.th" class="btn btn-primary">ส่ง Portfolio มาได้เลย</a>
    </div>
  </div>
@endsection
