@extends('layouts.app')

@section('title', $service->name . ' | Graphic TECH')
@section('description', $service->description)

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endpush

@php $c = $service->content ?? []; @endphp

@section('content')
  <div class="svc-page-wrap">
    <a href="{{ route('home') }}#services" class="svc-back">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M19 12H5M12 19l-7-7 7-7" />
      </svg>
      กลับหน้าหลัก
    </a>

    @if ($service->banner_image)
      <div class="svc-banner">
        <img src="{{ $service->banner_image }}" alt="{{ $service->name }} banner">
      </div>
    @endif

    <div class="detail-header detail-hero">
      <span class="detail-label">บริการของเรา</span>
      <h1 class="detail-title">{{ $service->name }}</h1>
      <p class="detail-subtitle">{{ $c['subtitle'] ?? $service->description }}</p>
    </div>

    @if (!empty($c['stats']))
      <div class="detail-stats">
        @foreach ($c['stats'] as $stat)
          <div class="detail-stat">
            <div class="detail-stat-value">{{ $stat['value'] }}</div>
            <div class="detail-stat-label">{{ $stat['label'] }}</div>
          </div>
        @endforeach
      </div>
    @endif

    @if (!empty($c['deliverables']))
      <div class="detail-section">
        <h2 class="detail-section-title">สิ่งที่เราส่งมอบ</h2>
        <div class="detail-icon-grid detail-grid">
          @foreach ($c['deliverables'] as $item)
            <div class="detail-icon-card">
              <div class="dic-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">{!! $item['icon'] !!}</svg>
              </div>
              <p class="dic-title">{{ $item['title'] }}</p>
              <p class="dic-desc">{{ $item['desc'] }}</p>
            </div>
          @endforeach
        </div>
      </div>
    @endif

    @if (!empty($c['process']))
      <div class="detail-section">
        <h2 class="detail-section-title">กระบวนการทำงาน</h2>
        <div class="detail-process">
          @foreach ($c['process'] as $i => $step)
            <div class="detail-step">
              <div class="step-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</div>
              <div class="step-body">
                <p class="step-title">{{ $step['title'] }}</p>
                <p class="step-desc">{{ $step['desc'] }}</p>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    @endif

    <!-- ═══ PROMOTIONAL POSTERS (editable in admin) ═══ -->
    <div class="poster-section">
      <h2>โปสเตอร์โปรโมท</h2>
      <div class="poster-grid">
        @forelse ($posters as $poster)
          <a class="poster-card" href="{{ $poster->link ?: '#' }}" @if($poster->link) target="_blank" rel="noopener" @endif>
            <img src="{{ $poster->image }}" alt="{{ $poster->title }}">
            @if ($poster->title)
              <div class="poster-card__body">
                <p class="poster-card__title">{{ $poster->title }}</p>
              </div>
            @endif
          </a>
        @empty
          <p class="poster-empty">ยังไม่มีโปสเตอร์ — แอดมินสามารถเพิ่มได้จากหน้าจัดการระบบ</p>
        @endforelse
      </div>
    </div>

    <!-- ═══ PORTFOLIO SCOPED TO THIS SERVICE ═══ -->
    <div class="poster-section">
      <h2>ผลงาน {{ $service->name }}</h2>
      <div class="port-grid">
        @forelse ($portfolios as $item)
          <div class="port-card">
            <img src="{{ $item->image }}" alt="{{ $item->title }}">
            <div class="port-card__body">
              @if ($item->tags)
                <div class="port-card__tags">
                  @foreach ($item->tags as $tag)
                    <span class="port-card__tag">{{ $tag }}</span>
                  @endforeach
                </div>
              @endif
              <p class="port-card__title">{{ $item->title }}</p>
              @if ($item->description)
                <p class="port-card__desc">{{ $item->description }}</p>
              @endif
              @if ($item->year)
                <p class="port-card__year">ปี {{ $item->year }}</p>
              @endif
            </div>
          </div>
        @empty
          <p class="poster-empty">ยังไม่มีผลงาน — แอดมินสามารถเพิ่มได้จากหน้าจัดการระบบ</p>
        @endforelse
      </div>
    </div>

    <div class="detail-cta">
      <h3>{{ $c['cta']['title'] ?? 'พร้อมเริ่มโปรเจกต์กับเรา?' }}</h3>
      <p>{{ $c['cta']['text'] ?? 'ปรึกษาทีมผู้เชี่ยวชาญของเราได้ฟรี' }}</p>
      <a href="{{ route('home') }}#contact" class="btn btn-primary">{{ $c['cta']['button'] ?? 'ปรึกษาฟรี →' }}</a>
    </div>
  </div>
@endsection
