// inisialisasi Lenis
const lenis = new Lenis({
  duration: 1.2,
  easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
  smooth: true,
});

// sync Lenis dengan GSAP ScrollTrigger
lenis.on('scroll', ScrollTrigger.update);

gsap.ticker.add((time) => {
  lenis.raf(time * 1000);
});

gsap.ticker.lagSmoothing(0);


// split text anim slide up WORDS
gsap.registerPlugin(ScrollTrigger, SplitText);

function slideUpAnim(el, options = {}) {
  // text base element
  const isText = ['H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'P', 'EM', 'SPAN'].includes(el.tagName);

  const config = {
    duration: 0.7,
    stagger: 0.05,
    ease: 'power3.out',
    delay: 0,
    scrollTrigger: null,
    ...options,
  };

  if (isText) {
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
      // Hapus onComplete: () => split.revert() untuk scroll animations!
    });

    // non-text: img, div, dll
  } else {
    gsap.from(el, {
      y: 40,
      opacity: 0,
      duration: config.duration,
      ease: config.ease,
      delay: config.delay,
      scrollTrigger: config.scrollTrigger,
    });
  }
}

// pengunaan libberary: semua logic di alihka ke class element tingal menentukan nama class parent dan child. .set-anim-load (for load anim) and .set-anim-scroll (for scroll anim) class for trigger & .slide-up-anim for child element yang akan di animasikan. gunakan css overread sistem jika ingin styling parent, dengan enmpatkan parent class di dekat root rule.

document.addEventListener('DOMContentLoaded', () => {

  // Initial load — animation on page load
  const heroElements = document.querySelectorAll('.set-anim-load .slide-up-anim');
  heroElements.forEach((el, i) => {
    slideUpAnim(el, { delay: 0.3 + (i * 0.15) });
  });

  // Scroll trigger — section lain
  document.querySelectorAll('.set-anim-scroll .slide-up-anim').forEach(el => {
    slideUpAnim(el, {
      scrollTrigger: {
        markers: true,
        trigger: el.closest('.set-anim-scroll'), // ← Parent terdekat!
        start: 'top center', // Mulai saat top section mencapai bottom viewport
        end: 'bottom center', // Selesai saat bottom section mencapai bottom viewport
        scrub: 1,
      }
    });
  });

});


// split text anim slide up CHARS
function slideUpAnimChars(el, options = {}) {
  const isText = ['H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'P', 'EM', 'SPAN'].includes(el.tagName);

  const config = {
    duration: 0.7,
    stagger: 0.03, // lebih kecil dari words karena per huruf
    ease: 'power3.out',
    delay: 0,
    scrollTrigger: null,
    ...options,
  };

  if (isText) {
    const split = new SplitText(el, {
      type: 'chars',
      mask: 'chars',
    });

    gsap.from(split.chars, {
      y: '110%',
      opacity: 0,
      duration: config.duration,
      stagger: config.stagger,
      ease: config.ease,
      delay: config.delay,
      scrollTrigger: config.scrollTrigger,
    });

  } else {
    gsap.from(el, {
      y: 40,
      opacity: 0,
      duration: config.duration,
      ease: config.ease,
      delay: config.delay,
      scrollTrigger: config.scrollTrigger,
    });
  }
}

document.addEventListener('DOMContentLoaded', () => {

  // Initial load — animation on page load
  const heroElements = document.querySelectorAll('.set-anim-load.slide-up-anim-chars');
  heroElements.forEach((el, i) => {
    slideUpAnimChars(el, { delay: 5 + (i * 0.15) });
  });

  // Scroll trigger
  document.querySelectorAll('.set-anim-scroll .slide-up-anim-chars').forEach(el => {
    slideUpAnimChars(el, {
      scrollTrigger: {
        trigger: el.closest('.set-anim-scroll'),
        start: 'top center',
        end: 'bottom center',
        scrub: 1,
      }
    });
  });

});



const slider = document.getElementById('slider-3D-img');
const area = document.querySelector('.area-slider-3D-img');
const work = document.getElementById('work');

const initialTransform = `translate3d(-50%, -50%, 0) rotateX(0deg) rotateY(-25deg) rotateZ(-120deg)`;
const maxOffset = area.scrollHeight * 0.5;

// render cards
const CARD_GAP = 100;
const totalCards = Math.ceil(area.scrollHeight / CARD_GAP) + 10;

for (let i = 0; i < totalCards; i++) {
  const item = images[i % images.length];
  const card = document.createElement('div');
  card.className = 'card-3d-img-slider';

  const img = document.createElement('img');
  img.src = item.src;
  img.alt = `img${(i % images.length) + 1}`;

  card.appendChild(img);

  card.addEventListener('mouseover', () => {
    card.style.transform = 'rotateX(20deg) rotateY(-10deg) rotateZ(130deg) translateX(30%)';
  });
  card.addEventListener('mouseout', () => {
    card.style.transform = '';
  });
  card.addEventListener('click', () => {
    window.location.href = generateProjectUrl(item.project);
  });

  slider.appendChild(card);
}

const isMobile = window.innerWidth < 768;

ScrollTrigger.create({
  trigger: '#work',
  start: 'top top',
  end: 'bottom bottom',
  onEnter: () => gsap.set(work, { zIndex: 9999 }),
  onLeave: () => gsap.set(work, { zIndex: -1 }),
  onEnterBack: () => gsap.set(work, { zIndex: 9999 }),
  onLeaveBack: () => gsap.set(work, { zIndex: -1 }),
  scrub: 1,
  onUpdate: (self) => {
  const zOffset = self.progress * maxOffset;
  slider.style.transform = `${initialTransform} translateY(${zOffset}px)`;
}
});

// visibility — pisah, bisa atur start stop sendiri
ScrollTrigger.create({
  trigger: '#work',
  start: isMobile ? 'top bottom' : 'top top',       // kapan slider mulai visible
  end: 'bottom top',      // kapan slider mulai hidden
  onEnter: () => gsap.set(slider, { visibility: 'visible', pointerEvents: 'all' }),
  onLeave: () => gsap.set(slider, { visibility: 'hidden', pointerEvents: 'none' }),
  onEnterBack: () => gsap.set(slider, { visibility: 'visible', pointerEvents: 'all' }),
  onLeaveBack: () => gsap.set(slider, { visibility: 'hidden', pointerEvents: 'none' }),
});



//SECTION SLIDER
document.addEventListener("DOMContentLoaded", function() {
    const cardSliderEnd = document.querySelector('.card-end');
    const lastCard = document.querySelector(".card-slider.scroll-slider");
    const pinnedSections = gsap.utils.toArray(".pinned-slider");

    pinnedSections.forEach((section, index, sections) => {
        let imgSlider = section.querySelector(".img-slider");

        let nextSection = sections[index + 1] || lastCard;
        // let endScalePoint = `top+=${nextSection.offsetTop - section.offsetTop} top`;
                let endScalePoint = `top+=${nextSection ? nextSection.offsetTop - section.offsetTop : 0} top`;


        gsap.to(section, {
            scrollTrigger: {
                trigger: section,
                start: "top top",
                end: 
                    index === sections.length - 1
                        ? `+=${lastCard.offsetHeight / 2}`
                        : cardSliderEnd.offsetTop - window.innerHeight,
                pin: true,
                pinSpacing: false,
                scrub: 1,
            },
        });

        gsap.fromTo(
            imgSlider,
            { scale: 1},
            {
                scale: 0.5,
                ease: "none",
                scrollTrigger: {
                    trigger: section,
                    start: "top top",
                    end: endScalePoint,
                    scrub: 1,
                }
            }
        );
    });

    // const heroH2 = document.querySelector(".hero-slider h2");
    // ScrollTrigger.create({
    //     trigger: ".hero-slider",
    //     start: "top top",
    //     end: "bottom top",
    //     markers: true,
    //     scrub: 1,
    //     pin: true,
    //     onUpdate: (self) => {
    //         let opacityProgress = self.progress;
    //         heroH2.style.opacity = opacityProgress;
    //     }
    // });
});

 // ── ABOUT SECTION ANIMATIONS ──
    
    // Initial state - subtle and elegant
    gsap.set("#about .card", {
      y: 30,
      opacity: 0,
      scale: 0.95
    });

    // Elegant heading animation
    gsap.from("#about .heading-page", {
      scrollTrigger: {
        trigger: "#about",
        start: "top 85%",
        toggleActions: "play none none reverse"
      },
      y: 25,
      opacity: 0,
      duration: 1.4,
      ease: "power2.out"
    });

    // Smooth card entrance with stagger
    gsap.to("#about .card", {
      scrollTrigger: {
        trigger: "#about .cards-wrapper",
        start: "top 80%",
        toggleActions: "play none none reverse"
      },
      y: 0,
      opacity: 1,
      scale: 1,
      duration: 0.8,
      stagger: 0.1,
      ease: "power2.out"
    });

    // Refined hover interactions
    const cards = document.querySelectorAll("#about .card");
    
    cards.forEach(card => {
      card.addEventListener("mouseenter", () => {
        gsap.to(card, {
          scale: 1.02,
          y: -4,
          duration: 0.3,
          ease: "power1.out"
        });

        // Subtle content lift
        gsap.to(card.querySelector(".card-title"), {
          y: -2,
          duration: 0.25,
          ease: "power1.out"
        });

        // Soft background glow
        gsap.to(card, {
          boxShadow: "0 20px 40px rgba(0, 0, 0, 0.15)",
          duration: 0.3,
          ease: "power1.out"
        });
      });

      card.addEventListener("mouseleave", () => {
        gsap.to(card, {
          scale: 1,
          y: 0,
          boxShadow: "0 10px 30px rgba(0, 0, 0, 0.1)",
          duration: 0.4,
          ease: "power2.out"
        });

        // Reset content
        gsap.to(card.querySelector(".card-title"), {
          y: 0,
          duration: 0.3,
          ease: "power2.out"
        });
      });

      // Subtle parallax on mouse move
      card.addEventListener("mousemove", (e) => {
        const rect = card.getBoundingClientRect();
        const x = (e.clientX - rect.left) / rect.width - 0.5;
        const y = (e.clientY - rect.top) / rect.height - 0.5;
        
        gsap.to(card, {
          rotationY: x * 3,
          rotationX: -y * 3,
          duration: 0.2,
          ease: "power1.out"
        });
      });

      card.addEventListener("mouseleave", () => {
        gsap.to(card, {
          rotationY: 0,
          rotationX: 0,
          duration: 0.3,
          ease: "power2.out"
        });
      });
    });

    // Elegant icon animations
    cards.forEach(card => {
      const header = card.querySelector(".card-header");
      const icon = header.querySelector("svg");
      
      card.addEventListener("mouseenter", () => {
        gsap.to(icon, {
          scale: 1.1,
          duration: 0.3,
          ease: "back.out(1.3)"
        });

        gsap.to(header, {
          opacity: 0.9,
          duration: 0.2,
          ease: "power1.out"
        });
      });

      card.addEventListener("mouseleave", () => {
        gsap.to(icon, {
          scale: 1,
          duration: 0.4,
          ease: "power2.out"
        });

        gsap.to(header, {
          opacity: 1,
          duration: 0.3,
          ease: "power2.out"
        });
      });
    });