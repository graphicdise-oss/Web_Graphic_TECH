/* ============================================================
   ADMIN.JS — Graphic TECH Admin Dashboard Application Logic
   Handles: Tab Switching, Auth Guard, Portfolio CRUD, Banners Manager,
            Testimonials Manager, Inbox Manager, System Settings & Toasts.
   ============================================================ */

document.addEventListener("DOMContentLoaded", function () {
  "use strict";

  /* Elements */
  const loginScreen = document.getElementById("loginScreen");
  const dashboardScreen = document.getElementById("dashboardScreen");
  const loginForm = document.getElementById("loginForm");
  const loginError = document.getElementById("loginError");
  const logoutBtn = document.getElementById("logoutBtn");
  const adminNameHeading = document.getElementById("adminNameHeading");

  /* Tab Elements */
  const sidebarLinks = document.querySelectorAll(".sidebar__menu a[data-tab]");
  const tabPanes = document.querySelectorAll(".tab-pane");

  /* Modals */
  const portfolioModal = document.getElementById("portfolioModal");
  const portfolioForm = document.getElementById("portfolioForm");
  const messageModal = document.getElementById("messageModal");

  /* --- 1. AUTHENTICATION & GUARD --- */
  function checkAuth() {
    if (window.GTStore && window.GTStore.isLoggedIn()) {
      loginScreen.style.display = "none";
      dashboardScreen.style.display = "flex";
      const user = window.GTStore.getAdminUser();
      if (adminNameHeading && user) {
        adminNameHeading.textContent = `ยินดีต้อนรับ, แอดมิน ${user}`;
      }
      renderDashboard();
    } else {
      loginScreen.style.display = "flex";
      dashboardScreen.style.display = "none";
    }
  }

  if (loginForm) {
    loginForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const user = document.getElementById("username").value.trim();
      const pass = document.getElementById("password").value.trim();

      const res = window.GTStore.login(user, pass);
      if (res.success) {
        if (loginError) loginError.style.display = "none";
        showToast("เข้าสู่ระบบสำเร็จ!", "success");
        checkAuth();
      } else {
        if (loginError) {
          loginError.textContent = res.message;
          loginError.style.display = "block";
        }
      }
    });
  }

  if (logoutBtn) {
    logoutBtn.addEventListener("click", function () {
      if (confirm("คุณต้องการออกจากระบบใช่หรือไม่?")) {
        window.GTStore.logout();
        showToast("ออกจากระบบเรียบร้อยแล้ว", "info");
        checkAuth();
      }
    });
  }

  /* --- 2. TAB SWITCHER --- */
  sidebarLinks.forEach(link => {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      const targetTab = this.getAttribute("data-tab");

      sidebarLinks.forEach(l => l.classList.remove("active"));
      this.classList.add("active");

      tabPanes.forEach(pane => {
        pane.classList.toggle("active", pane.id === `tab-${targetTab}`);
      });

      if (targetTab === "overview") renderOverviewTab();
      if (targetTab === "portfolio") renderPortfolioTab();
      if (targetTab === "banners") renderBannersTab();
      if (targetTab === "testimonials") renderTestimonialsTab();
      if (targetTab === "messages") renderMessagesTab();
      if (targetTab === "settings") renderSettingsTab();
    });
  });

  function renderDashboard() {
    renderOverviewTab();
    renderPortfolioTab();
    renderBannersTab();
    renderTestimonialsTab();
    renderMessagesTab();
    renderSettingsTab();
  }

  /* --- 3. OVERVIEW TAB --- */
  function renderOverviewTab() {
    const stats = window.GTStore.getStats();

    document.getElementById("statTotalPortfolio").textContent = stats.totalPortfolio;
    document.getElementById("statActiveBanners").textContent = `${stats.activeBanners} / ${stats.totalBanners}`;
    document.getElementById("statTotalMessages").textContent = stats.totalMessages;
    document.getElementById("statUnreadBadge").textContent = stats.unreadMessages;
    document.getElementById("statUnreadBadge").style.display = stats.unreadMessages > 0 ? "inline-block" : "none";

    const recentMessages = window.GTStore.getMessages().slice(0, 4);
    const recentBox = document.getElementById("recentMessagesOverview");
    if (recentBox) {
      if (recentMessages.length === 0) {
        recentBox.innerHTML = '<p class="text-muted" style="padding: 16px;">ยังไม่มีข้อความส่งเข้ามา</p>';
      } else {
        recentBox.innerHTML = recentMessages.map(msg => `
          <div class="recent-msg-item ${msg.read ? '' : 'unread'}">
            <div class="msg-info">
              <strong>${escapeHtml(msg.name)}</strong>
              <span class="badge ${msg.read ? 'badge-secondary' : 'badge-danger'}">${msg.read ? 'อ่านแล้ว' : 'ใหม่'}</span>
              <p class="msg-subject" style="font-size: 0.85rem; color: var(--ink); margin-top: 2px;">${escapeHtml(msg.subject)}</p>
            </div>
            <small class="msg-time" style="color: var(--body); font-size: 0.75rem;">${formatDate(msg.createdAt)}</small>
          </div>
        `).join("");
      }
    }
  }

  /* --- 4. PORTFOLIO CRUD MANAGER --- */
  let currentEditingPortfolioId = null;

  function renderPortfolioTab() {
    const items = window.GTStore.getPortfolio();
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
        <td style="width: 70px;">
          <img src="${item.image}" alt="${escapeHtml(item.title)}" class="table-thumb" onerror="this.src='${window.GTStore.makePlaceholderImage(item.title, item.category)}'">
        </td>
        <td>
          <strong class="item-title">${escapeHtml(item.title)}</strong>
          <small class="item-desc">${escapeHtml(item.description || '-')}</small>
        </td>
        <td><span class="badge badge-info">${escapeHtml(item.category)}</span></td>
        <td>${(item.tags || []).map(t => `<span class="tag-pill">${escapeHtml(t)}</span>`).join(" ")}</td>
        <td>${item.year || '-'}</td>
        <td class="text-right">
          <button class="btn-icon btn-edit" onclick="openEditPortfolioModal('${item.id}')" title="แก้ไข">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
          </button>
          <button class="btn-icon btn-delete" onclick="deletePortfolioItem('${item.id}')" title="ลบ">
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
        const file = e.target.files[0];
        const reader = new FileReader();
        reader.onload = function (evt) {
          portPreviewImg.src = evt.target.result;
          portPreviewImg.style.display = "block";
          portImgUrl.value = evt.target.result;
        };
        reader.readAsDataURL(file);
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
      const title = document.getElementById("portTitle").value.trim();
      const category = document.getElementById("portCategory").value;
      const tags = document.getElementById("portTags").value;
      const year = document.getElementById("portYear").value;
      const description = document.getElementById("portDescription").value;
      const image = document.getElementById("portImgUrl").value.trim() || window.GTStore.makePlaceholderImage(title, category);

      if (currentEditingPortfolioId) {
        window.GTStore.updatePortfolio(currentEditingPortfolioId, { title, category, tags, year, description, image });
        showToast("แก้ไขผลงานเรียบร้อยแล้ว!", "success");
      } else {
        window.GTStore.addPortfolio({ title, category, tags, year, description, image });
        showToast("เพิ่มผลงานใหม่เรียบร้อยแล้ว!", "success");
      }

      closePortfolioModal();
      renderDashboard();
    });
  }

  window.openEditPortfolioModal = function (id) {
    const items = window.GTStore.getPortfolio();
    const item = items.find(i => i.id === id);
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
    if (confirm("คุณแน่ใจหรือไม่ว่าต้องการลบผลงานนี้ออกจากระบบ?")) {
      window.GTStore.deletePortfolio(id);
      showToast("ลบผลงานเรียบร้อยแล้ว", "info");
      renderDashboard();
    }
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

  /* --- 5. BANNERS MANAGER --- */
  function renderBannersTab() {
    const banners = window.GTStore.getBanners();
    const container = document.getElementById("activeBannersGrid");
    if (!container) return;

    if (banners.length === 0) {
      container.innerHTML = `<p class="text-muted text-center py-4">ยังไม่มีแบนเนอร์ในระบบ สามารถอัปโหลดได้จากโซนด้านบน</p>`;
      return;
    }

    container.innerHTML = banners.map((b, index) => `
      <div class="banner-card ${b.active ? '' : 'inactive'}">
        <div class="banner-img-wrap">
          <img src="${b.image}" alt="${escapeHtml(b.title)}" onerror="this.src='${window.GTStore.makePlaceholderImage(b.title, 'Banner')}">
          <span class="banner-index">#${index + 1}</span>
          <span class="badge ${b.active ? 'badge-success' : 'badge-secondary'} banner-status-badge">
            ${b.active ? 'กำลังใช้งาน' : 'ปิดใช้งาน'}
          </span>
        </div>
        <div class="banner-details">
          <h4>${escapeHtml(b.title)}</h4>
          <p class="banner-sub">${escapeHtml(b.subtitle || '-')}</p>
          <div class="banner-actions">
            <button class="btn btn-sm ${b.active ? 'btn-outline-warning' : 'btn-outline-success'}" onclick="toggleBanner('${b.id}')">
              ${b.active ? 'ปิดใช้งาน' : 'เปิดใช้งาน'}
            </button>
            <button class="btn btn-sm btn-outline-danger" onclick="deleteBanner('${b.id}')">
              ลบแบนเนอร์
            </button>
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
    bannerUploadZone.addEventListener("dragover", e => {
      e.preventDefault();
      bannerUploadZone.classList.add("dragover");
    });
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
      const title = document.getElementById("bannerTitleInput").value.trim() || "แบนเนอร์สไลด์ Graphic TECH";
      const subtitle = document.getElementById("bannerSubtitleInput").value.trim() || "";
      const link = document.getElementById("bannerLinkInput").value.trim() || "#contact";

      const finalImg = currentBannerBase64 || window.GTStore.makePlaceholderImage(title, subtitle);

      window.GTStore.addBanner({ title, subtitle, image: finalImg, link });
      showToast("เพิ่มแบนเนอร์เรียบร้อยแล้ว!", "success");

      currentBannerBase64 = null;
      bannerPreviewImg.style.display = "none";
      bannerUploadZone.style.display = "block";
      saveBannerBtn.disabled = true;
      document.getElementById("bannerTitleInput").value = "";
      document.getElementById("bannerSubtitleInput").value = "";
      document.getElementById("bannerLinkInput").value = "";

      renderDashboard();
    });
  }

  window.toggleBanner = function (id) {
    window.GTStore.toggleBannerStatus(id);
    showToast("อัปเดตสถานะแบนเนอร์แล้ว", "info");
    renderDashboard();
  };

  window.deleteBanner = function (id) {
    if (confirm("ต้องการลบแบนเนอร์นี้ใช่หรือไม่?")) {
      window.GTStore.deleteBanner(id);
      showToast("ลบแบนเนอร์เรียบร้อยแล้ว", "info");
      renderDashboard();
    }
  };

  /* --- 6. TESTIMONIALS MANAGER --- */
  function renderTestimonialsTab() {
    const list = window.GTStore.getTestimonials();
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
            <strong>${escapeHtml(t.name)}</strong> <small style="color: var(--body);">(${escapeHtml(t.position)}${t.company ? ', ' + escapeHtml(t.company) : ''})</small>
            <div style="color: #F59E0B; margin: 4px 0;">${'★'.repeat(t.rating || 5)}</div>
            <p style="font-size: 0.9rem; color: var(--ink); margin-top: 6px;">"${escapeHtml(t.comment)}"</p>
          </div>
          <button class="btn-icon btn-delete" onclick="deleteTestimonialItem('${t.id}')" title="ลบ">
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
      const name = document.getElementById("testName").value.trim();
      const position = document.getElementById("testPosition").value.trim();
      const company = document.getElementById("testCompany").value.trim();
      const comment = document.getElementById("testComment").value.trim();
      const rating = document.getElementById("testRating").value;

      window.GTStore.addTestimonial({ name, position, company, comment, rating });
      showToast("เพิ่มรีวิวลูกค้าเรียบร้อยแล้ว!", "success");
      testimonialForm.reset();
      renderDashboard();
    });
  }

  window.deleteTestimonialItem = function (id) {
    if (confirm("ต้องการลบรีวิวนี้ใช่หรือไม่?")) {
      window.GTStore.deleteTestimonial(id);
      showToast("ลบรีวิวเรียบร้อยแล้ว", "info");
      renderDashboard();
    }
  };

  /* --- 7. MESSAGES INBOX MANAGER --- */
  function renderMessagesTab() {
    const messages = window.GTStore.getMessages();
    const tbody = document.getElementById("messagesTableBody");
    const countBadge = document.getElementById("unreadMessagesCountBadge");

    const unreadCount = messages.filter(m => !m.read).length;
    if (countBadge) {
      countBadge.textContent = unreadCount > 0 ? `${unreadCount} ใหม่` : `${messages.length} ทั้งหมด`;
    }

    if (!tbody) return;

    if (messages.length === 0) {
      tbody.innerHTML = `<tr><td colspan="6" class="text-center py-4 text-muted">ยังไม่มีข้อความส่งเข้ามาในระบบ</td></tr>`;
      return;
    }

    tbody.innerHTML = messages.map(msg => `
      <tr class="${msg.read ? 'read-row' : 'unread-row'}">
        <td>
          <span class="status-dot ${msg.read ? 'dot-read' : 'dot-unread'}"></span>
          ${formatDate(msg.createdAt)}
        </td>
        <td>
          <strong>${escapeHtml(msg.name)}</strong>
          <small class="text-muted d-block">${escapeHtml(msg.email)} | ${escapeHtml(msg.phone)}</small>
        </td>
        <td><span class="badge badge-primary">${escapeHtml(msg.service)}</span></td>
        <td><strong>${escapeHtml(msg.subject)}</strong></td>
        <td>
          <span class="badge ${msg.read ? 'badge-secondary' : 'badge-danger'}">
            ${msg.read ? 'อ่านแล้ว' : 'ข้อความใหม่'}
          </span>
        </td>
        <td class="text-right">
          <button class="btn btn-sm btn-outline" onclick="openViewMessageModal('${msg.id}')">อ่านข้อความ</button>
          <button class="btn-icon btn-delete" onclick="deleteMessageItem('${msg.id}')" title="ลบ">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"/></svg>
          </button>
        </td>
      </tr>
    `).join("");
  }

  window.openViewMessageModal = function (id) {
    const messages = window.GTStore.getMessages();
    const msg = messages.find(m => m.id === id);
    if (!msg) return;

    window.GTStore.markMessageRead(id, true);

    document.getElementById("msgDetailName").textContent = msg.name;
    document.getElementById("msgDetailEmail").textContent = msg.email;
    document.getElementById("msgDetailPhone").textContent = msg.phone;
    document.getElementById("msgDetailService").textContent = msg.service;
    document.getElementById("msgDetailSubject").textContent = msg.subject;
    document.getElementById("msgDetailDate").textContent = formatDate(msg.createdAt);
    document.getElementById("msgDetailBody").textContent = msg.message;

    if (messageModal) messageModal.classList.add("is-open");
    renderDashboard();
  };

  window.deleteMessageItem = function (id) {
    if (confirm("ต้องการลบข้อความนี้ใช่หรือไม่?")) {
      window.GTStore.deleteMessage(id);
      showToast("ลบข้อความเรียบร้อยแล้ว", "info");
      renderDashboard();
    }
  };

  /* --- 8. SETTINGS TAB --- */
  function renderSettingsTab() {
    const user = window.GTStore.getAdminUser();
    const usernameInput = document.getElementById("settingUsername");
    if (usernameInput && user) usernameInput.value = user;
  }

  const settingsForm = document.getElementById("settingsForm");
  if (settingsForm) {
    settingsForm.addEventListener("submit", function (e) {
      e.preventDefault();
      const newUsername = document.getElementById("settingUsername").value.trim();
      const newPassword = document.getElementById("settingPassword").value.trim();

      window.GTStore.updateSettings(newUsername, newPassword);
      showToast("บันทึกการตั้งค่าเรียบร้อยแล้ว!", "success");
      renderDashboard();
    });
  }

  const resetSeedBtn = document.getElementById("resetSeedBtn");
  if (resetSeedBtn) {
    resetSeedBtn.addEventListener("click", function () {
      if (confirm("คุณแน่ใจหรือไม่ว่าต้องการรีเซ็ตข้อมูลทั้งหมดกลับเป็นค่าเริ่มต้น?")) {
        window.GTStore.resetToDefault();
        showToast("รีเซ็ตข้อมูลเรียบร้อยแล้ว", "info");
        renderDashboard();
      }
    });
  }

  /* UTILITY FUNCTIONS */
  function showToast(message, type = "success") {
    let container = document.getElementById("toastContainer");
    if (!container) {
      container = document.createElement("div");
      container.id = "toastContainer";
      document.body.appendChild(container);
    }

    const toast = document.createElement("div");
    toast.className = `toast toast-${type}`;
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
      day: "numeric",
      month: "short",
      year: "numeric",
      hour: "2-digit",
      minute: "2-digit",
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

  checkAuth();
});
