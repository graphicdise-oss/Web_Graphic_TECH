@extends('layouts.app')

@section('title', 'Graphic TECH — Creative & Technology Studio')
@section('description', 'Graphic TECH คือทีมผู้เชี่ยวชาญด้าน UI/UX, Graphic Design, Web Development, Digital Marketing, ERP System และ Branding')

@push('styles')
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@section('content')

  <!-- ═══════════════════════ HERO ═══════════════════════ -->
  <section class="hero" id="home">
    <div class="hero-grid-bg" aria-hidden="true"></div>
    <div class="hero-orb hero-orb--1 float-shape" aria-hidden="true"></div>
    <div class="hero-orb hero-orb--2 float-shape float-shape--slow" aria-hidden="true"></div>

    <div class="container">
      <div class="hero__inner">
        <div class="hero__content">
          <p class="eyebrow hero-anim hd-1">Creative × Technology Studio</p>
          <h1 class="hero__title hero-anim hd-2">
            <span class="line">สร้างแบรนด์ให้แข็งแกร่ง</span>
            <span class="line">ด้วยดีไซน์และเทคโนโลยี</span>
            <span class="line text-gradient">ระดับมืออาชีพ</span>
          </h1>
          <p class="hero__sub hero-anim hd-3">
            Graphic TECH คือทีมผู้เชี่ยวชาญด้าน UI/UX, Graphic Design, Web Development,
            Digital Marketing, ERP System และ Branding ที่พร้อมยกระดับธุรกิจของคุณให้เติบโต
            อย่างมั่นคงและน่าเชื่อถือ
          </p>
          <div class="hero__actions hero-anim hd-4">
            <a href="#contact" class="btn btn-primary btn-lg">
              ปรึกษาผู้เชี่ยวชาญฟรี
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M13 6l6 6-6 6" />
              </svg>
            </a>
            <a href="#portfolio" class="btn btn-ghost btn-lg">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z" />
                <circle cx="12" cy="12" r="3" />
              </svg>
              ดูผลงานของเรา
            </a>
          </div>
          <div class="hero__trust hero-anim hd-5">
            <div class="trust-chips">
              <span class="trust-chip"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                  <path d="M20 6L9 17l-5-5" />
                </svg>ผลงานกว่า 500+ โปรเจกต์</span>
              <span class="trust-chip"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                  <path d="M20 6L9 17l-5-5" />
                </svg>ลูกค้าไว้วางใจ 150+ แบรนด์</span>
              <span class="trust-chip"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                  <path d="M20 6L9 17l-5-5" />
                </svg>ประสบการณ์กว่า 8 ปี</span>
            </div>
          </div>
        </div>

        <div class="hero__visual hero-anim hd-3">
          <div class="hero__stage">
            <svg class="hero__mark" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="0.6"
              aria-hidden="true">
              <path d="M12 2l9 4.9v10.2L12 22l-9-4.9V6.9L12 2z" />
              <path d="M12 22V12M21 6.9L12 12 3 6.9" />
            </svg>

            <figure class="collage-card collage-card--a float-shape float-shape--sm" style="--r:-4deg">
              <div class="collage-card__thumb">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                  <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                </svg>
              </div>
              <figcaption class="collage-card__tag">Kinto Coffee — Brand System<small>Branding · 2023</small>
              </figcaption>
            </figure>

            <figure class="collage-card collage-card--b float-shape float-shape--sm" style="--r:5deg">
              <div class="collage-card__thumb">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                  <polyline points="16 18 22 12 16 6" />
                  <polyline points="8 6 2 12 8 18" />
                </svg>
              </div>
              <figcaption class="collage-card__tag">ArtSpace Gallery<small>Web Development</small></figcaption>
            </figure>

            <figure class="collage-card collage-card--c float-shape float-shape--sm" style="--r:3deg">
              <div class="collage-card__thumb">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
                  <rect x="2" y="3" width="20" height="14" rx="2" />
                  <path d="M8 21h8M12 17v4" />
                </svg>
              </div>
              <figcaption class="collage-card__tag">ReBank Mobile UX<small>UI/UX Design</small></figcaption>
            </figure>

            <div class="hero__collage-stat">
              <span class="icon-tile icon-tile--sm"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2">
                  <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                  <circle cx="9" cy="7" r="4" />
                  <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                </svg></span>
              <span><b>150+</b><span>แบรนด์ไว้วางใจ</span></span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="hero__scroll">
      <span>Scroll</span>
      <span class="wheel"></span>
    </div>
  </section>

  <!-- ═══════════════════════ AUTO SLIDER BANNER (Poster/Promo — editable in admin) ═══════════════════════ -->
  @if ($banners->count())
    <section class="banner-slider" aria-label="แบนเนอร์โปรโมท">
      <div class="slider-container" id="mainSlider">
        <div class="slider-track" id="sliderTrack">
          @foreach ($banners as $banner)
            <div class="slide">
              <a href="{{ $banner->link ?: '#contact' }}">
                <img src="{{ $banner->image }}" alt="{{ $banner->title }}">
              </a>
            </div>
          @endforeach
        </div>
        <button class="slider-btn prev" id="sliderPrev" aria-label="Previous slide">&#10094;</button>
        <button class="slider-btn next" id="sliderNext" aria-label="Next slide">&#10095;</button>
        <div class="slider-dots" id="sliderDots"></div>
      </div>
    </section>
  @endif

  <!-- ═══════════════════════ SOCIAL PROOF — CLIENT MARQUEE ═══════════════════════ -->
  <section class="proof reveal" aria-label="ลูกค้าที่ไว้วางใจเรา">
    <div class="container">
      <p class="proof__label">แบรนด์และองค์กรที่ไว้วางใจให้เราดูแล</p>
    </div>
    <div class="marquee">
      <div class="marquee__track" id="clientMarquee">
        @php
          $clients = ['Mandarin Oriental', 'Novae Group', 'FlowMed Health', 'LogiPro', 'Siam Collection', 'Bloom Beauty'];
        @endphp
        @foreach (array_merge($clients, $clients) as $i => $client)
          <span class="client-logo" @if($i >= count($clients)) aria-hidden="true" @endif>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6">
              <circle cx="12" cy="12" r="9" />
              <path d="M8 12l3 3 5-6" />
            </svg>{{ $client }}
          </span>
        @endforeach
      </div>
    </div>
  </section>

  <!-- ═══════════════════════ SERVICES ═══════════════════════ -->
  <section class="section services" id="services">
    <div class="container">
      <div class="sec-head sec-head--split reveal">
        <div class="sec-head__main">
          <p class="eyebrow">What We Do</p>
          <h2>บริการของเรา<br>ครบวงจรทุกมิติ</h2>
        </div>
        <p class="sec-head__aside">ตั้งแต่การวางกลยุทธ์ ออกแบบ ไปจนถึงพัฒนาระบบ
          เราดูแลทุกขั้นตอนด้วยทีมผู้เชี่ยวชาญเฉพาะทาง
          ไม่ว่าธุรกิจของคุณจะอยู่ในอุตสาหกรรมใด</p>
      </div>

      <div class="grid grid-3">
        @foreach ($services as $i => $service)
          @php $c = $service->content ?? []; @endphp
          <article
            class="service-card {{ $i === 0 ? 'service-card--featured' : '' }} reveal d-{{ ($i % 3) + 1 }}"
            tabindex="0" role="link" aria-label="{{ $service->name }}"
            onclick="window.open('{{ route('page', $service->slug) }}', '_blank')">
            <span class="service-card__num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
            <span class="icon-tile">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"
                stroke-linejoin="round">{!! $service->icon !!}</svg>
            </span>
            <h3>{{ $service->name }}</h3>
            <p>{{ $service->description }}</p>
            <div class="service-card__foot">
              <span class="small">{{ $c['tags'] ?? '' }}</span>
              <span class="service-card__arrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2">
                  <path d="M5 12h14M13 6l6 6-6 6" />
                </svg></span>
            </div>
          </article>
        @endforeach
      </div>

      <div class="services__foot reveal">
        <a href="#contact" class="btn btn-primary">ปรึกษาผู้เชี่ยวชาญฟรี</a>
        <a href="#portfolio" class="link-arrow">ดูผลงานที่ผ่านมา
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M5 12h14M13 6l6 6-6 6" />
          </svg>
        </a>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════ PORTFOLIO ═══════════════════════ -->
  <section class="section portfolio" id="portfolio">
    <div class="container">
      <div class="sec-head reveal">
        <p class="eyebrow eyebrow--tag">Our Work</p>
        <h2>ผลงานที่ผ่านมาของเรา</h2>
        <p>ตัวอย่างส่วนหนึ่งจากผลงานที่เราภาคภูมิใจ ครอบคลุมหลากหลายอุตสาหกรรม</p>
      </div>

      <div class="filters reveal" id="portfolioFilters">
        <button class="filter-btn is-active" data-filter="all">ทั้งหมด</button>
        @foreach ($portfolios->pluck('category')->unique() as $cat)
          <button class="filter-btn" data-filter="{{ $cat }}">{{ $cat }}</button>
        @endforeach
      </div>

      <div class="portfolio-grid" id="portfolioGrid">
        <!-- populated client-side from window.PORTFOLIO_ITEMS -->
      </div>
      <div class="portfolio__foot">
        <button class="btn btn-outline" id="loadMoreBtn">โหลดผลงานเพิ่มเติม</button>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════ WHY CHOOSE US ═══════════════════════ -->
  <section class="section why" id="why">
    <div class="container">
      <div class="why__wrap">
        <div class="why__media reveal-left">
          <div class="why__media-card">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2">
              <path d="M12 2l9 4.9v10.2L12 22l-9-4.9V6.9L12 2z" />
              <path d="M12 22V12M21 6.9L12 12 3 6.9" />
            </svg>
          </div>
          <div class="why__media-badge">
            <span class="icon-tile icon-tile--sm"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2">
                <path
                  d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 000-7.78z" />
              </svg></span>
            <span><b>98% พึงพอใจ</b><span>จากลูกค้าที่ใช้บริการ</span></span>
          </div>
        </div>

        <div class="why__content reveal-right">
          <p class="eyebrow">Why Graphic TECH</p>
          <h2>เหตุผลที่แบรนด์ชั้นนำ<br>เลือกไว้วางใจเรา</h2>
          <p class="lead">เราไม่ได้เป็นแค่ผู้รับจ้างทำงาน แต่เป็นพาร์ทเนอร์ที่เข้าใจเป้าหมายธุรกิจ
            และส่งมอบผลลัพธ์ที่วัดผลได้จริงในทุกโปรเจกต์</p>

          <div class="why-list">
            <div class="why-item">
              <span class="icon-tile icon-tile--sm"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2">
                  <path d="M12 2l3 7h7l-5.5 4.5L18.5 21 12 16.5 5.5 21l2-7.5L2 9h7z" />
                </svg></span>
              <div>
                <h4>ทีมงานมืออาชีพเฉพาะทาง</h4>
                <p>นักออกแบบและนักพัฒนาที่มีประสบการณ์ตรงในแต่ละสายงาน</p>
              </div>
            </div>
            <div class="why-item">
              <span class="icon-tile icon-tile--sm"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2">
                  <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z" />
                </svg></span>
              <div>
                <h4>ทำงานรวดเร็ว ตรงเวลา</h4>
                <p>วางแผนและควบคุมไทม์ไลน์อย่างเป็นระบบ ส่งมอบงานตามกำหนดเสมอ</p>
              </div>
            </div>
            <div class="why-item">
              <span class="icon-tile icon-tile--sm"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2">
                  <rect x="3" y="11" width="18" height="10" rx="2" />
                  <path d="M7 11V7a5 5 0 0110 0v4" />
                </svg></span>
              <div>
                <h4>โปร่งใส ตรวจสอบได้</h4>
                <p>รายงานความคืบหน้าสม่ำเสมอ พร้อมสรุปผลลัพธ์อย่างชัดเจน</p>
              </div>
            </div>
            <div class="why-item">
              <span class="icon-tile icon-tile--sm"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                  stroke-width="2">
                  <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                  <circle cx="9" cy="7" r="4" />
                  <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                </svg></span>
              <div>
                <h4>ดูแลหลังส่งมอบงาน</h4>
                <p>ทีม Support พร้อมช่วยเหลือหลัง Launch เพื่อความอุ่นใจของคุณ</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════ TESTIMONIALS ═══════════════════════ -->
  @if ($testimonials->count())
    <section class="section testimonials" id="testimonials">
      <div class="container">
        <div class="sec-head sec-head--center reveal">
          <p class="eyebrow eyebrow--light">Testimonials</p>
          <h2>เสียงจากลูกค้าของเรา</h2>
          <p>ความไว้วางใจจากลูกค้าคือเครื่องพิสูจน์คุณภาพงานของเราที่ดีที่สุด</p>
        </div>
      </div>

      <div class="container t-track-wrap">
        <div class="t-track" id="testimonialTrack">
          @foreach ($testimonials->chunk(3) as $slide)
            <div class="t-slide">
              @foreach ($slide as $t)
                <div class="t-card">
                  <div class="t-card__stars">
                    @for ($s = 0; $s < $t->rating; $s++)
                      <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2l3 7h7l-5.5 4.5L18.5 21 12 16.5 5.5 21l2-7.5L2 9h7z" />
                      </svg>
                    @endfor
                  </div>
                  <p class="t-card__quote">"{{ $t->comment }}"</p>
                  <div class="t-card__person">
                    <span class="t-avatar">{{ $t->avatar ?: mb_substr($t->name, 0, 1) }}</span>
                    <span><b>{{ $t->name }}</b><span>{{ trim(($t->position ?? '') . ', ' . ($t->company ?? ''), ', ') }}</span></span>
                  </div>
                </div>
              @endforeach
            </div>
          @endforeach
        </div>
      </div>

      <div class="t-controls">
        <button class="t-arrow" id="tPrev" aria-label="ก่อนหน้า"><svg viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2">
            <path d="M15 18l-6-6 6-6" />
          </svg></button>
        <div class="t-dots" id="tDots">
          @foreach ($testimonials->chunk(3) as $i => $slide)
            <span class="t-dot {{ $i === 0 ? 'is-active' : '' }}"></span>
          @endforeach
        </div>
        <button class="t-arrow" id="tNext" aria-label="ถัดไป"><svg viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2">
            <path d="M9 18l6-6-6-6" />
          </svg></button>
      </div>
    </section>
  @endif

  <!-- ═══════════════════════ FAQ ═══════════════════════ -->
  <section class="section section--soft" id="faq">
    <div class="container container--narrow">
      <div class="sec-head reveal">
        <p class="eyebrow eyebrow--tag">FAQ</p>
        <h2>คำถามที่พบบ่อย</h2>
        <p>ยังมีคำถามอื่นๆ ที่อยากรู้เพิ่มเติม? ทักหาทีมงานได้ทุกช่องทาง</p>
      </div>

      <div class="accordion reveal" id="faqAccordion">
        <div class="acc-item is-open">
          <button class="acc-trigger" aria-expanded="true">
            ใช้เวลานานแค่ไหนกว่าจะเห็นผลงานเบื้องต้น?
            <span class="acc-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                <path d="M12 5v14M5 12h14" />
              </svg></span>
          </button>
          <div class="acc-panel">
            <div class="acc-panel__inner">โดยเฉลี่ยลูกค้าจะเห็น Concept หรือ Wireframe เบื้องต้นภายใน 5-7 วันทำการ
              หลังจากตกลง Scope งานและชำระมัดจำ ขึ้นอยู่กับความซับซ้อนของแต่ละโปรเจกต์</div>
          </div>
        </div>
        <div class="acc-item">
          <button class="acc-trigger" aria-expanded="false">
            คิดค่าบริการอย่างไร มีแพ็กเกจสำเร็จรูปไหม?
            <span class="acc-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                <path d="M12 5v14M5 12h14" />
              </svg></span>
          </button>
          <div class="acc-panel">
            <div class="acc-panel__inner">เรามีทั้งแพ็กเกจมาตรฐานสำหรับงานทั่วไป และแบบ Custom Quote ตาม Scope จริง
              ทีมงานจะประเมินราคาให้ฟรีหลังทราบรายละเอียดโปรเจกต์ของคุณ</div>
          </div>
        </div>
        <div class="acc-item">
          <button class="acc-trigger" aria-expanded="false">
            หลังส่งมอบงานแล้ว มีการดูแลต่อหรือไม่?
            <span class="acc-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                <path d="M12 5v14M5 12h14" />
              </svg></span>
          </button>
          <div class="acc-panel">
            <div class="acc-panel__inner">ทุกโปรเจกต์มีระยะเวลาดูแลหลังส่งมอบฟรีอย่างน้อย 30 วัน และมีแพ็กเกจ
              Maintenance รายเดือนสำหรับลูกค้าที่ต้องการดูแลต่อเนื่องระยะยาว</div>
          </div>
        </div>
        <div class="acc-item">
          <button class="acc-trigger" aria-expanded="false">
            รับงานด่วนหรือโปรเจกต์ขนาดเล็กหรือไม่?
            <span class="acc-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                <path d="M12 5v14M5 12h14" />
              </svg></span>
          </button>
          <div class="acc-panel">
            <div class="acc-panel__inner">รับครับ เรามีทีมที่ดูแลงานเร่งด่วนโดยเฉพาะ พร้อมทั้งงานขนาดเล็กอย่าง
              Logo หรือ Landing Page เดี่ยว ไปจนถึงระบบขนาดใหญ่ระดับองค์กร</div>
          </div>
        </div>
        <div class="acc-item">
          <button class="acc-trigger" aria-expanded="false">
            ติดต่อขอใบเสนอราคาได้ช่องทางไหนบ้าง?
            <span class="acc-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4">
                <path d="M12 5v14M5 12h14" />
              </svg></span>
          </button>
          <div class="acc-panel">
            <div class="acc-panel__inner">ติดต่อได้ผ่านฟอร์มด้านล่างของหน้านี้ อีเมล โทรศัพท์ หรือ LINE Official
              ทีมงานตอบกลับภายใน 24-48 ชั่วโมงทำการ</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════ CTA BAND ═══════════════════════ -->
  <section class="section section--tight cta-band">
    <div class="container">
      <div class="cta-band__inner reveal-scale">
        <div class="cta-band__text">
          <h2>พร้อมเริ่มต้นโปรเจกต์ถัดไปกับเราหรือยัง?</h2>
          <p>ปรึกษาทีมผู้เชี่ยวชาญของเราวันนี้ ฟรี ไม่มีค่าใช้จ่าย พร้อมประเมิน Scope และงบประมาณเบื้องต้นให้ทันที</p>
        </div>
        <div class="cta-band__actions">
          <a href="#contact" class="btn btn-white btn-lg">ปรึกษาผู้เชี่ยวชาญฟรี</a>
          <a href="tel:021234567" class="btn btn-line-outline btn-lg">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path
                d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.362 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0122 16.92z" />
            </svg>
            โทร 02-123-4567
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ═══════════════════════ CONTACT ═══════════════════════ -->
  <section class="section contact-home" id="contact">
    <div class="container">
      <div class="sec-head sec-head--center reveal">
        <p class="eyebrow">Let's Talk</p>
        <h2>พร้อมเริ่มโปรเจกต์ใหม่กับเรา?</h2>
        <p>บอกเราเรื่องของคุณ ทีมงานพร้อมรับฟังและออกแบบทางออกที่ดีที่สุดสำหรับธุรกิจของคุณ</p>
      </div>

      <div class="contact-home__wrap reveal">
        <div class="contact-home__info">
          <h2>ช่องทางติดต่อเรา</h2>
          <p>เลือกช่องทางที่สะดวก ทีมงานพร้อมตอบกลับภายใน 24 ชั่วโมง</p>
          <ul class="contact-home__list">
            <li>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M21 10c0 6-9 12-9 12s-9-6-9-12a9 9 0 0118 0z" />
                <circle cx="12" cy="10" r="3" />
              </svg>
              <span>123 อาคารเทคโนโลยี ชั้น 8 ถ.สุขุมวิท แขวงคลองตันเหนือ เขตวัฒนา กรุงเทพฯ 10110</span>
            </li>
            <li>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path
                  d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.362 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0122 16.92z" />
              </svg>
              <span>02-123-4567 &nbsp;/&nbsp; 081-234-5678</span>
            </li>
            <li>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z" />
                <path d="M22 6l-10 7L2 6" />
              </svg>
              <span>hello@graphictech.co.th</span>
            </li>
            <li>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="3" y="4" width="18" height="18" rx="2" />
                <path d="M16 2v4M8 2v4M3 10h18" />
              </svg>
              <span>จันทร์–เสาร์ 9:00–18:00 น.</span>
            </li>
          </ul>
        </div>

        <form class="contact-home__form" id="contactForm" action="{{ route('messages.store') }}" method="POST" novalidate>
          @csrf
          <div class="form-alert form-alert--ok" id="formSuccess" @if(session('sent')) style="display:flex" @endif>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M20 6L9 17l-5-5" />
            </svg>
            ส่งข้อความเรียบร้อยแล้ว ทีมงานจะติดต่อกลับโดยเร็วที่สุด
          </div>
          <div class="form-grid">
            <div class="field">
              <label for="cfName">ชื่อ-นามสกุล <span class="req">*</span></label>
              <input type="text" id="cfName" name="name" placeholder="ชื่อของคุณ" required>
              <p class="field-error">กรุณากรอกชื่อของคุณ</p>
            </div>
            <div class="field">
              <label for="cfPhone">เบอร์โทรศัพท์ <span class="req">*</span></label>
              <input type="tel" id="cfPhone" name="phone" placeholder="08x-xxx-xxxx" required>
              <p class="field-error">กรุณากรอกเบอร์โทรศัพท์</p>
            </div>
            <div class="field field--full">
              <label for="cfEmail">อีเมล <span class="req">*</span></label>
              <input type="email" id="cfEmail" name="email" placeholder="you@example.com" required>
              <p class="field-error">กรุณากรอกอีเมลให้ถูกต้อง</p>
            </div>
            <div class="field field--full">
              <label for="cfService">บริการที่สนใจ</label>
              <select id="cfService" name="service">
                <option value="">เลือกบริการที่สนใจ</option>
                @foreach ($services as $service)
                  <option value="{{ $service->name }}">{{ $service->name }}</option>
                @endforeach
                <option value="อื่นๆ">อื่นๆ</option>
              </select>
            </div>
            <div class="field field--full">
              <label for="cfMessage">รายละเอียดโปรเจกต์ <span class="req">*</span></label>
              <textarea id="cfMessage" name="message" placeholder="เล่าให้เราฟังคร่าวๆ เกี่ยวกับโปรเจกต์ของคุณ"
                required></textarea>
              <p class="field-error">กรุณากรอกรายละเอียดโปรเจกต์</p>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block btn-lg mt-40">
            ส่งข้อความถึงเรา
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
              <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z" />
            </svg>
          </button>
          <p class="form-note tc mt-40">หรือส่งอีเมลถึงเราโดยตรงที่ <a href="mailto:hello@graphictech.co.th"
              class="accent">hello@graphictech.co.th</a></p>
        </form>
      </div>
    </div>
  </section>

@endsection

@push('data')
  <script>
    window.PORTFOLIO_ITEMS = @json($portfolioItems);
    window.PORTFOLIO_PAGE_SIZE = 6;
  </script>
@endpush
