/* ============================================================
   MAIN.JS — Graphic TECH
   Handles: navbar scroll/mega menu/mobile nav, scroll progress,
            scroll-reveal, dynamic portfolio grid render + filter +
            load-more, dynamic hero banner slider, back-to-top, admin theme panel,
            smooth anchor scroll
   ============================================================ */

(function () {
  "use strict";

  /* ------------------------------------------------------------
     NAVBAR: sticky shadow + scroll progress
     ------------------------------------------------------------ */
  const navbar = document.getElementById("navbar");
  const scrollProgress = document.getElementById("scrollProgress");

  function onScroll() {
    const y = window.scrollY;
    if (navbar) navbar.classList.toggle("is-stuck", y > 30);

    const docH = document.documentElement.scrollHeight - window.innerHeight;
    const pct = docH > 0 ? (y / docH) * 100 : 0;
    if (scrollProgress) scrollProgress.style.width = pct + "%";

    if (toTop) toTop.classList.toggle("is-visible", y > 480);
  }
  window.addEventListener("scroll", onScroll, { passive: true });

  /* ------------------------------------------------------------
     MOBILE NAV
     ------------------------------------------------------------ */
  const navToggle = document.getElementById("navToggle");
  const navMenu = document.getElementById("navMenu");
  const navBackdrop = document.getElementById("navBackdrop");

  function closeMobileNav() {
    if (!navMenu) return;
    navMenu.classList.remove("is-open");
    if (navToggle) {
      navToggle.classList.remove("is-open");
      navToggle.setAttribute("aria-expanded", "false");
    }
    if (navBackdrop) navBackdrop.classList.remove("is-open");
    document.body.classList.remove("no-scroll");
  }

  function toggleMobileNav() {
    if (!navMenu) return;
    const isOpen = navMenu.classList.toggle("is-open");
    if (navToggle) {
      navToggle.classList.toggle("is-open", isOpen);
      navToggle.setAttribute("aria-expanded", String(isOpen));
    }
    if (navBackdrop) navBackdrop.classList.toggle("is-open", isOpen);
    document.body.classList.toggle("no-scroll", isOpen);
  }

  if (navToggle) navToggle.addEventListener("click", toggleMobileNav);
  if (navBackdrop) navBackdrop.addEventListener("click", closeMobileNav);

  /* Mega menu handling */
  document.querySelectorAll(".nav__item").forEach(function (item) {
    const link = item.querySelector(":scope > .nav__link");
    const mega = item.querySelector(".nav__mega");
    if (!link || !mega) return;

    link.addEventListener("click", function (e) {
      if (window.innerWidth > 1220) return;
      e.preventDefault();
      e.stopImmediatePropagation();
      const isExpanded = item.classList.toggle("is-expanded");
      link.setAttribute("aria-expanded", String(isExpanded));
    });
  });

  if (navMenu) {
    navMenu.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        if (link.closest(".nav__mega")) return;
        closeMobileNav();
      });
    });
  }

  /* ------------------------------------------------------------
     SCROLL REVEAL (IntersectionObserver)
     ------------------------------------------------------------ */
  const revealSelectors = ".reveal, .reveal-left, .reveal-right, .reveal-scale, .reveal-fade";
  const revealEls = Array.from(document.querySelectorAll(revealSelectors));

  if ("IntersectionObserver" in window && revealEls.length) {
    const revealObs = new IntersectionObserver(
      function (entries, obs) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            obs.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -40px 0px" },
    );

    revealEls.forEach(function (el) {
      revealObs.observe(el);
    });
  } else {
    revealEls.forEach(function (el) {
      el.classList.add("is-visible");
    });
  }

  window.GTObserveReveal = function (el) {
    if ("IntersectionObserver" in window) {
      const obs = new IntersectionObserver(
        function (entries, o) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add("is-visible");
              o.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.15 },
      );
      obs.observe(el);
    } else {
      el.classList.add("is-visible");
    }
  };

  /* BACK TO TOP */
  const toTop = document.getElementById("toTop");
  if (toTop) {
    toTop.addEventListener("click", function (e) {
      e.preventDefault();
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }
  onScroll();

  /* ------------------------------------------------------------
     DYNAMIC PORTFOLIO GRID (Connected to GTStore Backend)
     ------------------------------------------------------------ */
  const grid = document.getElementById("portfolioGrid");
  const loadMoreBtn = document.getElementById("loadMoreBtn");
  const filterWrap = document.getElementById("portfolioFilters");

  let activeFilter = "all";
  let rendered = 0;

  const CATEGORY_PAGE_MAP = {
    "UI/UX Design": "service-uiux",
    "Graphic Design": "service-graphic",
    "Web Development": "service-web",
    "Digital Marketing": "service-marketing",
    "ERP System": "service-erp",
    Branding: "service-branding",
  };

  function filteredItems() {
    let source = (window.GTStore && window.GTStore.getPortfolio)
      ? window.GTStore.getPortfolio()
      : (typeof PORTFOLIO_ITEMS !== "undefined" ? PORTFOLIO_ITEMS : []);

    if (activeFilter === "all") return source;
    return source.filter(function (item) {
      return item.category === activeFilter;
    });
  }

  function renderPortfolioItem(item, isFeaturedSpot) {
    const el = document.createElement("div");
    el.className = "portfolio-item reveal-scale" + (isFeaturedSpot ? " span-2" : "");
    el.tabIndex = 0;

    const page = CATEGORY_PAGE_MAP[item.category] || "";
    const fallbackSvg = (window.GTStore && window.GTStore.makePlaceholderImage)
      ? window.GTStore.makePlaceholderImage(item.title, item.category)
      : "";
    const imgSrc = item.image || fallbackSvg;

    el.innerHTML = `
      <img src="${imgSrc}" alt="${item.title}" loading="lazy">
      <div class="portfolio-item__overlay">
        <p class="portfolio-item__category">${item.category}</p>
        <p class="portfolio-item__title">${item.title}</p>
        <span class="portfolio-item__link" ${page ? `data-page="${page}"` : ""}>
          ดูรายละเอียด
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
        </span>
      </div>`;

    const img = el.querySelector("img");
    if (img) {
      img.addEventListener("error", function () {
        if (fallbackSvg && img.src !== fallbackSvg) {
          img.src = fallbackSvg;
        }
      });
    }

    if (page) {
      el.dataset.page = page;
      el.setAttribute("role", "button");
      el.setAttribute("aria-label", item.title + " — ดูรายละเอียด");
    }

    return el;
  }

  function observeNewReveal(container) {
    container
      .querySelectorAll(".reveal-scale:not(.is-visible)")
      .forEach(function (el) {
        window.GTObserveReveal(el);
      });
  }

  function renderBatch(reset) {
    if (!grid) return;
    if (reset) {
      grid.innerHTML = "";
      rendered = 0;
    }
    const items = filteredItems();
    const pageSize = typeof PORTFOLIO_PAGE_SIZE !== "undefined" ? PORTFOLIO_PAGE_SIZE : 6;
    const batch = items.slice(rendered, rendered + pageSize);

    batch.forEach(function (item, i) {
      const globalIndex = rendered + i;
      const isFeaturedSpot = activeFilter === "all" && globalIndex === 0;
      grid.appendChild(renderPortfolioItem(item, isFeaturedSpot));
    });
    rendered += batch.length;
    observeNewReveal(grid);

    if (loadMoreBtn) {
      loadMoreBtn.style.display = rendered >= items.length ? "none" : "";
    }
  }

  if (grid) renderBatch(true);
  if (loadMoreBtn) {
    loadMoreBtn.addEventListener("click", function () {
      renderBatch(false);
    });
  }

  if (filterWrap) {
    filterWrap.addEventListener("click", function (e) {
      const btn = e.target.closest(".filter-btn");
      if (!btn) return;
      filterWrap.querySelectorAll(".filter-btn").forEach(function (b) {
        b.classList.remove("is-active");
      });
      btn.classList.add("is-active");
      activeFilter = btn.dataset.filter || "all";
      renderBatch(true);
    });
  }

  /* ------------------------------------------------------------
     DYNAMIC HERO BANNER SLIDER (Connected to GTStore Backend)
     ------------------------------------------------------------ */
  function initDynamicSlider() {
    const track = document.getElementById("sliderTrack");
    const dotsContainer = document.getElementById("sliderDots");
    if (!track || !dotsContainer) return;

    // Get Active Banners from GTStore Backend
    const banners = (window.GTStore && window.GTStore.getBanners)
      ? window.GTStore.getBanners().filter(b => b.active)
      : [];

    if (banners.length > 0) {
      track.innerHTML = "";
      banners.forEach(banner => {
        const slide = document.createElement("div");
        slide.className = "slide";
        const fallback = (window.GTStore && window.GTStore.makePlaceholderImage)
          ? window.GTStore.makePlaceholderImage(banner.title, banner.subtitle || "Graphic TECH")
          : "";
        const imgSrc = banner.image || fallback;

        slide.innerHTML = `<a href="${banner.link || '#contact'}"><img src="${imgSrc}" alt="${banner.title}"></a>`;
        
        const img = slide.querySelector("img");
        if (img) {
          img.addEventListener("error", function () {
            if (fallback && img.src !== fallback) img.src = fallback;
          });
        }
        track.appendChild(slide);
      });
    }

    const slides = Array.from(track.children);
    if (slides.length === 0) return;

    const nextBtn = document.getElementById("sliderNext");
    const prevBtn = document.getElementById("sliderPrev");

    let currentIndex = 0;
    let slideInterval;

    dotsContainer.innerHTML = "";
    slides.forEach((_, i) => {
      const dot = document.createElement("div");
      dot.className = `slider-dot ${i === 0 ? "active" : ""}`;
      dot.addEventListener("click", () => goToSlide(i));
      dotsContainer.appendChild(dot);
    });
    const dots = Array.from(dotsContainer.children);

    function updateSlider() {
      track.style.transform = `translateX(-${currentIndex * 100}%)`;
      dots.forEach((dot, i) => dot.classList.toggle("active", i === currentIndex));
    }

    function nextSlide() {
      currentIndex = (currentIndex + 1) % slides.length;
      updateSlider();
    }

    function prevSlide() {
      currentIndex = (currentIndex - 1 + slides.length) % slides.length;
      updateSlider();
    }

    function goToSlide(index) {
      currentIndex = index;
      updateSlider();
      resetInterval();
    }

    function startInterval() {
      if (slides.length > 1) {
        slideInterval = setInterval(nextSlide, 5000);
      }
    }
    function resetInterval() {
      clearInterval(slideInterval);
      startInterval();
    }

    if (nextBtn) nextBtn.addEventListener("click", () => { nextSlide(); resetInterval(); });
    if (prevBtn) prevBtn.addEventListener("click", () => { prevSlide(); resetInterval(); });

    startInterval();
  }

  document.addEventListener("DOMContentLoaded", function () {
    initDynamicSlider();
  });

  /* ------------------------------------------------------------
     SMOOTH SCROLL
     ------------------------------------------------------------ */
  document.querySelectorAll('a[href^="#"]:not([data-page])').forEach(function (anchor) {
    anchor.addEventListener("click", function (e) {
      const href = this.getAttribute("href");
      if (!href || href === "#") return;
      const target = document.querySelector(href);
      if (!target) return;
      e.preventDefault();
      target.scrollIntoView({ behavior: "smooth", block: "start" });
    });
  });

  /* ------------------------------------------------------------
     ADMIN FAB & THEME PANEL INTERACTION
     ------------------------------------------------------------ */
  document.addEventListener("DOMContentLoaded", function () {
    const adminFab = document.getElementById("adminFab");
    const adminPanel = document.getElementById("adminPanel");
    const themeSwatches = document.getElementById("themeSwatches");

    if (adminFab && adminPanel) {
      adminFab.addEventListener("click", function (e) {
        e.stopPropagation();
        const isOpen = adminPanel.classList.toggle("is-open");
        adminFab.setAttribute("aria-expanded", String(isOpen));
      });

      document.addEventListener("click", function (e) {
        if (!adminPanel.contains(e.target) && !adminFab.contains(e.target)) {
          adminPanel.classList.remove("is-open");
          adminFab.setAttribute("aria-expanded", "false");
        }
      });
    }

    if (themeSwatches) {
      themeSwatches.addEventListener("click", function (e) {
        const swatch = e.target.closest(".swatch");
        if (!swatch) return;
        themeSwatches.querySelectorAll(".swatch").forEach(s => s.classList.remove("is-active"));
        swatch.classList.add("is-active");
        const theme = swatch.getAttribute("data-swatch");

        if (theme === "blue") {
          document.documentElement.style.setProperty("--primary", "#2196F3");
          document.documentElement.style.setProperty("--primary-dark", "#1976D2");
        } else if (theme === "deep") {
          document.documentElement.style.setProperty("--primary", "#0D47A1");
          document.documentElement.style.setProperty("--primary-dark", "#0A3880");
        } else if (theme === "sky") {
          document.documentElement.style.setProperty("--primary", "#0288D1");
          document.documentElement.style.setProperty("--primary-dark", "#01579B");
        }
      });
    }
  });

})();
