// ===========================
// 1. Hero Words Slider
// ===========================
const heroWordsSlider = new Swiper('[data-swiper="hero-words-slider"]', {
  direction: "vertical",
  slidesPerView: 1,
  spaceBetween: 0,
  loop: true,
  speed: 600,
  mousewheel: false,
  allowTouchMove: false,
  autoplay: {
    delay: 2200,
  },
});

// ===========================
// 2. Slide Animation Trigger
// ===========================
document.querySelectorAll("[slide-animation-trigger]").forEach((trigger) => {
  gsap.fromTo(
    trigger.querySelectorAll("[slide-animation-item]"),
    {
      x: "35%",
      opacity: 0,
    },
    {
      x: "0%",
      opacity: 1,
      duration: 2,
      ease: "expo.out",
      stagger: 0.2,
      scrollTrigger: {
        trigger: trigger,
        start: "top 90%",
        end: "bottom +=70%",
        scrub: 1,
      },
    }
  );
});

// ===========================
// 2.5. Works Title Animation
// =================

// Function to create animations for sliding titles
function createSlidingTitlesAnimation(
  triggerSelector,
  rightSelector,
  leftSelector
) {
  gsap.utils.toArray(triggerSelector).forEach((trigger) => {
    const rightElement = trigger.querySelector(rightSelector);
    const leftElement = trigger.querySelector(leftSelector);

    if (rightElement) {
      gsap.fromTo(
        rightElement,
        { x: "100%" }, // Start outside the viewport to the right
        {
          x: "0%",
          opacity: 1,
          duration: 1.5,
          ease: "power3.out",
          scrollTrigger: {
            trigger: trigger, // Element that triggers the animation
            start: "top 75%", // Trigger when the top of the trigger element is 75% down the viewport
            end: "bottom 25%", // End when bottom reaches 25%
            scrub: 0.5, // Smooth scrubbing animation
          },
        }
      );
    }

    if (leftElement) {
      gsap.fromTo(
        leftElement,
        { x: "-100%" }, // Start outside the viewport to the left
        {
          x: "0%",
          opacity: 1,
          duration: 1.5,
          ease: "power3.out",
          scrollTrigger: {
            trigger: trigger, // Element that triggers the animation
            start: "top 75%", // Trigger when the top of the trigger element is 75% down the viewport
            end: "bottom 25%", // End when bottom reaches 25%
            scrub: 0.5, // Smooth scrubbing animation
          },
        }
      );
    }
  });
}

// ===========================
// GSAP + ScrollTrigger Number Animation Integration
// ===========================
document.addEventListener("DOMContentLoaded", function () {
  if (typeof gsap === "undefined" || typeof ScrollTrigger === "undefined")
    return;
  const countupElements = document.querySelectorAll("[countup]");
  countupElements.forEach((el) => {
    const text = el.textContent.trim();
    const match = text.match(/([-+]?\d*\.?\d+)/);
    if (!match) return;
    const number = parseFloat(match[1]);
    const prefix = text.slice(0, match.index);
    const suffix = text.slice(match.index + match[1].length);
    if (!isNaN(number)) {
      el.innerHTML = `${prefix}0${suffix}`;
      let obj = { val: 0 };
      gsap.to(obj, {
        val: number,
        duration: 2,
        ease: "power3.out",
        scrollTrigger: {
          trigger: el,
          start: "top 80%",
          once: true,
        },
        onUpdate: function () {
          let val = Math.round(obj.val);
          if (String(number).indexOf(".") !== -1) {
            val = obj.val.toFixed(1);
          }
          el.innerHTML = `${prefix}${val}${suffix}`;
        },
      });
    }
  });
});

// Call the function for the sliding titles
createSlidingTitlesAnimation(
  ".sliding-titles_wrapper",
  ".sliding-titles_right",
  ".sliding-titles_left"
);

// ===========================
// 3. Hover Animation
// ===========================
document.querySelectorAll("[slide-animation-item]").forEach((item) => {
  const cursorImage = item.querySelector(".work_item_cursor-img");
  if (!cursorImage) return;

  // Initial styles for cursor image
  gsap.set(cursorImage, {
    clipPath: "inset(50% 50% 50% 50%)",
    pointerEvents: "none",
  });

  let lastX = 0;

  // Track mouse movement
  item.addEventListener("mousemove", (e) => {
    const rect = item.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    // Centering image
    const imgWidth = cursorImage.offsetWidth / 2;
    const imgHeight = cursorImage.offsetHeight / 2;

    // Determine rotation based on direction
    const rotation = x > lastX ? 3 : -3;
    lastX = x;

    gsap.to(cursorImage, {
      x: x - imgWidth,
      y: y - imgHeight,
      rotation: rotation,
      duration: 0.5,
      ease: "power3.out",
    });
  });

  // Mouse enter animation
  item.addEventListener("mouseenter", () => {
    gsap.to(cursorImage, {
      clipPath: "inset(0% 0% 0% 0%)",
      opacity: 1,
      duration: 0.7,
      ease: "power3.out",
    });
  });

  // Mouse leave animation
  item.addEventListener("mouseleave", () => {
    gsap.to(cursorImage, {
      clipPath: "inset(50% 50% 50% 50%)",
      opacity: 0,
      rotation: 0,
      duration: 0.7,
      ease: "power3.out",
    });
  });
});

// ===========================
// 5. process Section
// ===========================
const numberSlider = new Swiper('[data-swiper="number-slider"]', {
  direction: "vertical",
  slidesPerView: 1,
  spaceBetween: 0,
  speed: 600,
  mousewheel: false,
  allowTouchMove: false,
});

let lastKnownScrollPosition = 0;
let ticking = false;

function handleScroll(scrollPos) {
  const trigger = document.querySelector('[data-animation-slider="trigger"]');
  const triggerPoint =
    trigger.getBoundingClientRect().top +
    window.scrollY +
    trigger.offsetHeight / 2; // Center of the trigger

  document
    .querySelectorAll('[data-item="service"]')
    .forEach((service, index) => {
      const servicePos = service.getBoundingClientRect().top + window.scrollY;
      const progressBar = service.querySelector(".home_services_progress-bar");
      const isActive =
        servicePos < triggerPoint &&
        servicePos + service.offsetHeight > triggerPoint;

      if (isActive) {
        // Slide to current service index
        numberSlider.slideTo(index);
        gsap.to(progressBar, { width: "100%", duration: 1 });
        gsap.to(service, { filter: "none", opacity: 1, duration: 1 });
      } else {
        // Reset service appearance
        gsap.to(progressBar, { width: "0%", duration: 1 });
        gsap.to(service, { filter: "blur(2px)", opacity: 0, duration: 1.5 });
      }
    });
}

window.addEventListener("scroll", () => {
  lastKnownScrollPosition = window.scrollY;

  if (!ticking) {
    window.requestAnimationFrame(() => {
      handleScroll(lastKnownScrollPosition);
      ticking = false;
    });
    ticking = true;
  }
});

// Handle resize if necessary
window.addEventListener("resize", () => {
  // You can debounce this if needed
  ScrollTrigger.refresh();
});

// ===========================
// 6. Process Swiper Slider
// ===========================
const processSlider = new Swiper('[data-swiper="blog-slider"]', {
  direction: "horizontal",
  slidesPerView: 2.5,
  spaceBetween: 16,
  speed: 1000,
  grabCursor: true,
  allowTouchMove: true,
  keyboard: {
    enabled: true,
  },
  navigation: {
    nextEl: "[swiper-button-next]",
    prevEl: "[swiper-button-prev]",
  },
});
