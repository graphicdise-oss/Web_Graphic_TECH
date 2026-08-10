/* ============================================================
   API-STORE.JS — Graphic TECH
   Central Data Store Engine with API & LocalStorage Dual Support.
   Manages: Authentication, Portfolio CRUD, Banners CRUD, Testimonials,
            Messages Inbox & System Settings.
   ============================================================ */

(function (window) {
  "use strict";

  const STORAGE_KEYS = {
    AUTH: "gt_auth_session",
    PORTFOLIO: "gt_portfolio_items",
    BANNERS: "gt_hero_banners",
    TESTIMONIALS: "gt_testimonials",
    MESSAGES: "gt_contact_messages",
    SETTINGS: "gt_admin_settings",
    SERVICE_POSTERS: "gt_service_posters",
    SERVICE_PORTFOLIO: "gt_service_portfolio",
  };

  /* Helper to generate SVG placeholder images when no uploaded image is provided */
  function makePlaceholderImage(title, category, color1 = "#1976D2", color2 = "#0D47A1") {
    const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="800" height="450" viewBox="0 0 800 450">
      <defs>
        <linearGradient id="g" x1="0%" y1="0%" x2="100%" y2="100%">
          <stop offset="0%" stop-color="${color1}"/>
          <stop offset="100%" stop-color="${color2}"/>
        </linearGradient>
      </defs>
      <rect width="800" height="450" fill="url(#g)"/>
      <circle cx="700" cy="80" r="160" fill="rgba(255,255,255,0.08)"/>
      <circle cx="100" cy="380" r="200" fill="rgba(255,255,255,0.05)"/>
      <text x="400" y="210" fill="#ffffff" font-size="34" font-weight="bold" font-family="sans-serif" text-anchor="middle">${title}</text>
      <text x="400" y="260" fill="rgba(255,255,255,0.8)" font-size="20" font-family="sans-serif" text-anchor="middle">${category}</text>
    </svg>`;
    return "data:image/svg+xml;charset=utf-8," + encodeURIComponent(svg);
  }

  /* Default Admin Settings */
  const DEFAULT_SETTINGS = {
    username: "admin",
    passwordHash: "1234",
    siteName: "Graphic TECH",
  };

  /* Initial Seed Portfolio Items */
  const DEFAULT_PORTFOLIO = [
    {
      id: "web-mandarin",
      title: "Mandarin Oriental E-Commerce",
      category: "Web Development",
      image: makePlaceholderImage("Mandarin Oriental E-Commerce", "Web Development", "#0D47A1", "#2196F3"),
      tags: ["React", "Node.js", "E-Commerce"],
      year: 2024,
      description: "ระบบ E-Commerce ระดับพรีเมียมสำหรับธุรกิจโรงแรมและบริการ หรูหราและใช้งานง่าย",
    },
    {
      id: "logo-novae",
      title: "Novae Brand Identity",
      category: "Branding",
      image: makePlaceholderImage("Novae Brand Identity", "Branding", "#7B1FA2", "#E91E63"),
      tags: ["Logo", "Brand Identity", "Stationery"],
      year: 2024,
      description: "ออกแบบอัตลักษณ์แบรนด์แบบครบวงจร สร้างภาพจำที่ทันสมัยและโดดเด่น",
    },
    {
      id: "uiux-flowmed",
      title: "FlowMed Patient App",
      category: "UI/UX Design",
      image: makePlaceholderImage("FlowMed Patient App", "UI/UX Design", "#00796B", "#00E676"),
      tags: ["Figma", "Mobile App", "Healthcare"],
      year: 2024,
      description: "แอปพลิเคชันสำหรับผู้ป่วยและบุคลากรทางการแพทย์ ดีไซน์ใช้งานง่าย เน้น User Experience",
    },
    {
      id: "erp-logipro",
      title: "LogiPro ERP Dashboard",
      category: "ERP System",
      image: makePlaceholderImage("LogiPro ERP Dashboard", "ERP System", "#303F9F", "#3F51B5"),
      tags: ["ERP", "Dashboard", "Logistics"],
      year: 2023,
      description: "ระบบบริหารจัดการองค์กรด้านโลจิสติกส์ ติดตามสถานะแบบ Real-time",
    },
    {
      id: "graphic-siam",
      title: "Siam Collection Campaign",
      category: "Graphic Design",
      image: makePlaceholderImage("Siam Collection Campaign", "Graphic Design", "#E65100", "#FF9800"),
      tags: ["Campaign", "Print", "Digital"],
      year: 2023,
      description: "สื่อโฆษณากราฟิกสำหรับแคมเปญแฟชั่นคอลเลกชันใหม่ ทั้งสื่อสิ่งพิมพ์และดิจิทัล",
    },
    {
      id: "marketing-bloom",
      title: "Bloom Beauty Digital Campaign",
      category: "Digital Marketing",
      image: makePlaceholderImage("Bloom Beauty Digital Campaign", "Digital Marketing", "#C2185B", "#FF4081"),
      tags: ["Social Media", "Ads", "Content"],
      year: 2023,
      description: "กลยุทธ์การตลาดดิจิทัลและคอนเทนต์เพื่อเพิ่มยอดขายและความตระหนักรู้แบรนด์",
    },
  ];

  /* Initial Seed Hero Banners */
  const DEFAULT_BANNERS = [
    {
      id: "banner-1",
      title: "สร้างแบรนด์ให้แข็งแกร่งด้วยดีไซน์และเทคโนโลยี",
      subtitle: "Creative × Technology Studio ระดับมืออาชีพ",
      image: makePlaceholderImage("Graphic TECH Banner 1", "Creative & Technology Studio", "#0C1B33", "#2196F3"),
      link: "#contact",
      active: true,
      createdAt: new Date().toISOString(),
    },
    {
      id: "banner-2",
      title: "ยกระดับธุรกิจของคุณด้วยบริการครบวงจร",
      subtitle: "UI/UX, Graphic Design, Web Development, Digital Marketing & ERP System",
      image: makePlaceholderImage("Graphic TECH Banner 2", "Full Services Digital Agency", "#1565C0", "#00ACC1"),
      link: "#services",
      active: true,
      createdAt: new Date().toISOString(),
    },
  ];

  /* Initial Seed Testimonials */
  const DEFAULT_TESTIMONIALS = [
    {
      id: "test-1",
      name: "ณิชชา ธนันต์พิสิฐ",
      position: "Marketing Director",
      company: "Mandarin Oriental",
      comment: "ทีมงานเข้าใจไอเดียธุรกิจดีมาก ผลงานออกมาสวยงาม ตรงใจ และเพิ่มอัตราการสั่งซื้อของเว็บไซต์ได้อย่างชัดเจน",
      avatar: "ณC",
      rating: 5,
    },
    {
      id: "test-2",
      name: "ธนกร กิตติวัฒน์",
      position: "COO",
      company: "LogiPro Logistics",
      comment: "ระบบ ERP ที่ Graphic TECH พัฒนาให้ ช่วยลดเวลาการทำงานด้าน Inventory ไปกว่าครึ่ง ทีมงานซัพพอร์ตไวและแก้ปัญหาได้ดีมากครับ",
      avatar: "ธK",
      rating: 5,
    },
    {
      id: "test-3",
      name: "พิมพรรณ สายชล",
      position: "Founder",
      company: "Siam Collection",
      comment: "Rebrand ครั้งนี้ทำให้แบรนด์ดูมืออาชีพขึ้นมาก ลูกค้าเก่าก็ทักมาชมเยอะมาก ทีมออกแบบฟังความต้องการและปรับจนกว่าจะได้งานที่ดีที่สุด",
      avatar: "พS",
      rating: 5,
    },
  ];

  /* Initial Seed Messages */
  const DEFAULT_MESSAGES = [
    {
      id: "msg-101",
      name: "สมชาย ใจดี",
      email: "somchai@example.com",
      phone: "081-234-5678",
      service: "Web Development",
      subject: "สอบถามราคาทำเว็บไซต์ E-Commerce",
      message: "สนใจพัฒนาเว็บไซต์ขายสินค้าออนไลน์ อยากสอบถามระยะเวลาและประมาณการราคาครับ",
      read: false,
      createdAt: new Date(Date.now() - 3600000 * 5).toISOString(),
    },
  ];

  /* Storage Helpers */
  function getStorage(key, fallback) {
    try {
      const data = localStorage.getItem(key);
      return data ? JSON.parse(data) : fallback;
    } catch (e) {
      return fallback;
    }
  }

  function setStorage(key, value) {
    try {
      localStorage.setItem(key, JSON.stringify(value));
    } catch (e) {
      console.error("Storage error:", e);
    }
  }

  const GTStore = {
    serverUrl: "http://localhost:3000/api",

    init: function () {
      if (!localStorage.getItem(STORAGE_KEYS.SETTINGS)) setStorage(STORAGE_KEYS.SETTINGS, DEFAULT_SETTINGS);
      if (!localStorage.getItem(STORAGE_KEYS.PORTFOLIO)) setStorage(STORAGE_KEYS.PORTFOLIO, DEFAULT_PORTFOLIO);
      if (!localStorage.getItem(STORAGE_KEYS.BANNERS)) setStorage(STORAGE_KEYS.BANNERS, DEFAULT_BANNERS);
      if (!localStorage.getItem(STORAGE_KEYS.TESTIMONIALS)) setStorage(STORAGE_KEYS.TESTIMONIALS, DEFAULT_TESTIMONIALS);
      if (!localStorage.getItem(STORAGE_KEYS.MESSAGES)) setStorage(STORAGE_KEYS.MESSAGES, DEFAULT_MESSAGES);
    },

    makePlaceholderImage: makePlaceholderImage,

    /* AUTHENTICATION */
    login: function (username, password) {
      const settings = getStorage(STORAGE_KEYS.SETTINGS, DEFAULT_SETTINGS);
      if (username === settings.username && password === settings.passwordHash) {
        const session = { user: username, token: "gt_token_" + Date.now(), loggedInAt: new Date().toISOString() };
        setStorage(STORAGE_KEYS.AUTH, session);
        return { success: true, session };
      }
      return { success: false, message: "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง" };
    },

    logout: function () { localStorage.removeItem(STORAGE_KEYS.AUTH); },
    isLoggedIn: function () { const s = getStorage(STORAGE_KEYS.AUTH, null); return !!(s && s.token); },
    getAdminUser: function () { const s = getStorage(STORAGE_KEYS.AUTH, null); return s ? s.user : null; },
    updateSettings: function (user, pass) {
      const s = getStorage(STORAGE_KEYS.SETTINGS, DEFAULT_SETTINGS);
      if (user) s.username = user.trim();
      if (pass) s.passwordHash = pass.trim();
      setStorage(STORAGE_KEYS.SETTINGS, s);
      return { success: true, settings: s };
    },

    /* PORTFOLIO */
    getPortfolio: function () { return getStorage(STORAGE_KEYS.PORTFOLIO, DEFAULT_PORTFOLIO); },
    addPortfolio: function (item) {
      const items = this.getPortfolio();
      const newItem = {
        id: "item-" + Date.now(),
        title: item.title || "ผลงานใหม่",
        category: item.category || "Web Development",
        image: item.image || makePlaceholderImage(item.title || "ผลงานใหม่", item.category || "Web Development"),
        tags: Array.isArray(item.tags) ? item.tags : (item.tags || "").split(",").map(t => t.trim()).filter(Boolean),
        year: item.year ? parseInt(item.year, 10) : new Date().getFullYear(),
        description: item.description || "",
        createdAt: new Date().toISOString(),
      };
      items.unshift(newItem);
      setStorage(STORAGE_KEYS.PORTFOLIO, items);
      return newItem;
    },

    updatePortfolio: function (id, updatedData) {
      let items = this.getPortfolio();
      let index = items.findIndex(item => item.id === id);
      if (index !== -1) {
        items[index] = {
          ...items[index],
          ...updatedData,
          image: updatedData.image || items[index].image || makePlaceholderImage(updatedData.title || items[index].title, updatedData.category || items[index].category),
          tags: Array.isArray(updatedData.tags)
            ? updatedData.tags
            : typeof updatedData.tags === "string"
            ? updatedData.tags.split(",").map(t => t.trim()).filter(Boolean)
            : items[index].tags,
        };
        setStorage(STORAGE_KEYS.PORTFOLIO, items);
        return items[index];
      }
      return null;
    },

    deletePortfolio: function (id) {
      let items = this.getPortfolio();
      items = items.filter(item => item.id !== id);
      setStorage(STORAGE_KEYS.PORTFOLIO, items);
      return true;
    },

    /* BANNERS */
    getBanners: function () { return getStorage(STORAGE_KEYS.BANNERS, DEFAULT_BANNERS); },
    addBanner: function (bData) {
      const banners = this.getBanners();
      const newBanner = {
        id: "banner-" + Date.now(),
        title: bData.title || "แบนเนอร์โปรโมท",
        subtitle: bData.subtitle || "",
        image: bData.image || makePlaceholderImage(bData.title || "Graphic TECH Banner", "Home Slide Banner"),
        link: bData.link || "#contact",
        active: true,
        createdAt: new Date().toISOString(),
      };
      banners.unshift(newBanner);
      setStorage(STORAGE_KEYS.BANNERS, banners);
      return newBanner;
    },

    deleteBanner: function (id) {
      let banners = this.getBanners();
      banners = banners.filter(b => b.id !== id);
      setStorage(STORAGE_KEYS.BANNERS, banners);
      return true;
    },

    toggleBannerStatus: function (id) {
      let banners = this.getBanners();
      const b = banners.find(x => x.id === id);
      if (b) {
        b.active = !b.active;
        setStorage(STORAGE_KEYS.BANNERS, banners);
      }
      return b;
    },

    /* TESTIMONIALS */
    getTestimonials: function () { return getStorage(STORAGE_KEYS.TESTIMONIALS, DEFAULT_TESTIMONIALS); },
    addTestimonial: function (data) {
      const list = this.getTestimonials();
      const item = {
        id: "test-" + Date.now(),
        name: data.name || "ลูกค้าผู้มีเกียรติ",
        position: data.position || "ผู้ใช้บริการ",
        company: data.company || "-",
        comment: data.comment || "",
        avatar: (data.name || "GT").substring(0, 2).toUpperCase(),
        rating: data.rating ? parseInt(data.rating, 10) : 5,
        createdAt: new Date().toISOString(),
      };
      list.unshift(item);
      setStorage(STORAGE_KEYS.TESTIMONIALS, list);
      return item;
    },
    deleteTestimonial: function (id) {
      let list = this.getTestimonials();
      list = list.filter(t => t.id !== id);
      setStorage(STORAGE_KEYS.TESTIMONIALS, list);
      return true;
    },

    /* MESSAGES */
    getMessages: function () { return getStorage(STORAGE_KEYS.MESSAGES, DEFAULT_MESSAGES); },
    addMessage: function (msgData) {
      const messages = this.getMessages();
      const newMsg = {
        id: "msg-" + Date.now(),
        name: msgData.name || "ผู้ติดต่อ",
        email: msgData.email || "-",
        phone: msgData.phone || "-",
        service: msgData.service || "สอบถามทั่วไป",
        subject: msgData.subject || "ติดต่อจากหน้าเว็บไซต์",
        message: msgData.message || "",
        read: false,
        createdAt: new Date().toISOString(),
      };
      messages.unshift(newMsg);
      setStorage(STORAGE_KEYS.MESSAGES, messages);
      return newMsg;
    },
    markMessageRead: function (id, status = true) {
      let messages = this.getMessages();
      const msg = messages.find(m => m.id === id);
      if (msg) {
        msg.read = status;
        setStorage(STORAGE_KEYS.MESSAGES, messages);
      }
      return msg;
    },
    deleteMessage: function (id) {
      let messages = this.getMessages();
      messages = messages.filter(m => m.id !== id);
      setStorage(STORAGE_KEYS.MESSAGES, messages);
      return true;
    },

    /* STATS & RESET */
    getStats: function () {
      const portfolio = this.getPortfolio();
      const banners = this.getBanners();
      const testimonials = this.getTestimonials();
      const messages = this.getMessages();
      return {
        totalPortfolio: portfolio.length,
        totalBanners: banners.length,
        activeBanners: banners.filter(b => b.active).length,
        totalTestimonials: testimonials.length,
        totalMessages: messages.length,
        unreadMessages: messages.filter(m => !m.read).length,
      };
    },

    resetToDefault: function () {
      setStorage(STORAGE_KEYS.SETTINGS, DEFAULT_SETTINGS);
      setStorage(STORAGE_KEYS.PORTFOLIO, DEFAULT_PORTFOLIO);
      setStorage(STORAGE_KEYS.BANNERS, DEFAULT_BANNERS);
      setStorage(STORAGE_KEYS.TESTIMONIALS, DEFAULT_TESTIMONIALS);
      setStorage(STORAGE_KEYS.MESSAGES, DEFAULT_MESSAGES);
    },

    /* ─── SERVICE POSTERS ─── */
    /* posters: { [serviceSlug]: [{id, title, image, description, createdAt}] } */
    getServicePosters: function (slug) {
      const all = getStorage(STORAGE_KEYS.SERVICE_POSTERS, {});
      return all[slug] || [];
    },
    addServicePoster: function (slug, data) {
      const all = getStorage(STORAGE_KEYS.SERVICE_POSTERS, {});
      if (!all[slug]) all[slug] = [];
      const item = {
        id: "poster-" + Date.now(),
        title: data.title || "โปสเตอร์ใหม่",
        image: data.image || makePlaceholderImage(data.title || "Poster", slug, "#1565C0", "#2196F3"),
        description: data.description || "",
        createdAt: new Date().toISOString(),
      };
      all[slug].unshift(item);
      setStorage(STORAGE_KEYS.SERVICE_POSTERS, all);
      return item;
    },
    updateServicePoster: function (slug, id, data) {
      const all = getStorage(STORAGE_KEYS.SERVICE_POSTERS, {});
      if (!all[slug]) return null;
      const idx = all[slug].findIndex(p => p.id === id);
      if (idx === -1) return null;
      all[slug][idx] = { ...all[slug][idx], ...data };
      setStorage(STORAGE_KEYS.SERVICE_POSTERS, all);
      return all[slug][idx];
    },
    deleteServicePoster: function (slug, id) {
      const all = getStorage(STORAGE_KEYS.SERVICE_POSTERS, {});
      if (!all[slug]) return false;
      all[slug] = all[slug].filter(p => p.id !== id);
      setStorage(STORAGE_KEYS.SERVICE_POSTERS, all);
      return true;
    },

    /* ─── SERVICE PORTFOLIO ─── */
    /* portfolios keyed by service slug */
    getServicePortfolio: function (slug) {
      const all = getStorage(STORAGE_KEYS.SERVICE_PORTFOLIO, {});
      return all[slug] || [];
    },
    addServicePortfolio: function (slug, data) {
      const all = getStorage(STORAGE_KEYS.SERVICE_PORTFOLIO, {});
      if (!all[slug]) all[slug] = [];
      const item = {
        id: "svc-port-" + Date.now(),
        title: data.title || "ผลงานใหม่",
        image: data.image || makePlaceholderImage(data.title || "Portfolio", slug, "#0D47A1", "#1976D2"),
        tags: Array.isArray(data.tags) ? data.tags : (data.tags || "").split(",").map(t => t.trim()).filter(Boolean),
        year: data.year ? parseInt(data.year, 10) : new Date().getFullYear(),
        description: data.description || "",
        createdAt: new Date().toISOString(),
      };
      all[slug].unshift(item);
      setStorage(STORAGE_KEYS.SERVICE_PORTFOLIO, all);
      return item;
    },
    updateServicePortfolio: function (slug, id, data) {
      const all = getStorage(STORAGE_KEYS.SERVICE_PORTFOLIO, {});
      if (!all[slug]) return null;
      const idx = all[slug].findIndex(p => p.id === id);
      if (idx === -1) return null;
      all[slug][idx] = {
        ...all[slug][idx], ...data,
        tags: Array.isArray(data.tags) ? data.tags : typeof data.tags === "string"
          ? data.tags.split(",").map(t => t.trim()).filter(Boolean)
          : all[slug][idx].tags,
      };
      setStorage(STORAGE_KEYS.SERVICE_PORTFOLIO, all);
      return all[slug][idx];
    },
    deleteServicePortfolio: function (slug, id) {
      const all = getStorage(STORAGE_KEYS.SERVICE_PORTFOLIO, {});
      if (!all[slug]) return false;
      all[slug] = all[slug].filter(p => p.id !== id);
      setStorage(STORAGE_KEYS.SERVICE_PORTFOLIO, all);
      return true;
    },
  };

  GTStore.init();
  window.GTStore = GTStore;
})(window);
