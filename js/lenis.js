// ─── LENIS SMOOTH SCROLL ───
// Pure Lenis initialization - no GSAP dependency
// Can be used on pages without GSAP

const lenis = new Lenis({
  duration: 0.2,
  easing: (t) => t,
  smooth: true,
});

// Main animation loop
function raf(time) {
  lenis.raf(time);
  requestAnimationFrame(raf);
}

requestAnimationFrame(raf);

// Export for use in other scripts (optional GSAP sync)
window.lenis = lenis;
