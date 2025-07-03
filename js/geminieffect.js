// ===========================
// 7. Contact Gemini Animation
// ===========================

window.addEventListener("load", () => {
  const svg = document.querySelector("#filler-svg");
  const paths = Array.from(svg.querySelectorAll("path"));

  paths.forEach((path) => {
    const length = path.getTotalLength();
    gsap.set(path, {
      strokeDashoffset: length,
      strokeDasharray: length,
    });
  });

  // Animate the paths with a stagger
  gsap.to(paths, {
    strokeDashoffset: (i, target) => -target.getTotalLength(),
    duration: 1,
    stagger: 0.02,
    ease: "power1.inOut",
    scrollTrigger: {
      trigger: ".sticky_trigger",
      start: "top top",
      end: "bottom top",
      scrub: 1,
    },
  });
});
