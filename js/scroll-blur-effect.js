/**
 * Debounce function to limit the rate at which a function can fire.
 * This is useful for events like window resizing to prevent performance issues.
 * @param {Function} func The function to debounce.
 * @param {number} wait The debounce delay in milliseconds.
 * @param {boolean} [immediate=false] If true, trigger the function on the leading edge, instead of the trailing.
 * @returns {Function} The debounced function.
 */
function debounce(func, wait, immediate = false) {
  let timeout;
  return function executedFunction() {
    const context = this;
    const args = arguments;
    const later = function () {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    const callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
}

// Array to store active SplitText instances and their associated animations/ScrollTriggers
let activeBlurScrollEffects = [];

/**
 * Cleans up all active blur scroll effects.
 * This function is crucial for preventing memory leaks and ensuring that
 * animations and ScrollTriggers are properly removed before re-initialization.
 */
function cleanupBlurScrollEffects() {
  activeBlurScrollEffects.forEach((effect) => {
    // Kill the ScrollTrigger instance associated with the animation if it still exists.
    // GSAP's kill() is safe to call multiple times.
    if (effect.scrollTrigger && effect.scrollTrigger.isActive) {
      // Check if ST is active before killing
      effect.scrollTrigger.kill();
    }
    // Kill the GSAP animation if it still exists.
    if (effect.animation && effect.animation.isActive()) {
      // Check if animation is active
      effect.animation.kill();
    }
    // Revert the SplitText instance to restore the original DOM structure.
    // SplitText's revert() is safe to call if already reverted or not split.
    if (effect.splitter) {
      effect.splitter.revert();
    }
  });
  activeBlurScrollEffects = []; // Reset the array after cleanup
}

/**
 * Initializes the blur scroll effect for elements with the [data-blur-scroll] attribute.
 */
function initBlurScrollEffect() {
  if (
    typeof gsap === "undefined" ||
    typeof SplitText === "undefined" ||
    typeof ScrollTrigger === "undefined"
  ) {
    console.warn(
      "GSAP, SplitText, or ScrollTrigger not loaded. Blur scroll effect cannot initialize."
    );
    return;
  }

  gsap.registerPlugin(ScrollTrigger, SplitText);
  cleanupBlurScrollEffects();

  const textElements = document.querySelectorAll("[data-blur-scroll]");

  textElements.forEach(function (textElement) {
    let splitter = new SplitText(textElement, {
      type: "words",
      wordsClass: "blur-scroll-word",
    });
    let words = splitter.words;

    if (!words || words.length === 0) {
      // console.warn("SplitText found no words for element:", textElement);
      splitter.revert();
      return;
    }

    let animation = gsap.fromTo(
      words,
      {
        opacity: 0,
        skewX: -20,
        willChange: "filter, transform, opacity",
        filter: "blur(8px)",
      },
      {
        ease: "sine",
        opacity: 1,
        skewX: 0,
        filter: "blur(0px)",
        stagger: 0.04,
        scrollTrigger: {
          trigger: textElement,
          start: "top bottom-=15%",
          end: "bottom center+=15%",
          scrub: true,
          onUpdate: function (self) {
            // 'self' is the ScrollTrigger instance
            // Find the effect associated with this ScrollTrigger's trigger element
            const effect = activeBlurScrollEffects.find(
              (e) => e.element === self.trigger
            );

            if (effect && !effect.reverted) {
              // Check if animation is complete (progress is 1) and scrolling forward (direction is 1)
              if (self.progress === 1 && self.direction === 1) {
                // console.log("Animation 100% complete (forward), reverting and killing for:", self.trigger);

                effect.splitter.revert(); // Revert to original DOM
                effect.reverted = true; // Mark as reverted

                // Kill the animation. This will also kill its associated ScrollTrigger (self).
                // This makes the effect truly one-time for this element.
                if (effect.animation) {
                  effect.animation.kill();
                }
                // Note: No need to call self.kill() separately, as effect.animation.kill() handles it.
              }
            }
          },
          // markers: true, // Uncomment for debugging
        },
      }
    );

    activeBlurScrollEffects.push({
      element: textElement,
      splitter: splitter,
      animation: animation,
      scrollTrigger: animation.scrollTrigger, // GSAP automatically adds this reference
      reverted: false, // Initialize the reverted flag
    });
  });
}

const debouncedInitBlurScrollEffect = debounce(initBlurScrollEffect, 250);

document.addEventListener("DOMContentLoaded", function () {
  if (document.fonts && document.fonts.ready) {
    document.fonts.ready.then(() => {
      initBlurScrollEffect();
      window.addEventListener("resize", debouncedInitBlurScrollEffect);
    });
  } else {
    initBlurScrollEffect();
    window.addEventListener("resize", debouncedInitBlurScrollEffect);
  }
});
