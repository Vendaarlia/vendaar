gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", function () {
  const servicesSection = document.getElementById("services");
  const servicesHeader = document.querySelector(".services-header");
  const pinnedCards = gsap.utils.toArray(".service-item.cardSlider.pinned");

  ScrollTrigger.create({
    trigger: servicesSection,
    start: "top top",
    end: "bottom bottom",
    pin: servicesHeader,
    pinSpacing: false,
  });

  pinnedCards.forEach((card, index, cards) => {
    const scaleTarget = card.querySelector(".service-inner-scale");
    const isLast = index === cards.length - 1;
    const nextCard = cards[index + 1];
    const distToNext = nextCard ? nextCard.offsetTop - card.offsetTop : 0;
    

    gsap.to(card, {
      scrollTrigger: {
        trigger: card,
        start: "top top",
        end: isLast ? "+=1" : `+=${distToNext}`,
        markers: true,
        pin: true,
        pinSpacing: false,
        scrub: 1,
      },
    });

    if (!isLast) {
      gsap.fromTo(
        scaleTarget,
        { scale: 1, opacity: 1 },
        {
          scale: 0.75,
          opacity: 0,
          ease: "none",
          scrollTrigger: {
            trigger: card,
            start: "top top",
            end: `+=${distToNext}`,
            scrub: 1,
          },
        }
      );
    }
  });
});