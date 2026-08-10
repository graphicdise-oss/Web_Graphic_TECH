<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="description" content="@yield('description', 'Graphic TECH — Creative & Technology Studio')">
  <title>@yield('title', 'Graphic TECH')</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700;800&family=Sora:wght@400;500;600;700;800&display=swap">

  <link rel="stylesheet" href="{{ asset('css/base.css') }}">
  <link rel="stylesheet" href="{{ asset('css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
  <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
  @stack('styles')
</head>

<body>
  <a href="#main" class="skip-link">ข้ามไปยังเนื้อหาหลัก</a>

  @include('partials.navbar')

  <main id="main">
    @yield('content')
  </main>

  @include('partials.footer')
  @include('partials.fab')

  @stack('data')
  <script src="{{ asset('js/counters.js') }}"></script>
  <script src="{{ asset('js/testimonials.js') }}"></script>
  <script src="{{ asset('js/faq.js') }}"></script>
  <script src="{{ asset('js/contact-form.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  @stack('scripts')
</body>

</html>
