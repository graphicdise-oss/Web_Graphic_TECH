<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Graphic TECH</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap">
    <style>
        /* ═════════ THEME VARIABLES & BASE STYLES ═════════ */
        :root {
            --primary: #2196F3;
            --primary-dark: #1976D2;
            --primary-deep: #0D47A1;
            --ink: #0C1B33;
            --body: #4C5F7C;
            --surface-2: #F4F7FC;
            --line: #E4ECF7;
            --shadow-sm: 0 4px 16px rgba(13, 71, 161, .06);
            --shadow-md: 0 14px 34px rgba(13, 71, 161, .09);
            --r-sm: 8px;
            --r-md: 14px;
            --r-pill: 999px;
            --danger: #E5484D;
            --success: #30A46C;
            --warning: #F59E0B;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Prompt', sans-serif;
        }

        body {
            background-color: var(--surface-2);
            color: var(--body);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* ═════════ LOGIN SCREEN ═════════ */
        #loginScreen {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary-deep) 0%, var(--primary) 100%);
            padding: 20px;
        }

        .login-card {
            background: #fff;
            padding: 40px;
            border-radius: var(--r-md);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 420px;
            text-align: center;
        }

        .login-card h2 {
            color: var(--ink);
            margin-bottom: 8px;
            font-weight: 700;
            font-size: 1.6rem;
        }

        .login-card h2 span {
            color: var(--primary);
        }

        .login-card p {
            color: var(--body);
            font-size: 0.9rem;
            margin-bottom: 24px;
        }

        .error-msg {
            background: #FFE5E5;
            color: var(--danger);
            padding: 10px 14px;
            border-radius: var(--r-sm);
            font-size: 0.85rem;
            margin-bottom: 20px;
            display: none;
            text-align: left;
            border-left: 4px solid var(--danger);
        }

        /* ═════════ DASHBOARD LAYOUT ═════════ */
        #dashboardScreen {
            display: none;
            min-height: 100vh;
            flex-direction: row;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background: var(--ink);
            color: #fff;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            box-shadow: var(--shadow-sm);
        }

        .sidebar__header {
            padding: 24px 20px;
            font-weight: 700;
            font-size: 1.25rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar__header span {
            color: var(--primary);
        }

        .sidebar__menu {
            list-style: none;
            padding: 15px 0;
            flex-grow: 1;
        }

        .sidebar__menu li a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 20px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.25s ease;
            border-left: 4px solid transparent;
        }

        .sidebar__menu li a:hover,
        .sidebar__menu li a.active {
            background: rgba(33, 150, 243, 0.15);
            color: #fff;
            border-left-color: var(--primary);
        }

        .sidebar__menu svg {
            width: 20px;
            height: 20px;
        }

        /* Main Content */
        .main-content {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            height: 100vh;
        }

        /* Topbar */
        .top-bar {
            height: 70px;
            background: #fff;
            border-bottom: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .top-bar h2 {
            color: var(--ink);
            font-size: 1.15rem;
            font-weight: 600;
        }

        .content-area {
            padding: 30px;
            flex-grow: 1;
        }

        /* Tab Panes */
        .tab-pane {
            display: none;
        }

        .tab-pane.active {
            display: block;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(6px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Cards */
        .card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: var(--r-md);
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: var(--shadow-sm);
        }

        .card-header-flex {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .card h3 {
            color: var(--ink);
            font-weight: 600;
            font-size: 1.15rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .card h3::before {
            content: '';
            display: block;
            width: 4px;
            height: 18px;
            background: var(--primary);
            border-radius: 2px;
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 24px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid var(--line);
            border-radius: var(--r-md);
            padding: 20px;
            box-shadow: var(--shadow-sm);
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            background: rgba(33, 150, 243, 0.1);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-icon svg {
            width: 26px;
            height: 26px;
        }

        .stat-info h4 {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--ink);
            line-height: 1.2;
        }

        .stat-info p {
            font-size: 0.85rem;
            color: var(--body);
        }

        /* Forms & Controls */
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--ink);
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 11px 16px;
            background: var(--surface-2);
            border: 1.5px solid var(--line);
            border-radius: var(--r-sm);
            font-size: 0.95rem;
            color: var(--ink);
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: var(--primary);
            background: #fff;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: var(--r-pill);
            font-size: 0.9rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.25s ease;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
            box-shadow: 0 4px 12px rgba(33, 150, 243, 0.25);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
        }

        .btn-outline {
            background: transparent;
            border: 1.5px solid var(--line);
            color: var(--body);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-outline-danger {
            background: transparent;
            border: 1.5px solid #FFCDD2;
            color: var(--danger);
        }

        .btn-outline-danger:hover {
            background: var(--danger);
            color: #fff;
        }

        .btn-outline-success {
            background: transparent;
            border: 1.5px solid #C8E6C9;
            color: var(--success);
        }

        .btn-outline-success:hover {
            background: var(--success);
            color: #fff;
        }

        .btn-outline-warning {
            background: transparent;
            border: 1.5px solid #FFE082;
            color: var(--warning);
        }

        .btn-outline-warning:hover {
            background: var(--warning);
            color: #fff;
        }

        .btn-sm {
            padding: 6px 14px;
            font-size: 0.8rem;
        }

        .btn-block {
            width: 100%;
        }

        .btn-icon {
            width: 34px;
            height: 34px;
            border-radius: var(--r-sm);
            border: 1px solid var(--line);
            background: #fff;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
            color: var(--body);
        }

        .btn-icon:hover {
            background: var(--surface-2);
            color: var(--ink);
        }

        .btn-edit:hover {
            color: var(--primary);
            border-color: var(--primary);
        }

        .btn-delete:hover {
            color: var(--danger);
            border-color: var(--danger);
        }

        /* Tables */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.9rem;
        }

        .data-table th,
        .data-table td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--line);
            vertical-align: middle;
        }

        .data-table th {
            background: var(--surface-2);
            color: var(--ink);
            font-weight: 600;
        }

        .table-thumb {
            width: 50px;
            height: 40px;
            object-fit: cover;
            border-radius: 6px;
        }

        .item-title {
            display: block;
            color: var(--ink);
            font-weight: 600;
        }

        .item-desc {
            color: var(--body);
            font-size: 0.8rem;
            display: block;
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Badges & Tags */
        .badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: var(--r-pill);
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-primary { background: rgba(33, 150, 243, 0.12); color: var(--primary-dark); }
        .badge-success { background: rgba(48, 164, 108, 0.12); color: var(--success); }
        .badge-danger { background: rgba(229, 72, 77, 0.12); color: var(--danger); }
        .badge-info { background: #E0F7FA; color: #00838F; }
        .badge-secondary { background: #ECEFF1; color: #546E7A; }

        .tag-pill {
            display: inline-block;
            background: var(--surface-2);
            border: 1px solid var(--line);
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
            margin-right: 4px;
        }

        /* Banner Upload Zone */
        .upload-zone {
            border: 2px dashed var(--primary);
            border-radius: var(--r-md);
            padding: 36px 20px;
            text-align: center;
            background: rgba(33, 150, 243, 0.03);
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 16px;
        }

        .upload-zone:hover, .upload-zone.dragover {
            background: rgba(33, 150, 243, 0.1);
        }

        .upload-zone svg {
            width: 44px;
            height: 44px;
            color: var(--primary);
            margin-bottom: 8px;
        }

        .banner-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
        }

        .banner-card {
            border: 1px solid var(--line);
            border-radius: var(--r-md);
            overflow: hidden;
            background: #fff;
            box-shadow: var(--shadow-sm);
        }

        .banner-img-wrap {
            position: relative;
            height: 130px;
        }

        .banner-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .banner-index {
            position: absolute;
            top: 8px;
            left: 8px;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.75rem;
        }

        .banner-status-badge {
            position: absolute;
            top: 8px;
            right: 8px;
        }

        .banner-details {
            padding: 16px;
        }

        .banner-details h4 {
            font-size: 0.95rem;
            color: var(--ink);
            margin-bottom: 4px;
        }

        .banner-sub {
            font-size: 0.8rem;
            color: var(--body);
            margin-bottom: 12px;
        }

        .banner-actions {
            display: flex;
            gap: 8px;
            justify-content: flex-end;
        }

        /* Recent Messages in Overview */
        .recent-msg-item {
            padding: 12px 16px;
            border-bottom: 1px solid var(--line);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .recent-msg-item.unread {
            background: rgba(33, 150, 243, 0.04);
        }

        /* Modals */
        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(12, 27, 51, 0.6);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            padding: 20px;
        }

        .modal.is-open {
            display: flex;
            animation: fadeIn 0.25s ease;
        }

        .modal-content {
            background: #fff;
            border-radius: var(--r-md);
            width: 100%;
            max-width: 600px;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .modal-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--line);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .modal-header h3 {
            font-size: 1.15rem;
            color: var(--ink);
        }

        .modal-body {
            padding: 24px;
        }

        .modal-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--line);
            display: flex;
            justify-content: flex-end;
            gap: 12px;
            background: var(--surface-2);
        }

        .close-modal {
            background: transparent;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--body);
        }

        /* Toast Notifications */
        #toastContainer {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 9999;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .toast {
            background: var(--ink);
            color: #fff;
            padding: 12px 20px;
            border-radius: var(--r-sm);
            font-size: 0.9rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        .toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        .toast-success { border-left: 4px solid var(--success); }
        .toast-info { border-left: 4px solid var(--primary); }
        .toast-danger { border-left: 4px solid var(--danger); }

        /* Responsive */
        @media (max-width: 768px) {
            #dashboardScreen { flex-direction: column; }
            .sidebar { width: 100%; height: auto; }
            .top-bar { padding: 0 16px; }
            .content-area { padding: 16px; }
        }
    </style>
</head>

<body>

    <!-- ═════════ 1. LOGIN SCREEN ═════════ -->
    <div id="loginScreen">
        <div class="login-card">
            <h2>Graphic<span>TECH</span> Admin</h2>
            <p>กรอกชื่อผู้ใช้และรหัสผ่านเพื่อเข้าสู่ระบบหลังบ้าน</p>

            <div style="background: rgba(33, 150, 243, 0.08); border: 1px dashed var(--primary); padding: 10px; border-radius: var(--r-sm); margin-bottom: 20px; font-size: 0.85rem; color: var(--primary-dark);">
                🔑 <strong>ข้อมูลเข้าใช้งานทดสอบ:</strong><br>
                ชื่อผู้ใช้: <code>admin</code> | รหัสผ่าน: <code>1234</code>
            </div>

            <div id="loginError" class="error-msg">ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!</div>

            <form id="loginForm">
                <div class="form-group">
                    <label>ชื่อผู้ใช้ (Username)</label>
                    <input type="text" id="username" value="admin" placeholder="ชื่อผู้ใช้ (เช่น admin)" required>
                </div>
                <div class="form-group">
                    <label>รหัสผ่าน (Password)</label>
                    <input type="password" id="password" value="1234" placeholder="รหัสผ่าน (เช่น 1234)" required>
                </div>
                <button type="submit" class="btn btn-primary btn-block">เข้าสู่ระบบหลังบ้าน</button>
            </form>
            <a href="index.html" style="display: inline-block; margin-top: 20px; font-size: 0.85rem; color: var(--primary); text-decoration: none;">
                &larr; กลับไปหน้าเว็บไซต์หลัก
            </a>
        </div>
    </div>

    <!-- ═════════ 2. DASHBOARD SCREEN ═════════ -->
    <div id="dashboardScreen">

        <!-- Sidebar Navigation -->
        <aside class="sidebar">
            <div class="sidebar__header">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" width="24" height="24">
                    <path d="M12 2l9 4.9v10.2L12 22l-9-4.9V6.9L12 2z"/>
                    <path d="M12 22V12M21 6.9L12 12 3 6.9"/>
                </svg>
                Graphic<span>TECH</span>
            </div>
            <ul class="sidebar__menu">
                <li>
                    <a href="#" data-tab="overview" class="active">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                        ภาพรวมระบบ (Overview)
                    </a>
                </li>
                <li>
                    <a href="#" data-tab="portfolio">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"/></svg>
                        จัดการผลงาน (Portfolio)
                    </a>
                </li>
                <li>
                    <a href="#" data-tab="banners">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg>
                        จัดการแบนเนอร์ (Banners)
                    </a>
                </li>
                <li>
                    <a href="#" data-tab="testimonials">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/></svg>
                        รีวิวลูกค้า (Testimonials)
                    </a>
                </li>
                <li>
                    <a href="#" data-tab="messages">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        ข้อความติดต่อ (Inbox)
                    </a>
                </li>
                <li>
                    <a href="#" data-tab="settings">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"/></svg>
                        ตั้งค่าระบบ (Settings)
                    </a>
                </li>
                <li style="margin-top: auto; border-top: 1px solid rgba(255,255,255,0.1);">
                    <a href="index.html" target="_blank">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 13v6a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
                        ดูหน้าเว็บไซต์จริง &nearr;
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Main Content Area -->
        <main class="main-content">
            <header class="top-bar">
                <h2 id="adminNameHeading">ยินดีต้อนรับ, แอดมิน</h2>
                <button id="logoutBtn" class="btn btn-outline btn-sm">ออกจากระบบ</button>
            </header>

            <div class="content-area">

                <!-- ════ TAB 1: OVERVIEW ════ -->
                <div class="tab-pane active" id="tab-overview">
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 19a2 2 0 01-2 2H4a2 2 0 01-2-2V5a2 2 0 012-2h5l2 3h9a2 2 0 012 2z"/></svg></div>
                            <div class="stat-info">
                                <h4 id="statTotalPortfolio">0</h4>
                                <p>ผลงานในพอร์ตโฟลิโอ</p>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon" style="background: rgba(48,164,108,0.1); color: var(--success);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/></svg></div>
                            <div class="stat-info">
                                <h4 id="statActiveBanners">0</h4>
                                <p>แบนเนอร์ที่เปิดใช้งาน</p>
                            </div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-icon" style="background: rgba(229,72,77,0.1); color: var(--danger);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
                            <div class="stat-info">
                                <h4><span id="statTotalMessages">0</span> <small style="font-size: 0.8rem; font-weight: normal; color: var(--danger);" id="statUnreadBadge"></small></h4>
                                <p>ข้อความติดต่อทั้งหมด</p>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header-flex">
                            <h3>ข้อความติดต่อล่าสุด (Recent Messages)</h3>
                        </div>
                        <div id="recentMessagesOverview">
                            <!-- Populated via admin.js -->
                        </div>
                    </div>
                </div>

                <!-- ════ TAB 2: PORTFOLIO ════ -->
                <div class="tab-pane" id="tab-portfolio">
                    <div class="card">
                        <div class="card-header-flex">
                            <h3>รายการผลงานทั้งหมด <span class="badge badge-info" id="portfolioCountBadge">0 รายการ</span></h3>
                            <button class="btn btn-primary" id="addPortfolioBtn">+ เพิ่มผลงานใหม่</button>
                        </div>

                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>รูปตัวอย่าง</th>
                                        <th>ชื่อผลงาน / รายละเอียด</th>
                                        <th>หมวดหมู่</th>
                                        <th>แท็ก</th>
                                        <th>ปี</th>
                                        <th class="text-right">การจัดการ</th>
                                    </tr>
                                </thead>
                                <tbody id="portfolioTableBody">
                                    <!-- Populated via admin.js -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ════ TAB 3: BANNERS ════ -->
                <div class="tab-pane" id="tab-banners">
                    <div class="card">
                        <h3>เพิ่มแบนเนอร์สไลด์ใหม่ (Add Home Slide)</h3>
                        <div class="upload-zone" id="bannerUploadZone">
                            <input type="file" id="bannerFileInput" accept="image/*" hidden>
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4M17 8l-5-5-5 5M12 3v12"/></svg>
                            <p>คลิกเพื่อเลือกไฟล์รูปภาพ หรือลากรูปมาวางที่นี่</p>
                            <small>รองรับไฟล์ JPG, PNG, WEBP (แนะนำขนาด 1920x800 px)</small>
                        </div>
                        <img id="bannerPreviewImg" src="" alt="Preview" style="width: 100%; max-height: 200px; object-fit: cover; border-radius: 8px; display: none; margin-bottom: 16px;">

                        <div class="form-row">
                            <div class="form-group">
                                <label>หัวข้อแบนเนอร์ (Title)</label>
                                <input type="text" id="bannerTitleInput" placeholder="เช่น สร้างแบรนด์ให้แข็งแกร่งด้วยดีไซน์">
                            </div>
                            <div class="form-group">
                                <label>ข้อความย่อย (Subtitle)</label>
                                <input type="text" id="bannerSubtitleInput" placeholder="เช่น Creative × Technology Studio">
                            </div>
                            <div class="form-group">
                                <label>ลิงก์ปลายทาง (URL Target)</label>
                                <input type="text" id="bannerLinkInput" placeholder="เช่น #contact หรือ #services" value="#contact">
                            </div>
                        </div>
                        <button id="saveBannerBtn" class="btn btn-primary btn-block" disabled>บันทึกรูปภาพขึ้นเว็บไซต์</button>
                    </div>

                    <div class="card">
                        <h3>แบนเนอร์สไลด์ที่กำลังใช้งาน (Active Slides)</h3>
                        <div class="banner-grid" id="activeBannersGrid">
                            <!-- Populated via admin.js -->
                        </div>
                    </div>
                </div>

                <!-- ════ TAB 4: TESTIMONIALS ════ -->
                <div class="tab-pane" id="tab-testimonials">
                    <div class="card">
                        <h3>เพิ่มรีวิวความประทับใจจากลูกค้า (Add Testimonial)</h3>
                        <form id="testimonialForm">
                            <div class="form-row">
                                <div class="form-group">
                                    <label>ชื่อลูกค้า / ผู้ให้สัมภาษณ์ *</label>
                                    <input type="text" id="testName" required placeholder="เช่น คุณสมชาย ใจดี">
                                </div>
                                <div class="form-group">
                                    <label>ตำแหน่ง (Position)</label>
                                    <input type="text" id="testPosition" placeholder="เช่น Marketing Director">
                                </div>
                                <div class="form-group">
                                    <label>ชื่อบริษัท / องค์กร (Company)</label>
                                    <input type="text" id="testCompany" placeholder="เช่น Mandarin Oriental">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>ความคิดเห็น / ความประทับใจ (Review Comment) *</label>
                                <textarea id="testComment" required placeholder="พิมพ์ความประทับใจของลูกค้าที่นี่..."></textarea>
                            </div>
                            <div class="form-group">
                                <label>ให้คะแนน (Rating)</label>
                                <select id="testRating">
                                    <option value="5">⭐⭐⭐⭐⭐ (5 ดาว)</option>
                                    <option value="4">⭐⭐⭐⭐ (4 ดาว)</option>
                                    <option value="3">⭐⭐⭐ (3 ดาว)</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">เพิ่มรีวิวลูกค้า</button>
                        </form>
                    </div>

                    <div class="card">
                        <h3>รายการรีวิวลูกค้าที่แสดงบนหน้าเว็บ (Testimonials List)</h3>
                        <div id="testimonialsListGrid">
                            <!-- Populated via admin.js -->
                        </div>
                    </div>
                </div>

                <!-- ════ TAB 5: MESSAGES ════ -->
                <div class="tab-pane" id="tab-messages">
                    <div class="card">
                        <div class="card-header-flex">
                            <h3>กล่องข้อความจากผู้ติดต่อ (Inbox) <span class="badge badge-danger" id="unreadMessagesCountBadge">0</span></h3>
                        </div>

                        <div class="table-responsive">
                            <table class="data-table">
                                <thead>
                                    <tr>
                                        <th>วันที่ส่ง</th>
                                        <th>ผู้ติดต่อ</th>
                                        <th>บริการที่สนใจ</th>
                                        <th>หัวข้อ</th>
                                        <th>สถานะ</th>
                                        <th class="text-right">จัดการ</th>
                                    </tr>
                                </thead>
                                <tbody id="messagesTableBody">
                                    <!-- Populated via admin.js -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- ════ TAB 6: SETTINGS ════ -->
                <div class="tab-pane" id="tab-settings">
                    <div class="card">
                        <h3>ตั้งค่ารหัสผ่านผู้ดูแลระบบ (Admin Account Settings)</h3>
                        <form id="settingsForm">
                            <div class="form-group">
                                <label>ชื่อผู้ใช้ใหม่ (Admin Username)</label>
                                <input type="text" id="settingUsername" required>
                            </div>
                            <div class="form-group">
                                <label>รหัสผ่านใหม่ (Admin Password)</label>
                                <input type="password" id="settingPassword" placeholder="กรอกรหัสผ่านใหม่ที่ต้องการตั้ง">
                            </div>
                            <button type="submit" class="btn btn-primary">บันทึกการตั้งค่า</button>
                        </form>
                    </div>

                    <div class="card" style="border-color: #FFCDD2;">
                        <h3 style="color: var(--danger);">รีเซ็ตระบบกลับเป็นค่าเริ่มต้น (Reset Seed Data)</h3>
                        <p style="margin-bottom: 16px; font-size: 0.9rem;">หากต้องการคืนค่าผลงาน แบนเนอร์ รีวิว และข้อความเริ่มต้นของระบบ สามารถกดปุ่มด้านล่างได้</p>
                        <button id="resetSeedBtn" class="btn btn-outline-danger">รีเซ็ตข้อมูลทั้งหมดกลับเป็นค่าเริ่มต้น</button>
                    </div>
                </div>

            </div>
        </main>
    </div>

    <!-- ═════════ MODALS ═════════ -->

    <!-- Add/Edit Portfolio Modal -->
    <div class="modal" id="portfolioModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 id="modalPortfolioTitle">เพิ่มผลงานใหม่</h3>
                <button class="close-modal">&times;</button>
            </div>
            <form id="portfolioForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label>ชื่อผลงาน (Title) *</label>
                        <input type="text" id="portTitle" required placeholder="เช่น Mandarin Oriental E-Commerce">
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>หมวดหมู่ (Category) *</label>
                            <select id="portCategory" required>
                                <option value="Web Development">Web Development</option>
                                <option value="Branding">Branding</option>
                                <option value="UI/UX Design">UI/UX Design</option>
                                <option value="ERP System">ERP System</option>
                                <option value="Graphic Design">Graphic Design</option>
                                <option value="Digital Marketing">Digital Marketing</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>ปีที่ทำผลงาน (Year)</label>
                            <input type="number" id="portYear" value="2024">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>แท็กเทคโนโลยี/ประเภท (ใส่เครื่องหมายจุลภาค , คั่น)</label>
                        <input type="text" id="portTags" placeholder="เช่น React, Node.js, E-Commerce">
                    </div>
                    <div class="form-group">
                        <label>รายละเอียดผลงาน (Description)</label>
                        <textarea id="portDescription" placeholder="อธิบายรายละเอียดสั้นๆ ของผลงาน..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>อัปโหลดรูปภาพผลงาน หรือใส่ URL รูปภาพ</label>
                        <input type="file" id="portImgFile" accept="image/*" style="margin-bottom: 8px;">
                        <input type="text" id="portImgUrl" placeholder="หรือวางลิงก์รูปภาพที่นี่ (http://...)">
                        <img id="portPreviewImg" src="" alt="Preview" style="max-height: 120px; border-radius: 6px; display: none; margin-top: 10px; object-fit: cover;">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline close-modal">ยกเลิก</button>
                    <button type="submit" class="btn btn-primary">บันทึกข้อมูลผลงาน</button>
                </div>
            </form>
        </div>
    </div>

    <!-- View Message Modal -->
    <div class="modal" id="messageModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>รายละเอียดข้อความจากผู้ติดต่อ</h3>
                <button class="close-modal">&times;</button>
            </div>
            <div class="modal-body">
                <div style="margin-bottom: 16px; padding-bottom: 12px; border-bottom: 1px solid var(--line);">
                    <h4 id="msgDetailSubject" style="color: var(--ink); font-size: 1.1rem; margin-bottom: 8px;"></h4>
                    <p style="font-size: 0.85rem; color: var(--body);">
                        จาก: <strong id="msgDetailName"></strong> | 
                        อีเมล: <span id="msgDetailEmail"></span> | 
                        โทร: <span id="msgDetailPhone"></span>
                    </p>
                    <p style="font-size: 0.85rem; color: var(--body); margin-top: 4px;">
                        บริการที่สนใจ: <span class="badge badge-primary" id="msgDetailService"></span> | 
                        วันที่ส่ง: <span id="msgDetailDate"></span>
                    </p>
                </div>
                <div>
                    <label style="font-weight: 600; color: var(--ink); display: block; margin-bottom: 6px;">ข้อความ:</label>
                    <div id="msgDetailBody" style="background: var(--surface-2); padding: 16px; border-radius: 8px; font-size: 0.95rem; white-space: pre-wrap; color: var(--ink);"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary close-modal">ปิดหน้าต่าง</button>
            </div>
        </div>
    </div>

    <!-- Toast Notifications Container -->
    <div id="toastContainer"></div>

    <!-- SCRIPTS -->
    <script src="js/api-store.js"></script>
    <script src="js/admin.js"></script>
</body>

</html>