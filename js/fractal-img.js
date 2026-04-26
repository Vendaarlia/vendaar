// GSAP Animation for Website Entry
document.addEventListener('DOMContentLoaded', () => {
    // Set initial states
    gsap.set('.frame', {
        scale: 0
    });

    gsap.set('.img-fractal-left, .img-fractal-right', {
        opacity: 0,
        scale: 0.8
    });

    gsap.set('.slideBTN, .badge-anim', {
        width: 0,
        opacity: 0,
        whiteSpace: 'nowrap'
    });

    // Set initial state for txt-lide-up
    gsap.set('.txt-slide-up', {
        overflow: 'hidden',
        opacity: 0
    });

    // Main animation timeline
    const tl = gsap.timeline();

    // Scale frame from 0 to 1
    tl.to('.frame', {
        scale: 1,
        duration: 2,
        ease: 'power2.out'
    })
        // Animate left fractal images from bottom to top
        .to('.img-fractal-left', {
            opacity: 1,
            scale: 1,
            duration: 1,
            stagger: {
                amount: 0.8,
                from: 'end' // from bottom to top
            },
            ease: 'power2.out'
        }, '-=0.1')
        // Animate right fractal images from top to bottom  
        .to('.img-fractal-right', {
            opacity: 1,
            scale: 1,
            duration: 1,
            stagger: {
                amount: 0.8,
                from: 'start' // from top to bottom
            },
            ease: 'power2.out'
        }, '<0.1')

        // animnasi splitext
        .to('.txt-slide-up', {
            opacity: 1,
            onStart: function () {
                const txtElements = document.querySelectorAll('.txt-slide-up');

                txtElements.forEach(txtElement => {
                    const originalText = txtElement.textContent.replace(/\s+/g, ' ').trim();
                    const words = originalText.split(' ');

                    const wrapper = document.createElement('div');
                    wrapper.style.cssText = `
                                            display: flex;
                                            flex-wrap: wrap;
                                            justify-content: center;
                                            align-items: baseline;
                                            gap: 0.3em 0;
                                        `;

                    words.forEach(word => {
                        const outer = document.createElement('span');
                        outer.style.cssText = `
                                            display: inline-block;
                                            overflow: hidden;
                                            margin-right: 0.3em;
                                        `;

                        const inner = document.createElement('span');
                        inner.textContent = word;
                        inner.style.cssText = `
                                            display: inline-block;
                                            transform: translateY(110%);
                                            opacity: 0;
                                        `;

                        outer.appendChild(inner);
                        wrapper.appendChild(outer);
                    });

                    txtElement.innerHTML = '';
                    txtElement.appendChild(wrapper);

                    gsap.to(txtElement.querySelectorAll('span > span'), {
                        y: 0,
                        opacity: 1,
                        duration: 0.7,
                        stagger: 0.05,
                        ease: 'power3.out',
                    });
                });
            }
        })


        // Animate hero-badge from right to left (width 0 to auto)
        .to('.badge-anim', {
            width: 'auto',
            opacity: 1,
            duration: 0.8,
            ease: 'power2.out'
        })
        .to('.slideBTN', {
            width: 'auto',
            opacity: 1,
            duration: 0.8,
            ease: 'power2.out',
            onStart: function () {
                // Split text into characters sekali di awal
                const buttons = document.querySelectorAll('.slideBTN');

                buttons.forEach(button => {
                    const text = button.textContent;
                    const chars = text.split('');

                    // Clear and rebuild with spans
                    button.innerHTML = '';
                    chars.forEach((char, index) => {
                        const span = document.createElement('span');
                        span.textContent = char === ' ' ? '\u00A0' : char;
                        span.style.display = 'inline-block';
                        span.style.opacity = '0';
                        span.style.transform = 'translateX(20px)';
                        button.appendChild(span);
                    });

                    // Animate all characters sekali
                    gsap.to(button.querySelectorAll('span'), {
                        opacity: 1,
                        x: 0,
                        duration: 0.6,
                        stagger: 0.03,
                        ease: 'power2.out',
                    });
                });
            }
        }, '+=0.2')
});