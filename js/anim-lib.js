// ============================================================
// anim.js — GSAP Animation Library
// ============================================================
// HOW TO USE:
//
// 1. LOAD ANIMATION (muncul saat halaman dibuka)
//    Tambah class .set-anim-load ke parent element
//    Tambah ANIMATION CLASSES ke child element
//
// 2. SCROLL ANIMATION (muncul saat di-scroll)
//    Tambah class .set-anim-scroll ke parent element
//    Tambah ANIMATION CLASSES ke child element
//
// AVAILABLE ANIMATION CLASSES:
//   .slide-up-words   — text slide up per kata
//   .slide-up-chars   — text slide up per karakter
//   .fade-in          — fade in (untuk semua element)
//   .scale-in         — scale dari kecil ke besar
//   .slide-from-left  — masuk dari kiri
//   .slide-from-right — masuk dari kanan
//
// EXAMPLE HTML:
//   <!-- Load animation -->
//   <div class="set-anim-load">
//     <h1 class="slide-up-words">Hello World</h1>
//     <p class="slide-up-chars">Subtitle here</p>
//     <img class="fade-in" src="..." />
//   </div>
//
//   <!-- Scroll animation -->
//   <div class="set-anim-scroll">
//     <h2 class="slide-up-words">Section Title</h2>
//     <p class="fade-in">Description text</p>
//     <div class="scale-in">Card</div>
//   </div>
// ============================================================

gsap.registerPlugin(ScrollTrigger, SplitText);


// ============================================================
// HELPERS
// ============================================================

const TEXT_TAGS = ['H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'P', 'EM', 'SPAN', 'STRONG', 'A'];

// default config — bisa di-override per animasi
const DEFAULTS = {
  duration: 0.7,
  stagger: 0.05,
  ease: 'power3.out',
  delay: 0,
  scrollTrigger: null,
};

// merge config helper
function mergeConfig(options) {
  return { ...DEFAULTS, ...options };
}

// buat scrollTrigger config dari parent .set-anim-scroll
function makeScrollTrigger(parent) {
  return {
    trigger: parent.closest('.set-anim-scroll'),
    start: 'top top',
  };
}


// ============================================================
// ANIMATION FUNCTIONS
// ============================================================

// ── 1. SLIDE UP PER KATA ────────────────────────────────────
// Cocok untuk: h1, h2, h3, p, em
// Efek: setiap kata slide up masuk satu per satu
function slideUpWords(el, options = {}) {
  const config = mergeConfig(options);

  const split = new SplitText(el, {
    type: 'words',
    mask: 'words', // built-in clip, ngak pakek CSS lagi
  });

  gsap.from(split.words, {
    y: '110%', //slide up masuk kedalam view
    opacity: 0,
    duration: config.duration,
    stagger: config.stagger,
    ease: config.ease,
    delay: config.delay,
    scrollTrigger: config.scrollTrigger,
    onComplete: () => split.revert(),
  });
}

// ── 2. SLIDE UP PER KARAKTER ────────────────────────────────
// Cocok untuk: h1, h2, label pendek
// Efek: setiap huruf slide up masuk satu per satu (lebih dramatis)
function slideUpChars(el, options = {}) {
  const config = mergeConfig({
    stagger: 0.03, // lebih cepat karena per huruf
    ...options,
  });

  const split = new SplitText(el, {
    type: 'chars',
    mask: 'chars', // built-in clip, ngak pakek CSS lagi
  });

  gsap.from(split.chars, {
    y: '110%', //slide up masuk kedalam view
    opacity: 0,
    duration: config.duration,
    stagger: config.stagger,
    ease: config.ease,
    delay: config.delay,
    scrollTrigger: config.scrollTrigger,
    onComplete: () => split.revert(),
  });
}

// ── 3. FADE IN ──────────────────────────────────────────────
// Cocok untuk: img, div, section, semua element
// Efek: muncul perlahan dari transparan
function fadeIn(el, options = {}) {
  const config = mergeConfig({
    duration: 0.9,
    ...options,
  });

  gsap.from(el, {
    opacity: 0,
    duration: config.duration,
    ease: config.ease,
    delay: config.delay,
    scrollTrigger: config.scrollTrigger,
  });
}

// ── 4. SCALE IN ─────────────────────────────────────────────
// Cocok untuk: card, img, badge, icon
// Efek: muncul dari kecil ke ukuran normal
function scaleIn(el, options = {}) {
  const config = mergeConfig({
    duration: 0.6,
    ease: 'back.out(1.7)',
    ...options,
  });

  gsap.from(el, {
    scale: 0.85,
    opacity: 0,
    duration: config.duration,
    ease: config.ease,
    delay: config.delay,
    scrollTrigger: config.scrollTrigger,
  });
}

// ── 5. SLIDE FROM LEFT ──────────────────────────────────────
// Cocok untuk: gambar, card, konten yang ingin berkesan masuk dari samping
// Efek: masuk dari kiri
function slideFromLeft(el, options = {}) {
  const config = mergeConfig(options);

  gsap.from(el, {
    x: -60,
    opacity: 0,
    duration: config.duration,
    ease: config.ease,
    delay: config.delay,
    scrollTrigger: config.scrollTrigger,
  });
}

// ── 6. SLIDE FROM RIGHT ─────────────────────────────────────
// Cocok untuk: gambar, card, konten yang ingin berkesan masuk dari samping
// Efek: masuk dari kanan
function slideFromRight(el, options = {}) {
  const config = mergeConfig(options);

  gsap.from(el, {
    x: 60,
    opacity: 0,
    duration: config.duration,
    ease: config.ease,
    delay: config.delay,
    scrollTrigger: config.scrollTrigger,
  });
}


// ============================================================
// ANIMATION MAP
// class name → function
// tambah animasi baru di sini
// ============================================================

const ANIM_MAP = {
  'slide-up-words'  : slideUpWords,
  'slide-up-chars'  : slideUpChars,
  'fade-in'         : fadeIn,
  'scale-in'        : scaleIn,
  'slide-from-left' : slideFromLeft,
  'slide-from-right': slideFromRight,
};


// ============================================================
// CORE RUNNER
// otomatis detect class dan jalankan animasi yang sesuai
// ============================================================

function runAnims(parent, options = {}) {
  // loop semua animasi yang terdaftar di ANIM_MAP
  Object.entries(ANIM_MAP).forEach(([className, animFn]) => {
    parent.querySelectorAll(`.${className}`).forEach((el, i) => {
      animFn(el, {
        delay: options.delay !== undefined
          ? options.delay + (i * 0.1) // stagger antar element dalam parent
          : 0,
        scrollTrigger: options.scrollTrigger || null,
      });
    });
  });
}


// ============================================================
// INIT
// ============================================================

document.addEventListener('DOMContentLoaded', () => {

  // ── LOAD ANIMATION ────────────────────────────────────────
  // trigger: langsung saat halaman dibuka
  document.querySelectorAll('.set-anim-load').forEach(parent => {
    runAnims(parent, { delay: 0.3 });
  });

  // ── SCROLL ANIMATION ──────────────────────────────────────
  // trigger: saat element masuk viewport
  document.querySelectorAll('.set-anim-scroll').forEach(parent => {
    runAnims(parent, {
      scrollTrigger: makeScrollTrigger(parent),
    });
  });

});