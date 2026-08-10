<!DOCTYPE html>
<html lang="th">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>เข้าสู่ระบบแอดมิน | Graphic TECH</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700;800&family=Sora:wght@400;500;600;700;800&display=swap">
  <link rel="stylesheet" href="{{ asset('css/base.css') }}">
  <link rel="stylesheet" href="{{ asset('css/components.css') }}">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, var(--primary-deep) 0%, var(--primary) 100%);
      padding: 20px;
    }
    .login-card {
      background: #fff;
      padding: 40px;
      border-radius: var(--r-md);
      box-shadow: 0 20px 40px rgba(0, 0, 0, .15);
      width: 100%;
      max-width: 420px;
      text-align: center;
    }
    .login-card h1 { color: var(--ink); margin-bottom: 8px; font-weight: 700; font-size: 1.6rem; }
    .login-card h1 span { color: var(--primary); }
    .login-card p { color: var(--body); font-size: .9rem; margin-bottom: 24px; }
    .error-msg {
      background: #FFE5E5;
      color: #C0392B;
      padding: 10px 14px;
      border-radius: var(--r-sm);
      font-size: .85rem;
      margin-bottom: 20px;
      text-align: left;
      border-left: 4px solid #C0392B;
    }
    .form-group { text-align: left; margin-bottom: 16px; }
    .form-group label { display: block; font-size: .85rem; font-weight: 600; color: var(--ink); margin-bottom: 6px; }
    .form-group input {
      width: 100%;
      padding: 11px 14px;
      border: 1px solid var(--line);
      border-radius: var(--r-sm);
      font-size: .95rem;
      font-family: inherit;
    }
    .form-group input:focus { outline: none; border-color: var(--primary); }
    .btn-block { width: 100%; justify-content: center; margin-top: 8px; }
    .back-link { display: inline-block; margin-top: 20px; font-size: .85rem; color: var(--primary); text-decoration: none; }
  </style>
</head>

<body>
  <div class="login-card">
    <h1>Graphic<span>TECH</span> Admin</h1>
    <p>กรอกชื่อผู้ใช้และรหัสผ่านเพื่อเข้าสู่ระบบหลังบ้าน</p>

    @if ($errors->any())
      <div class="error-msg">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="{{ route('admin.login') }}">
      @csrf
      <div class="form-group">
        <label for="username">ชื่อผู้ใช้ (Username)</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}"
          placeholder="ชื่อผู้ใช้ หรืออีเมล" required autofocus>
      </div>
      <div class="form-group">
        <label for="password">รหัสผ่าน (Password)</label>
        <input type="password" id="password" name="password" placeholder="รหัสผ่าน" required>
      </div>
      <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบหลังบ้าน</button>
    </form>

    <a href="{{ route('home') }}" class="back-link">&larr; กลับไปหน้าเว็บไซต์หลัก</a>
  </div>
</body>

</html>
