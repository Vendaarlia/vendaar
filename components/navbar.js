/*!
 * Navbar Component
 * Usage:
 *    <script src="/components/navbar.js"></script>
 * 
 *   <nav id="mainNav"></nav>
 * 
 *   <!-- Component Scripts -->
      <script>
        // ── NAVBAR JS ──
        const nav = Navbar('#mainNav');
      </script>
 *
 * Atau auto-init via data attribute:
 *   <nav data-navbar
 *        data-logo="Studio"
 *        data-cta-text="Contact"
 *        data-cta-href="#contact">
 *   </nav>
 *
 * Versi: 1.0.0
 */

(function (global) {
  "use strict";

  /* ─────────────────────────────────────────
     CSS
  ───────────────────────────────────────── */
  const CSS = /* css */`
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&display=swap');

    :root {
      --nb-accent:      #9239df;
      --nb-hov:         #7b2cbe;
      --nb-bg:          #191d1f;
      --nb-height:      56px;
      --nb-radius:      999px;
      --ft-font-logo:   'Inter', sans-serif;
      --ft-font-menu:   'Inter', sans-serif;
      --nb-transition:  0.3s ease;
    }

    /* ── base ── */
    [data-nb-root] {
      position: fixed;
      top: 0; left: 0;
      width: 100vw;
      height: var(--nb-height);
      display: flex;
      justify-content: center;
      align-items: center;
      background: var(--nb-bg);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      z-index: 1000;
      border-bottom: 1px solid transparent;
      transition: border-color var(--nb-transition),
                  box-shadow  var(--nb-transition),
                  background  var(--nb-transition);
    }

    /* scrolled state */
    [data-nb-root].nb-scrolled {
      border-color: rgba(0,0,0,0.07);
      box-shadow: 0 2px 20px rgba(0,0,0,0.06);
    }

    /* ── container ── */
    .nb-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 32px;
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    /* ── logo ── */
    .nb-logo {
      font-family: var(--nb-font-logo);
      font-weight: 600;
      font-size: 1.35rem;
      color: var(--nb-accent);
      text-decoration: none;
      letter-spacing: .04em;
      line-height: 1;
      cursor: pointer;
      flex-shrink: 0;
    }

    /* ── menu ── */
    .nb-menu {
      display: flex;
      align-items: center;
      gap: 0;
    }

    .nb-menu a {
      font-family: var(--nb-font-menu);
      font-weight: 400;
      font-size: 13px;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: var(--nb-accent);
      text-decoration: none;
      padding: 6px 0;
      margin-right: 28px;
      position: relative;
      transition: opacity var(--nb-transition);
    }

    .nb-menu a::after {
      content: '';
      position: absolute;
      bottom: 0; left: 0;
      width: 0; height: 1px;
      background: var(--nb-accent);
      transition: width var(--nb-transition);
    }

    .nb-menu a:hover { opacity: .55; }
    .nb-menu a:hover::after { width: 100%; }
    .nb-menu a.nb-active { opacity: 1; }
    .nb-menu a.nb-active::after { width: 100%; }

    /* ── right side ── */
    .nb-right {
      display: flex;
      align-items: center;
      gap: 16px;
      flex-shrink: 0;
    }

    /* ── CTA button ── */
    .nb-cta {
      font-family: var(--nb-font-menu);
      font-weight: 400;
      font-size: 13px;
      letter-spacing: .06em;
      text-transform: uppercase;
      text-decoration: none;
      color: var(--nb-accent);
      border: 1px solid var(--nb-accent);
      padding: 8px 20px;
      border-radius: var(--nb-radius);
      transition: background var(--nb-transition),
                  color     var(--nb-transition),
                  transform var(--nb-transition),
                  box-shadow var(--nb-transition);
    }
    .nb-cta:hover {
      background: var(--nb-hov);
      color: #fff;
      border-color: var(--nb-hov);
      transform: translateY(-1px);
      box-shadow: 0 6px 16px rgba(0,0,0,0.14);
    }
    .nb-cta:active { transform: translateY(0); }

    /* ── hamburger ── */
    .nb-burger {
      display: none;
      flex-direction: column;
      justify-content: center;
      gap: 5px;
      width: 28px;
      height: 28px;
      cursor: pointer;
      background: none;
      border: none;
      padding: 0;
      position: relative;
      z-index: 1001;
    }
    .nb-burger span {
      display: block;
      width: 100%;
      height: 1px;
      background: var(--nb-accent);
      transform-origin: center;
      transition: transform var(--nb-transition),
                  opacity   var(--nb-transition),
                  width     var(--nb-transition);
    }
    .nb-burger.nb-open span:nth-child(1) { transform: translateY(6px) rotate(45deg); }
    .nb-burger.nb-open span:nth-child(2) { opacity: 0; width: 0; }
    .nb-burger.nb-open span:nth-child(3) { transform: translateY(-6px) rotate(-45deg); }

    /* ── mobile drawer ── */
    .nb-drawer {
      display: none;
      position: fixed;
      top: var(--nb-height);
      left: 0; right: 0;
      background: var(--nb-bg);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      padding: 24px 32px 32px;
      flex-direction: column;
      gap: 4px;
      border-bottom: 1px solid rgba(0,0,0,0.08);
      transform: translateY(-8px);
      opacity: 0;
      pointer-events: none;
      transition: transform var(--nb-transition),
                  opacity   var(--nb-transition);
      z-index: 999;
    }
    .nb-drawer.nb-open {
      transform: translateY(0);
      opacity: 1;
      pointer-events: auto;
    }
    .nb-drawer a {
      font-family: var(--nb-font-menu);
      font-size: 13px;
      letter-spacing: .08em;
      text-transform: uppercase;
      color: var(--nb-accent);
      text-decoration: none;
      padding: 12px 0;
      border-bottom: 1px solid var(--nb-accent);
      opacity: .7;
      transition: opacity var(--nb-transition);
    }
    .nb-drawer a:last-child { border-bottom: none; }
    .nb-drawer a:hover { opacity: 1; }
    .nb-drawer .nb-drawer-cta {
      margin-top: 16px;
      display: inline-block;
      border: 1px solid var(--nb-accent);
      padding: 10px 20px;
      border-radius: var(--nb-radius);
      text-align: center;
      opacity: 1;
      border-bottom: 1px solid var(--nb-accent) !important;
    }

    .nb-drawer .nb-cta:active {
      background: var(--nb-hov);
      color: #fff;
      border-color: var(--nb-hov);
      transform: translateY(-1px);
      box-shadow: 0 6px 16px rgba(0,0,0,0.14);
    }

    /* ── responsive ── */
    @media (max-width: 768px) {
      .nb-menu, .nb-cta { display: none; }
      .nb-burger { display: flex; }
      .nb-drawer { display: flex; }
    }

    /* ── entry animation ── */
    @keyframes nb-slide-down {
      from { transform: translateY(-100%); opacity: 0; }
      to   { transform: translateY(0);     opacity: 1; }
    }
    [data-nb-root] { animation: nb-slide-down .5s cubic-bezier(.22,1,.36,1) both; }
  `;

  /* ─────────────────────────────────────────
     Inject style once
  ───────────────────────────────────────── */
  function injectStyle() {
    if (document.getElementById("nb-style")) return;
    const s = document.createElement("style");
    s.id = "nb-style";
    s.textContent = CSS;
    document.head.appendChild(s);
  }

  /* ─────────────────────────────────────────
     Helper: resolve selector or element
  ───────────────────────────────────────── */
  function resolve(target) {
    if (typeof target === "string") return document.querySelector(target);
    return target instanceof HTMLElement ? target : null;
  }

  /* ─────────────────────────────────────────
     Navbar Class
  ───────────────────────────────────────── */
  /**
   * @param {string|HTMLElement} target - selector atau elemen container
   * @param {Object} [options]
   * @param {string}   [options.logo='VENDAAR.TOP']          - teks, HTML, atau SVG logo
   * @param {string}   [options.logoHref='/']           - href logo
   * @param {Array}    [options.links=[]]               - array { text, href, active? }
   * @param {string}   [options.ctaText='Contact']      - teks CTA button
   * @param {string}   [options.ctaHref='#']            - href CTA button
   * @param {string}   [options.accentColor='#1a1a1a']  - warna utama
   * @param {string}   [options.hoverColor='#1a1a1a']   - warna hover CTA
   * @param {string}   [options.bgColor='rgba(245,245,243,0.96)'] - background nav
   * @param {number}   [options.height=56]              - tinggi nav (px)
   * @param {boolean}  [options.scrollEffect=true]      - tambah shadow saat scroll
   * @param {Function} [options.onLinkClick]            - callback(href, text, event)
   * @param {Function} [options.onCtaClick]             - callback(event)
   */
  function Navbar(target, options) {
    const container = resolve(target);
    if (!container) throw new Error("Navbar: target tidak ditemukan — " + target);

    const opt = Object.assign({
      logo:         `<svg width="112" height="12" viewBox="0 0 112 12" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M2.3125 0.159092L5.34091 9.31818H5.46023L8.48295 0.159092H10.8011L6.69886 11.7955H4.09659L-5.06639e-07 0.159092H2.3125ZM12.3338 11.7955V0.159092H19.902V1.92614H14.4418V5.08523H19.5099V6.85227H14.4418V10.0284H19.9474V11.7955H12.3338ZM31.6151 0.159092V11.7955H29.7401L24.2571 3.86932H24.1605V11.7955H22.0526V0.159092H23.9389L29.4162 8.09091H29.5185V0.159092H31.6151ZM37.8551 11.7955H33.9119V0.159092H37.9347C39.09 0.159092 40.0824 0.392047 40.9119 0.857956C41.7453 1.32008 42.3854 1.98485 42.8324 2.85227C43.2794 3.7197 43.5028 4.75758 43.5028 5.96591C43.5028 7.17803 43.2775 8.2197 42.8267 9.09091C42.3797 9.96212 41.7339 10.6307 40.8892 11.0966C40.0483 11.5625 39.0369 11.7955 37.8551 11.7955ZM36.0199 9.97159H37.7528C38.5634 9.97159 39.2396 9.82386 39.7812 9.52841C40.3229 9.22917 40.7301 8.78409 41.0028 8.19318C41.2756 7.59849 41.4119 6.85606 41.4119 5.96591C41.4119 5.07576 41.2756 4.33712 41.0028 3.75C40.7301 3.15909 40.3267 2.7178 39.7926 2.42614C39.2623 2.13068 38.6032 1.98296 37.8153 1.98296H36.0199V9.97159ZM46.375 11.7955H44.125L48.2216 0.159092H50.8239L54.9261 11.7955H52.6761L49.5682 2.54546H49.4773L46.375 11.7955ZM46.4489 7.23296H52.5852V8.92614H46.4489V7.23296ZM55.8168 11.7955H55.0668L61.1974 0.159092H62.0156L64.2827 11.7955H63.5327L61.4929 1.07386H61.4304L55.8168 11.7955ZM57.6122 7.41477H63.2031L63.0895 8.07386H57.4986L57.6122 7.41477ZM66.4531 11.7955L68.3849 0.159092H71.9702C72.705 0.159092 73.313 0.303031 73.794 0.59091C74.2789 0.875001 74.6198 1.27273 74.8168 1.78409C75.0175 2.29546 75.063 2.88826 74.9531 3.5625C74.8395 4.22917 74.599 4.81629 74.2315 5.32386C73.8641 5.82765 73.3925 6.22159 72.8168 6.50568C72.2448 6.78977 71.5914 6.93182 70.8565 6.93182H67.6406L67.7486 6.26705H70.9474C71.5421 6.26705 72.0705 6.1553 72.5327 5.93182C72.9986 5.70833 73.3774 5.39394 73.669 4.98864C73.9645 4.58333 74.1577 4.10796 74.2486 3.5625C74.3395 3.00568 74.3054 2.52273 74.1463 2.11364C73.9872 1.70076 73.7126 1.38258 73.3224 1.15909C72.9323 0.931819 72.438 0.818183 71.8395 0.818183H68.9815L67.1634 11.7955H66.4531ZM72.1122 6.52273L74.0952 11.7955H73.294L71.3224 6.52273H72.1122ZM76.8935 11.8693C76.7192 11.8693 76.5772 11.8106 76.4673 11.6932C76.3575 11.572 76.3045 11.4261 76.3082 11.2557C76.3158 11.089 76.3821 10.947 76.5071 10.8295C76.6359 10.7121 76.7836 10.6534 76.9503 10.6534C77.1207 10.6534 77.2628 10.714 77.3764 10.8352C77.4938 10.9527 77.5469 11.0928 77.5355 11.2557C77.5279 11.3693 77.4938 11.4735 77.4332 11.5682C77.3764 11.6629 77.2988 11.7367 77.2003 11.7898C77.1056 11.8428 77.0033 11.8693 76.8935 11.8693ZM81.0923 0.818183L81.206 0.159092H89.3594L89.2457 0.818183H85.5241L83.706 11.7955H82.9957L84.8139 0.818183H81.0923ZM100.607 5.97727C100.607 7.23106 100.372 8.30493 99.902 9.19886C99.4361 10.089 98.7997 10.7708 97.9929 11.2443C97.1899 11.7178 96.2789 11.9545 95.2599 11.9545C94.241 11.9545 93.3281 11.7178 92.5213 11.2443C91.7183 10.767 91.0819 10.0833 90.6122 9.19318C90.1463 8.29924 89.9134 7.22727 89.9134 5.97727C89.9134 4.72349 90.1463 3.65152 90.6122 2.76136C91.0819 1.86743 91.7183 1.18371 92.5213 0.710228C93.3281 0.236743 94.241 9.53674e-07 95.2599 9.53674e-07C96.2789 9.53674e-07 97.1899 0.236743 97.9929 0.710228C98.7997 1.18371 99.4361 1.86743 99.902 2.76136C100.372 3.65152 100.607 4.72349 100.607 5.97727ZM98.4872 5.97727C98.4872 5.0947 98.349 4.35038 98.0724 3.74432C97.7997 3.13447 97.4209 2.67424 96.9361 2.36364C96.4512 2.04924 95.8925 1.89205 95.2599 1.89205C94.6274 1.89205 94.0687 2.04924 93.5838 2.36364C93.099 2.67424 92.7183 3.13447 92.4418 3.74432C92.169 4.35038 92.0327 5.0947 92.0327 5.97727C92.0327 6.85985 92.169 7.60606 92.4418 8.21591C92.7183 8.82197 93.099 9.2822 93.5838 9.59659C94.0687 9.9072 94.6274 10.0625 95.2599 10.0625C95.8925 10.0625 96.4512 9.9072 96.9361 9.59659C97.4209 9.2822 97.7997 8.82197 98.0724 8.21591C98.349 7.60606 98.4872 6.85985 98.4872 5.97727ZM102.599 11.7955V0.159092H106.963C107.857 0.159092 108.607 0.325759 109.213 0.659092C109.823 0.992425 110.283 1.45076 110.594 2.03409C110.908 2.61364 111.065 3.27273 111.065 4.01136C111.065 4.75758 110.908 5.42046 110.594 6C110.279 6.57955 109.815 7.03599 109.202 7.36932C108.588 7.69886 107.832 7.86364 106.935 7.86364H104.043V6.13068H106.651C107.173 6.13068 107.601 6.03977 107.935 5.85796C108.268 5.67614 108.514 5.42614 108.673 5.10796C108.836 4.78977 108.918 4.42424 108.918 4.01136C108.918 3.59849 108.836 3.23485 108.673 2.92046C108.514 2.60606 108.266 2.36174 107.929 2.1875C107.596 2.00947 107.166 1.92046 106.639 1.92046H104.707V11.7955H102.599Z" fill="white"/>
</svg>`, // bisa diganti dengan: '<svg>...</svg>' atau HTML string
      logoHref:     "/",
      links: [
        { text: "Projects", href: "/projects.html" },
        { text: "Testimonials", href: "/#testimonials" },
        { text: "About",    href: "/#about" },
      ],
      ctaText:      "Contact",
      ctaHref:      "/contact-form.html",
      accentColor:  "#fff",
      hoverColor:   "#7b2cbe",
      bgColor:      "#191d1f",
      height:       56,
      scrollEffect: true,
      onLinkClick:  null,
      onCtaClick:   null,
    }, options);

    injectStyle();

    /* ── apply CSS vars ── */
    function applyVars(el) {
      el.style.setProperty("--nb-accent",  opt.accentColor);
      el.style.setProperty("--nb-hov",     opt.hoverColor);
      el.style.setProperty("--nb-bg",      opt.bgColor);
      el.style.setProperty("--nb-height",  opt.height + "px");
    }

    /* ── build HTML ── */
    container.setAttribute("data-nb-root", "");
    applyVars(container);

    // nav-container
    const navContainer = document.createElement("div");
    navContainer.className = "nb-container";

    // logo
    const logo = document.createElement("a");
    logo.className = "nb-logo";
    logo.href = opt.logoHref;
    logo.innerHTML = opt.logo;

    // menu
    const menu = document.createElement("div");
    menu.className = "nb-menu";
    opt.links.forEach(link => {
      const a = document.createElement("a");
      a.href = link.href;
      a.textContent = link.text;
      if (link.active) a.classList.add("nb-active");
      a.addEventListener("click", e => {
        if (typeof opt.onLinkClick === "function") opt.onLinkClick(link.href, link.text, e);
      });
      menu.appendChild(a);
    });

    // right side
    const right = document.createElement("div");
    right.className = "nb-right";

    // CTA
    const cta = document.createElement("a");
    cta.className = "nb-cta";
    cta.href = opt.ctaHref;
    cta.textContent = opt.ctaText;
    cta.addEventListener("click", e => {
      if (typeof opt.onCtaClick === "function") opt.onCtaClick(e);
    });

    // hamburger
    const burger = document.createElement("button");
    burger.className = "nb-burger";
    burger.setAttribute("aria-label", "Menu");
    burger.innerHTML = "<span></span><span></span><span></span>";

    right.appendChild(cta);
    right.appendChild(burger);

    navContainer.appendChild(logo);
    navContainer.appendChild(menu);
    navContainer.appendChild(right);
    container.innerHTML = "";
    container.appendChild(navContainer);

    // drawer (mobile)
    const drawer = document.createElement("div");
    drawer.className = "nb-drawer";
    applyVars(drawer);
    opt.links.forEach(link => {
      const a = document.createElement("a");
      a.href = link.href;
      a.textContent = link.text;
      a.addEventListener("click", () => closeDrawer());
      drawer.appendChild(a);
    });
    const drawerCta = document.createElement("a");
    drawerCta.className = "nb-drawer-cta";
    drawerCta.href = opt.ctaHref;
    drawerCta.textContent = opt.ctaText;
    drawerCta.addEventListener("click", () => closeDrawer());
    drawer.appendChild(drawerCta);

    // insert drawer after container (not inside nav)
    container.insertAdjacentElement("afterend", drawer);

    /* ── drawer toggle ── */
    let drawerOpen = false;

    function openDrawer() {
      drawerOpen = true;
      drawer.classList.add("nb-open");
      burger.classList.add("nb-open");
      burger.setAttribute("aria-expanded", "true");
    }

    function closeDrawer() {
      drawerOpen = false;
      drawer.classList.remove("nb-open");
      burger.classList.remove("nb-open");
      burger.setAttribute("aria-expanded", "false");
    }

    burger.addEventListener("click", () => {
      drawerOpen ? closeDrawer() : openDrawer();
    });

    // close on outside click
    document.addEventListener("click", e => {
      if (drawerOpen && !container.contains(e.target) && !drawer.contains(e.target)) {
        closeDrawer();
      }
    });

    /* ── scroll effect ── */
    if (opt.scrollEffect) {
      function onScroll() {
        if (window.scrollY > 10) {
          container.classList.add("nb-scrolled");
        } else {
          container.classList.remove("nb-scrolled");
        }
      }
      window.addEventListener("scroll", onScroll, { passive: true });
      onScroll();
    }

    /* ── Public API ── */
    return {
      /** Update logo teks/HTML */
      setLogo(html) {
        logo.innerHTML = html;
        opt.logo = html;
      },

      /** Ganti daftar link secara dinamis */
      setLinks(links) {
        opt.links = links;
        menu.innerHTML = "";
        drawer.innerHTML = "";

        links.forEach(link => {
          // desktop
          const a = document.createElement("a");
          a.href = link.href;
          a.textContent = link.text;
          if (link.active) a.classList.add("nb-active");
          a.addEventListener("click", e => {
            if (typeof opt.onLinkClick === "function") opt.onLinkClick(link.href, link.text, e);
          });
          menu.appendChild(a);

          // drawer
          const da = document.createElement("a");
          da.href = link.href;
          da.textContent = link.text;
          da.addEventListener("click", () => closeDrawer());
          drawer.appendChild(da);
        });

        // re-append drawer cta
        drawer.appendChild(drawerCta);
      },

      /** Set link aktif berdasarkan href */
      setActive(href) {
        menu.querySelectorAll("a").forEach(a => {
          a.classList.toggle("nb-active", a.getAttribute("href") === href);
        });
      },

      /** Auto-detect active link dari URL saat ini */
      autoActive() {
        const current = window.location.pathname;
        menu.querySelectorAll("a").forEach(a => {
          a.classList.toggle("nb-active", a.getAttribute("href") === current);
        });
      },

      /** Ganti teks / href CTA */
      setCta(text, href) {
        cta.textContent = text;
        if (href) cta.href = href;
        drawerCta.textContent = text;
        if (href) drawerCta.href = href;
      },

      /** Ganti warna aksen (accent + hover bisa beda) */
      setColors(accent, hover) {
        opt.accentColor = accent || opt.accentColor;
        opt.hoverColor  = hover  || opt.hoverColor;
        applyVars(container);
        applyVars(drawer);
      },

      /** Buka / tutup mobile drawer secara programatik */
      openDrawer,
      closeDrawer,

      /** Hapus navbar dari DOM */
      destroy() {
        container.removeAttribute("data-nb-root");
        container.innerHTML = "";
        drawer.remove();
      },
    };
  }

  /* ─────────────────────────────────────────
     Auto-init via [data-navbar]
  ───────────────────────────────────────── */
  function autoInit() {
    document.querySelectorAll("[data-navbar]").forEach(el => {
      if (el._navbarInstance) return;

      const d = el.dataset;

      // parse links dari data-links JSON atau data-link-* attributes
      let links;
      try {
        links = d.links ? JSON.parse(d.links) : [
          { text: "About", href: "/about" },
          { text: "Works", href: "/works.php" },
          { text: "VR",    href: "#" },
        ];
      } catch (e) {
        links = [];
      }

      el._navbarInstance = Navbar(el, {
        logo:         d.logo         || "Studio",
        logoHref:     d.logoHref     || "/",
        links,
        ctaText:      d.ctaText      || "Contact",
        ctaHref:      d.ctaHref      || "#",
        accentColor:  d.accentColor  || "#1a1a1a",
        hoverColor:   d.hoverColor   || "#1a1a1a",
        bgColor:      d.bgColor      || "rgba(245,245,243,0.96)",
        height:       +(d.height)    || 56,
        scrollEffect: d.scrollEffect !== "false",
      });
    });
  }

  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", autoInit);
  } else {
    autoInit();
  }

  global.Navbar = Navbar;
  global.NavbarAutoInit = autoInit;

})(window);
