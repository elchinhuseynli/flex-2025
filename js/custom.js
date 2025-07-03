// ===========================
// Scramble Text Effect
// ===========================

document.addEventListener("DOMContentLoaded", () => {
  const defaultChars = "abcdefghijklmnopqrstuvwxyz";
  const scrambleElements = document.querySelectorAll("[data-scramble]");

  const applyScrambleEffect = (event) => {
    const target = event.currentTarget;
    if (
      !gsap.isTweening(target) &&
      window.matchMedia("(prefers-reduced-motion: no-preference)").matches
    ) {
      const duration = parseFloat(target.dataset.scrambleDuration) || 0.8;
      const speed = parseFloat(target.dataset.scrambleSpeed) || 2;
      const chars = target.dataset.scrambleChars || defaultChars;

      gsap.to(target, {
        duration: duration,
        ease: "sine.in",
        scrambleText: {
          text: target.innerText,
          speed: speed,
          chars: chars,
        },
      });
    }
  };

  scrambleElements.forEach((element) => {
    if (!element.hasAttribute("data-scramble-scroll")) {
      element.addEventListener("mouseenter", applyScrambleEffect);
      element.addEventListener("focus", applyScrambleEffect);
    }
  });

  const scrollElements = document.querySelectorAll("[data-scramble-scroll]");

  scrollElements.forEach((element) => {
    const start = element.dataset.scrambleScrollStart || "top bottom-=100";
    const end = element.dataset.scrambleScrollEnd || "bottom top";
    const toggleActions =
      element.dataset.scrambleScrollToggle || "play none none none";
    const duration = parseFloat(element.dataset.scrambleDuration) || 0.8;
    const speed = parseFloat(element.dataset.scrambleSpeed) || 2;
    const chars = element.dataset.scrambleChars || defaultChars;
    const originalText = element.innerText;

    ScrollTrigger.create({
      trigger: element,
      start: start,
      end: end,
      toggleActions: toggleActions,
      onEnter: () => {
        gsap.to(element, {
          duration: duration,
          ease: "sine.in",
          scrambleText: {
            text: originalText,
            speed: speed,
            chars: chars,
          },
        });
      },
      onEnterBack: function () {
        if (element.hasAttribute("data-scramble-scroll-replay")) {
          gsap.to(element, {
            duration: duration,
            ease: "sine.in",
            scrambleText: {
              text: originalText,
              speed: speed,
              chars: chars,
            },
          });
        }
      },
    });
  });
});

// ===========================
// Unicorn Studio
// ===========================

!(function () {
  if (!window.UnicornStudio) {
    window.UnicornStudio = { isInitialized: !1 };
    var i = document.createElement("script");
    (i.src =
      "https://cdn.jsdelivr.net/gh/hiunicornstudio/unicornstudio.js@v1.4.20/dist/unicornStudio.umd.js"),
      (i.onload = function () {
        window.UnicornStudio.isInitialized ||
          (UnicornStudio.init(), (window.UnicornStudio.isInitialized = !0));
      }),
      (document.head || document.body).appendChild(i);
  }
})();
