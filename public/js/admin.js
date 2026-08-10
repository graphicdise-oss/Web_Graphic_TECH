/* ============================================================
   ADMIN.JS — Graphic TECH Admin Dashboard Application Logic
   Handles: Tab Switching, Portfolio CRUD, Banners Manager,
            Testimonials Manager, Inbox Manager, Posters Manager,
            Account Settings & Toasts.

   Data starts from window.__ADMIN_DATA__ (server-rendered by
   admin/dashboard.blade.php) and every mutation is persisted via
   fetch() to the real Laravel endpoints under /admin/*, protected
   by the session's CSRF token (routes/web.php).
   ============================================================ */

document.addEventListener("DOMContentLoaded", function () {
  "use strict";

  const DATA = window.__ADMIN_DATA__ || {
    stats: {}, services: [], portfolios: [], banners: [],
    testimonials: [], messages: [], posters: [],
  };

  const csrfToken = (document.querySelector('meta[name="csrf-token"]') || {}).content || "";

  function api(url, method, body) {
    const opts = {
      method: method,
      headers: {
        "X-CSRF-TOKEN": csrfToken,
        "Accept": "application/json",
      },
    };
    if (body instanceof FormData) {
      opts.body = body;
    } else if (body) {
      opts.headers["Content-Type"] = "application/json";
      opts.body = JSON.stringify(body);
    }
    return fetch(url, opts).then(function (res) {
      if (!res.ok) return res.json().then(function (err) { return Promise.reject(err); });
      return res.status === 204 ? {} : res.json();
    });
  }

  /* Elements */
  const logoutBtn = document.getElementById("logoutBtn");
  const sidebarLinks = document.querySelectorAll(".sidebar__menu a[data-tab]");
  const tabPanes = document.querySelectorAll(".tab-pane");
  const portfolioModal = document.getElementById("portfolioModal");
  const portfolioForm = document.getElementById("portfolioForm");
  const messageModal = document.getElementById("messageModal");

  /* --- LOGOUT (server-side auth already gates this whole page) --- */
  if (logoutBtn) {
    logoutBtn.addEventListener("click", function (e) {
      if (!confirm("คุณต้องการออกจากระบบใช่หรือไม่?")) e.preventDefault();
    });
  }

  /* --- TAB SWITCHER --- */
  const VALID_TABS = ["overview", "portfolio", "banners", "testimonials", "messages", "posters", "settings"];

  function switchTab(tabId) {
    if (!VALID_TABS.includes(tabId)) tabId = "overview";
    sidebarLinks.forEach(l => l.classList.toggle("active", l.getAttribute("data-tab") === tabId));
    tabPanes.forEach(pane => pane.classList.toggle("active", pane.id === `tab-${tabId}`));
  }

  sidebarLinks.forEach(link => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      switchTab(this.getAttribute("data-tab"));
    });
  });

  function getHashTab() {
    const match = window.location.hash.match(/^#tab=(.+)$/);
    return match ? match[1] : null;
  }

  function renderDashboard() {
    renderOverviewTab();
    renderPortfolioTab();
    renderBannersTab();
    renderTestimonialsTab();
    renderMessagesTab();
    renderPostersTab();
    renderSettingsTab();
  }

  /* --- OVERVIEW TAB --- */
  function renderOverviewTab() {
    const stats = DATA.stats;
    const set = (id, val) => { const el = document.getElementById(id); if (el) el.textContent = val; };

    set("statTotalPortfolio", stats.totalPortfolio ?? DATA.portfolios.length);
    set("statActiveBanners", `${stats.activeBanners ?? 0} / ${stats.totalBanners ?? DATA.banners.length}`);
    set("statTotalMessages", stats.totalMessages ?? DATA.messages.length);
    const unreadBadge = document.getElementById("statUnreadBadge");
    const unreadCount = DATA.messages.filter(m => !m.read).length;
    if (unreadBadge) {
      unreadBadge.textContent = unreadCount;
      unreadBadge.style.display = unreadCount > 0 ? "inline-block" : "none";
    }

    const recentBox = document.getElementById("recentMessagesOverview");
    if (recentBox) {
      const recent = DATA.messages.slice(0, 4);
      recentBox.innerHTML = recent.length === 0
        ? '<p class="text-muted" style="padding: 16px;">ยังไม่มีข้อความส่งเข้ามา</p>'
        : recent.map(msg => `
          <div class="recent-msg-item ${msg.read ? '' : 'unread'}">
            <div class="msg-info">
              <strong>${escapeHtml(msg.name)}</strong>
              <span class="badge ${msg.read ? 'badge-secondary' : 'badge-danger'}">${msg.read ? 'อ่านแล้ว' : 'ใหม่'}</span>
              <p class="msg-subject" style="font-size: 0.85rem; color: var(--ink); margin-top: 2px;">${escapeHtml(msg.subject)}</p>
            </div>
            <small class="msg-time" style="color: var(--body); font-size: 0.75rem;">${formatDate(msg.created_at)}</small>
          </div>
        `).join("");
    }
  }

  /* --- PORTFOLIO CRUD --- */
  let currentEditingPortfolioId = null;

  function renderPortfolioTab() {
    const items = DATA.portfolios;
    const tbody = document.getElementById("portfolioTableBody");
    const countBadge = document.getElementById("portfolioCountBadge");
    if (countBadge) countBadge.textContent = `${items.length} รายการ`;
    if (!tbody) return;

    if (items.length === 0) {
      tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4">ยังไม่มีผลงานในระบบ กดปุ่ม "เพิ่มผลงานใหม่" เพื่อเริ่มต้น</td></tr>`;
      return;
    }

    tbody.innerHTML = items.map(item => `
      <tr>
        <td style="width: 70px;"><img src="${item.image}" alt="${escapeHtml(item.title)}" class="table-thumb"></td>
        <td>
          <strong class="item-title">${escapeHtml(item.title)}</strong>
          <small class="item-desc">${escapeHtml(item.description || '-')}</small>
        </td>
        <td><span class="badge badge-info">${escapeHtml(item.category)}</span></td>
        <td>${(item.tags || []).map(t => `<span class="tag-pill">${escapeHtml(t)}</span>`).join(" ")}</td>
        <td>${item.year || '-'}</td>
        <td class="text-right">
          <button class="btn-icon btn-edit" onclick="openEditPortfolioModal(${item.id})" title="แก้ไข">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
          </button>
          <button class="btn-icon btn-delete" onclick="deletePortfolioItem(${item.id})" title="ลบ">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/><line x1="10" y1="11" x2="10" y2="17"/><line x1="14" y1="11" x2="14" y2="17"/></svg>
          </button>
        </td>
      </tr>
    `).join("");
  }

  const addPortfolioBtn = document.getElementById("addPortfolioBtn");
  if (addPortfolioBtn) {
    addPortfolioBtn.addEventListener("click", function () {
      currentEditingPortfolioId = null;
      document.getElementById("modalPortfolioTitle").textContent = "เพิ่มผลงานใหม่";
      portfolioForm.reset();
      document.getElementById("portPreviewImg").style.display = "none";
      portfolioModal.classList.add("is-open");
    });
  }

  const portImgFile = document.getElementById("portImgFile");
  const portImgUrl = document.getElementById("portImgUrl");
  const portPreviewImg = document.getElementById("portPreviewImg");

  if (portImgFile) {
    portImgFile.addEventListener("change", function (e) {
      if (e.target.files && e.target.files[0]) {
        const reader = new FileReader();
        reader.onload = function (evt) {
          portPreviewImg.src = evt.target.result;
          portPreviewImg.style.display = "block";
          portImgUrl.value = evt.target.result;
        };
        reader.readAsDataURL(e.target.files[0]);
      }
    });
  }

  if (portImgUrl) {
    portImgUrl.addEventListener("input", function () {
      if (this.value.trim()) {
        portPreviewImg.src = this.value.trim();
        portPreviewImg.style.display = "block";
      } else {
        portPreviewImg.style.display = "none";
      }
    });
  }

  if (portfolioForm) {
    portfolioForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const payload = {
        title: document.getElementById("portTitle").value.trim(),
        category: document.getElementById("portCategory").value,
        tags: document.getElementById("portTags").value,
        year: document.getElementById("portYear").value,
        description: document.getElementById("portDescription").value,
        image: document.getElementById("portImgUrl").value.trim(),
      };

      const submitBtn = portfolioForm.querySelector('button[type="submit"]');
      if (submitBtn) submitBtn.disabled = true;

      const request = currentEditingPortfolioId
        ? api(`/admin/portfolio/${currentEditingPortfolioId}`, "PUT", payload)
        : api("/admin/portfolio", "POST", payload);

      request.then(function (res) {
        if (currentEditingPortfolioId) {
          const idx = DATA.portfolios.findIndex(p => p.id === currentEditingPortfolioId);
          if (idx > -1) DATA.portfolios[idx] = res.data;
          showToast("แก้ไขผลงานเรียบร้อยแล้ว!", "success");
        } else {
          DATA.portfolios.unshift(res.data);
          showToast("เพิ่มผลงานใหม่เรียบร้อยแล้ว!", "success");
        }
        closePortfolioModal();
        renderDashboard();
      }).catch(function () {
        showToast("เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง", "error");
      }).finally(function () {
        if (submitBtn) submitBtn.disabled = false;
      });
    });
  }

  window.openEditPortfolioModal = function (id) {
    const item = DATA.portfolios.find(i => i.id === id);
    if (!item) return;

    currentEditingPortfolioId = id;
    document.getElementById("modalPortfolioTitle").textContent = "แก้ไขผลงาน";
    document.getElementById("portTitle").value = item.title || "";
    document.getElementById("portCategory").value = item.category || "Web Development";
    document.getElementById("portTags").value = Array.isArray(item.tags) ? item.tags.join(", ") : (item.tags || "");
    document.getElementById("portYear").value = item.year || new Date().getFullYear();
    document.getElementById("portDescription").value = item.description || "";
    document.getElementById("portImgUrl").value = item.image || "";

    if (item.image) {
      portPreviewImg.src = item.image;
      portPreviewImg.style.display = "block";
    } else {
      portPreviewImg.style.display = "none";
    }
    portfolioModal.classList.add("is-open");
  };

  window.deletePortfolioItem = function (id) {
    if (!confirm("คุณแน่ใจหรือไม่ว่าต้องการลบผลงานนี้ออกจากระบบ?")) return;
    api(`/admin/portfolio/${id}`, "DELETE").then(function () {
      DATA.portfolios = DATA.portfolios.filter(p => p.id !== id);
      showToast("ลบผลงานเรียบร้อยแล้ว", "info");
      renderDashboard();
    }).catch(function () {
      showToast("ลบผลงานไม่สำเร็จ", "error");
    });
  };

  function closePortfolioModal() {
    if (portfolioModal) portfolioModal.classList.remove("is-open");
    currentEditingPortfolioId = null;
  }

  document.querySelectorAll(".close-modal").forEach(btn => {
    btn.addEventListener("click", function () {
      closePortfolioModal();
      if (messageModal) messageModal.classList.remove("is-open");
    });
  });

  /* --- BANNERS MANAGER --- */
  function renderBannersTab() {
    const banners = DATA.banners;
    const container = document.getElementById("activeBannersGrid");
    if (!container) return;

    if (banners.length === 0) {
      container.innerHTML = `<p class="text-muted text-center py-4">ยังไม่มีแบนเนอร์ในระบบ สามารถอัปโหลดได้จากโซนด้านบน</p>`;
      return;
    }

    container.innerHTML = banners.map((b, index) => `
      <div class="banner-card ${b.active ? '' : 'inactive'}">
        <div class="banner-img-wrap">
          <img src="${b.image}" alt="${escapeHtml(b.title)}">
          <span class="banner-index">#${index + 1}</span>
          <span class="badge ${b.active ? 'badge-success' : 'badge-secondary'} banner-status-badge">
            ${b.active ? 'กำลังใช้งาน' : 'ปิดใช้งาน'}
          </span>
        </div>
        <div class="banner-details">
          <h4>${escapeHtml(b.title)}</h4>
          <p class="banner-sub">${escapeHtml(b.subtitle || '-')}</p>
          <div class="banner-actions">
            <button class="btn btn-sm ${b.active ? 'btn-outline-warning' : 'btn-outline-success'}" onclick="toggleBanner(${b.id})">
              ${b.active ? 'ปิดใช้งาน' : 'เปิดใช้งาน'}
            </button>
            <button class="btn btn-sm btn-outline-danger" onclick="deleteBanner(${b.id})">ลบแบนเนอร์</button>
          </div>
        </div>
      </div>
    `).join("");
  }

  const bannerUploadZone = document.getElementById("bannerUploadZone");
  const bannerFileInput = document.getElementById("bannerFileInput");
  const bannerPreviewImg = document.getElementById("bannerPreviewImg");
  const saveBannerBtn = document.getElementById("saveBannerBtn");
  let currentBannerBase64 = null;

  if (bannerUploadZone && bannerFileInput) {
    bannerUploadZone.addEventListener("click", () => bannerFileInput.click());
    bannerUploadZone.addEventListener("dragover", e => { e.preventDefault(); bannerUploadZone.classList.add("dragover"); });
    bannerUploadZone.addEventListener("dragleave", () => bannerUploadZone.classList.remove("dragover"));
    bannerUploadZone.addEventListener("drop", e => {
      e.preventDefault();
      bannerUploadZone.classList.remove("dragover");
      if (e.dataTransfer.files.length) processBannerFile(e.dataTransfer.files[0]);
    });
    bannerFileInput.addEventListener("change", e => {
      if (e.target.files.length) processBannerFile(e.target.files[0]);
    });
  }

  function processBannerFile(file) {
    if (!file.type.startsWith("image/")) {
      alert("กรุณาเลือกไฟล์รูปภาพเท่านั้นครับ");
      return;
    }
    const reader = new FileReader();
    reader.onload = function (e) {
      currentBannerBase64 = e.target.result;
      bannerPreviewImg.src = currentBannerBase64;
      bannerPreviewImg.style.display = "block";
      bannerUploadZone.style.display = "none";
      if (saveBannerBtn) saveBannerBtn.disabled = false;
    };
    reader.readAsDataURL(file);
  }

  if (saveBannerBtn) {
    saveBannerBtn.addEventListener("click", function () {
      const payload = {
        title: document.getElementById("bannerTitleInput").value.trim() || "แบนเนอร์สไลด์ Graphic TECH",
        subtitle: document.getElementById("bannerSubtitleInput").value.trim(),
        link: document.getElementById("bannerLinkInput").value.trim() || "#contact",
        image: currentBannerBase64 || "",
      };

      saveBannerBtn.disabled = true;
      api("/admin/banners", "POST", payload).then(function (res) {
        DATA.banners.unshift(res.data);
        showToast("เพิ่มแบนเนอร์เรียบร้อยแล้ว!", "success");

        currentBannerBase64 = null;
        bannerPreviewImg.style.display = "none";
        bannerUploadZone.style.display = "block";
        document.getElementById("bannerTitleInput").value = "";
        document.getElementById("bannerSubtitleInput").value = "";
        document.getElementById("bannerLinkInput").value = "";
        renderDashboard();
      }).catch(function () {
        showToast("เพิ่มแบนเนอร์ไม่สำเร็จ", "error");
      }).finally(function () {
        saveBannerBtn.disabled = false;
      });
    });
  }

  window.toggleBanner = function (id) {
    api(`/admin/banners/${id}/toggle`, "PATCH").then(function (res) {
      const idx = DATA.banners.findIndex(b => b.id === id);
      if (idx > -1) DATA.banners[idx] = res.data;
      showToast("อัปเดตสถานะแบนเนอร์แล้ว", "info");
      renderDashboard();
    }).catch(function () {
      showToast("อัปเดตสถานะไม่สำเร็จ", "error");
    });
  };

  window.deleteBanner = function (id) {
    if (!confirm("ต้องการลบแบนเนอร์นี้ใช่หรือไม่?")) return;
    api(`/admin/banners/${id}`, "DELETE").then(function () {
      DATA.banners = DATA.banners.filter(b => b.id !== id);
      showToast("ลบแบนเนอร์เรียบร้อยแล้ว", "info");
      renderDashboard();
    }).catch(function () {
      showToast("ลบแบนเนอร์ไม่สำเร็จ", "error");
    });
  };

  /* --- TESTIMONIALS MANAGER --- */
  function renderTestimonialsTab() {
    const list = DATA.testimonials;
    const container = document.getElementById("testimonialsListGrid");
    if (!container) return;

    if (list.length === 0) {
      container.innerHTML = `<p class="text-muted text-center py-4">ยังไม่มีรีวิวในระบบ</p>`;
      return;
    }

    container.innerHTML = list.map(t => `
      <div class="card" style="margin-bottom: 16px;">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
          <div>
            <strong>${escapeHtml(t.name)}</strong> <small style="color: var(--body);">(${escapeHtml(t.position || '')}${t.company ? ', ' + escapeHtml(t.company) : ''})</small>
            <div style="color: #F59E0B; margin: 4px 0;">${'★'.repeat(t.rating || 5)}</div>
            <p style="font-size: 0.9rem; color: var(--ink); margin-top: 6px;">"${escapeHtml(t.comment)}"</p>
          </div>
          <button class="btn-icon btn-delete" onclick="deleteTestimonialItem(${t.id})" title="ลบ">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/></svg>
          </button>
        </div>
      </div>
    `).join("");
  }

  const testimonialForm = document.getElementById("testimonialForm");
  if (testimonialForm) {
    testimonialForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const payload = {
        name: document.getElementById("testName").value.trim(),
        position: document.getElementById("testPosition").value.trim(),
        company: document.getElementById("testCompany").value.trim(),
        comment: document.getElementById("testComment").value.trim(),
        rating: document.getElementById("testRating").value,
      };
      api("/admin/testimonials", "POST", payload).then(function (res) {
        DATA.testimonials.unshift(res.data);
        showToast("เพิ่มรีวิวลูกค้าเรียบร้อยแล้ว!", "success");
        testimonialForm.reset();
        renderDashboard();
      }).catch(function () {
        showToast("เพิ่มรีวิวไม่สำเร็จ", "error");
      });
    });
  }

  window.deleteTestimonialItem = function (id) {
    if (!confirm("ต้องการลบรีวิวนี้ใช่หรือไม่?")) return;
    api(`/admin/testimonials/${id}`, "DELETE").then(function () {
      DATA.testimonials = DATA.testimonials.filter(t => t.id !== id);
      showToast("ลบรีวิวเรียบร้อยแล้ว", "info");
      renderDashboard();
    }).catch(function () {
      showToast("ลบรีวิวไม่สำเร็จ", "error");
    });
  };

  /* --- MESSAGES INBOX MANAGER --- */
  function renderMessagesTab() {
    const messages = DATA.messages;
    const tbody = document.getElementById("messagesTableBody");
    const countBadge = document.getElementById("unreadMessagesCountBadge");
    const unreadCount = messages.filter(m => !m.read).length;
    if (countBadge) countBadge.textContent = unreadCount > 0 ? `${unreadCount} ใหม่` : `${messages.length} ทั้งหมด`;
    if (!tbody) return;

    if (messages.length === 0) {
      tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-muted">ยังไม่มีข้อความส่งเข้ามาในระบบ</td></tr>`;
      return;
    }

    tbody.innerHTML = messages.map(msg => `
      <tr class="${msg.read ? 'read-row' : 'unread-row'}">
        <td><span class="status-dot ${msg.read ? 'dot-read' : 'dot-unread'}"></span>${formatDate(msg.created_at)}</td>
        <td>
          <strong>${escapeHtml(msg.name)}</strong>
          <small class="text-muted d-block">${escapeHtml(msg.email)} | ${escapeHtml(msg.phone)}</small>
        </td>
        <td><span class="badge badge-primary">${escapeHtml(msg.service)}</span></td>
        <td><strong>${escapeHtml(msg.subject)}</strong></td>
        <td><span class="badge ${msg.read ? 'badge-secondary' : 'badge-danger'}">${msg.read ? 'อ่านแล้ว' : 'ข้อความใหม่'}</span></td>
        <td class="text-right">
          <button class="btn btn-sm btn-outline" onclick="openViewMessageModal(${msg.id})">อ่านข้อความ</button>
          <button class="btn-icon btn-delete" onclick="deleteMessageItem(${msg.id})" title="ลบ">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/></svg>
          </button>
        </td>
      </tr>
    `).join("");
  }

  window.openViewMessageModal = function (id) {
    const msg = DATA.messages.find(m => m.id === id);
    if (!msg) return;

    document.getElementById("msgDetailName").textContent = msg.name;
    document.getElementById("msgDetailEmail").textContent = msg.email;
    document.getElementById("msgDetailPhone").textContent = msg.phone;
    document.getElementById("msgDetailService").textContent = msg.service;
    document.getElementById("msgDetailSubject").textContent = msg.subject;
    document.getElementById("msgDetailDate").textContent = formatDate(msg.created_at);
    document.getElementById("msgDetailBody").textContent = msg.message;
    if (messageModal) messageModal.classList.add("is-open");

    if (!msg.read) {
      api(`/admin/messages/${id}/read`, "PATCH").then(function (res) {
        msg.read = true;
        renderDashboard();
      }).catch(function () { /* non-critical, ignore */ });
    }
  };

  window.deleteMessageItem = function (id) {
    if (!confirm("ต้องการลบข้อความนี้ใช่หรือไม่?")) return;
    api(`/admin/messages/${id}`, "DELETE").then(function () {
      DATA.messages = DATA.messages.filter(m => m.id !== id);
      showToast("ลบข้อความเรียบร้อยแล้ว", "info");
      renderDashboard();
    }).catch(function () {
      showToast("ลบข้อความไม่สำเร็จ", "error");
    });
  };

  /* --- POSTERS MANAGER (promotional images scoped to a service page) --- */
  function renderPostersTab() {
    const posters = DATA.posters;
    const grid = document.getElementById("postersGrid");
    const countBadge = document.getElementById("posterCountBadge");
    if (countBadge) countBadge.textContent = `${posters.length} รายการ`;
    if (!grid) return;

    if (posters.length === 0) {
      grid.innerHTML = `<p class="text-muted text-center py-4">ยังไม่มีโปสเตอร์ในระบบ</p>`;
      return;
    }

    grid.innerHTML = posters.map(p => `
      <div class="banner-card ${p.active ? '' : 'inactive'}">
        <div class="banner-img-wrap">
          <img src="${p.image}" alt="${escapeHtml(p.title || '')}">
          <span class="badge ${p.active ? 'badge-success' : 'badge-secondary'} banner-status-badge">
            ${p.active ? 'กำลังใช้งาน' : 'ปิดใช้งาน'}
          </span>
        </div>
        <div class="banner-details">
          <h4>${escapeHtml(p.title || 'ไม่มีชื่อ')}</h4>
          <p class="banner-sub">${p.service ? escapeHtml(p.service.name) : 'แสดงทุกหน้า'}</p>
          <div class="banner-actions">
            <button class="btn btn-sm ${p.active ? 'btn-outline-warning' : 'btn-outline-success'}" onclick="togglePoster(${p.id})">
              ${p.active ? 'ปิดใช้งาน' : 'เปิดใช้งาน'}
            </button>
            <button class="btn btn-sm btn-outline-danger" onclick="deletePoster(${p.id})">ลบ</button>
          </div>
        </div>
      </div>
    `).join("");
  }

  const posterForm = document.getElementById("posterForm");
  const posterImgFile = document.getElementById("posterImgFile");
  const posterImgUrl = document.getElementById("posterImgUrl");
  const posterPreviewImg = document.getElementById("posterPreviewImg");

  if (posterImgFile) {
    posterImgFile.addEventListener("change", function (e) {
      if (e.target.files && e.target.files[0]) {
        const reader = new FileReader();
        reader.onload = function (evt) {
          posterPreviewImg.src = evt.target.result;
          posterPreviewImg.style.display = "block";
          posterImgUrl.value = evt.target.result;
        };
        reader.readAsDataURL(e.target.files[0]);
      }
    });
  }

  if (posterImgUrl) {
    posterImgUrl.addEventListener("input", function () {
      if (this.value.trim()) {
        posterPreviewImg.src = this.value.trim();
        posterPreviewImg.style.display = "block";
      } else {
        posterPreviewImg.style.display = "none";
      }
    });
  }

  if (posterForm) {
    posterForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const image = document.getElementById("posterImgUrl").value.trim();
      if (!image) {
        showToast("กรุณาอัปโหลดรูปภาพหรือใส่ลิงก์รูปภาพ", "error");
        return;
      }
      const payload = {
        title: document.getElementById("posterTitle").value.trim(),
        service_id: document.getElementById("posterService").value || null,
        link: document.getElementById("posterLink").value.trim(),
        image: image,
      };

      api("/admin/posters", "POST", payload).then(function (res) {
        DATA.posters.unshift(res.data);
        showToast("เพิ่มโปสเตอร์เรียบร้อยแล้ว!", "success");
        posterForm.reset();
        posterPreviewImg.style.display = "none";
        renderDashboard();
      }).catch(function () {
        showToast("เพิ่มโปสเตอร์ไม่สำเร็จ", "error");
      });
    });
  }

  window.togglePoster = function (id) {
    api(`/admin/posters/${id}/toggle`, "PATCH").then(function (res) {
      const idx = DATA.posters.findIndex(p => p.id === id);
      if (idx > -1) DATA.posters[idx] = res.data;
      showToast("อัปเดตสถานะโปสเตอร์แล้ว", "info");
      renderDashboard();
    }).catch(function () {
      showToast("อัปเดตสถานะไม่สำเร็จ", "error");
    });
  };

  window.deletePoster = function (id) {
    if (!confirm("ต้องการลบโปสเตอร์นี้ใช่หรือไม่?")) return;
    api(`/admin/posters/${id}`, "DELETE").then(function () {
      DATA.posters = DATA.posters.filter(p => p.id !== id);
      showToast("ลบโปสเตอร์เรียบร้อยแล้ว", "info");
      renderDashboard();
    }).catch(function () {
      showToast("ลบโปสเตอร์ไม่สำเร็จ", "error");
    });
  };

  /* --- SETTINGS TAB --- */
  function renderSettingsTab() {
    /* Fields are pre-filled server-side by the Blade view; nothing to sync client-side. */
  }

  const settingsForm = document.getElementById("settingsForm");
  if (settingsForm) {
    settingsForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const payload = {
        name: document.getElementById("settingUsername").value.trim(),
        password: document.getElementById("settingPassword").value.trim(),
      };
      api("/admin/settings", "POST", payload).then(function () {
        showToast("บันทึกการตั้งค่าเรียบร้อยแล้ว!", "success");
        document.getElementById("settingPassword").value = "";
        const heading = document.getElementById("adminNameHeading");
        if (heading) heading.textContent = `ยินดีต้อนรับ, ${payload.name}`;
      }).catch(function () {
        showToast("บันทึกการตั้งค่าไม่สำเร็จ", "error");
      });
    });
  }

  /* UTILITY FUNCTIONS */
  function showToast(message, type) {
    let container = document.getElementById("toastContainer");
    if (!container) {
      container = document.createElement("div");
      container.id = "toastContainer";
      document.body.appendChild(container);
    }
    const toast = document.createElement("div");
    toast.className = `toast toast-${type || 'success'}`;
    toast.textContent = message;
    container.appendChild(toast);

    setTimeout(() => toast.classList.add("show"), 10);
    setTimeout(() => {
      toast.classList.remove("show");
      setTimeout(() => toast.remove(), 300);
    }, 3000);
  }

  function formatDate(isoStr) {
    if (!isoStr) return "-";
    const date = new Date(isoStr);
    return date.toLocaleDateString("th-TH", {
      day: "numeric", month: "short", year: "numeric", hour: "2-digit", minute: "2-digit",
    });
  }

  function escapeHtml(str) {
    if (!str) return "";
    return String(str)
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
  }

  renderDashboard();
  const hashTab = getHashTab();
  if (hashTab) switchTab(hashTab);
});
