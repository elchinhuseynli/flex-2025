document.addEventListener("DOMContentLoaded", function () {
  const toggleButton = document.querySelector(".burger");
  let isOpen = false;

  const toggleIsOpen = () => {
    isOpen = !isOpen;
  };

  const handleToggleButton = () => {
    toggleButton.classList.toggle("active");
    document.body.style.overflow = isOpen ? "auto" : "hidden";
    toggleButton.setAttribute("aria-expanded", !isOpen);
    if (isOpen) {
      tl.reverse();
    } else {
      tl.play();
    }
    toggleIsOpen();
  };

  const handleKeyDown = (event) => {
    if (event.key === "Escape" && isOpen) {
      tl.reverse();
      toggleButton.classList.remove("active");
      document.body.style.overflow = "auto";
      toggleButton.setAttribute("aria-expanded", false);
      isOpen = false;
    }
  };

  const setInitialToggleButtonAttributes = () => {
    toggleButton.setAttribute("aria-label", "Navigation Menu");
    toggleButton.setAttribute("tabindex", "0");
  };

  setInitialToggleButtonAttributes();
  toggleButton.addEventListener("click", handleToggleButton);
  document.addEventListener("keydown", handleKeyDown);

  gsap.set(".menu-item_a", { y: 225 });

  const tl = gsap.timeline({ paused: true });

  tl.to(".overlay", {
    duration: 1.2,
    clipPath: "polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%)",
    ease: "power4.inOut",
  });

  tl.to(
    ".menu-item_a",
    {
      duration: 1.2,
      y: 0,
      stagger: 0.2,
      ease: "power4.out",
    },
    "-=1"
  );

  tl.to(
    ".menu-item_a.w--current .menu-item_active-line",
    {
      width: "100%",
      duration: 1,
      ease: "power4.out",
      delay: 0.5,
    },
    "<"
  );

  tl.from(
    ".sub-nav_a",
    {
      y: 50,
      opacity: 0,
      duration: 0.5,
      delay: 0.5,
      stagger: 0.1,
    },
    "<"
  );
});

// Logo fade on scroll

document.addEventListener("DOMContentLoaded", () => {
  const largeLogo = document.querySelector(".navbar_large-logo");
  const smallLogo = document.querySelector(".navbar_small-logo");

  if (!largeLogo || !smallLogo) {
    console.error("Logo elements not found!");
    return;
  }

  // Convert 40rem to pixels.
  function convertRemToPixels(rem) {
    return (
      rem * parseFloat(getComputedStyle(document.documentElement).fontSize)
    );
  }

  const scrollDistanceInPixels = convertRemToPixels(40);
  const fadeDurationInPixels = convertRemToPixels(5); // How many pixels of scroll for the fade to complete

  // Set initial states using GSAP for consistency (though CSS also handles it)
  gsap.set(largeLogo, { opacity: 1 });
  gsap.set(smallLogo, { opacity: 0, pointerEvents: "none" }); // Ensure it's not interactive when hidden

  ScrollTrigger.create({
    trigger: document.body, // Or a more specific scroll container
    start: `top top-=${scrollDistanceInPixels}`, // Start fading after scrolling 40rem
    end: `+=${fadeDurationInPixels}`, // Complete the fade over the next 5rem of scroll
    scrub: true, // Animation progress tied to scroll position
    // markers: true, // Uncomment for debugging
    onUpdate: (self) => {
      // self.progress will go from 0 to 1 as you scroll through the "start" and "end" range
      gsap.to(largeLogo, { opacity: 1 - self.progress, overwrite: "auto" });
      gsap.to(smallLogo, { opacity: self.progress, overwrite: "auto" });

      // Control pointer events based on visibility
      if (self.progress > 0.5) {
        // If smallLogo is more than 50% visible
        gsap.set(smallLogo, { pointerEvents: "auto" });
        gsap.set(largeLogo, { pointerEvents: "none" });
      } else {
        gsap.set(smallLogo, { pointerEvents: "none" });
        gsap.set(largeLogo, { pointerEvents: "auto" });
      }
    },
    onLeave: () => {
      // Scrolled past the end point: ensure small logo is fully visible, large is hidden
      gsap.set(largeLogo, { opacity: 0, pointerEvents: "none" });
      gsap.set(smallLogo, { opacity: 1, pointerEvents: "auto" });
    },
    onEnterBack: () => {
      // Scrolled back into the trigger zone from below: ensure small logo is fully visible, large is hidden
      // This state is covered by onUpdate, but explicit set can be good
      gsap.set(largeLogo, { opacity: 0, pointerEvents: "none" });
      gsap.set(smallLogo, { opacity: 1, pointerEvents: "auto" });
    },
    onLeaveBack: () => {
      // Scrolled back above the start point: ensure large logo is fully visible, small is hidden
      gsap.set(largeLogo, { opacity: 1, pointerEvents: "auto" });
      gsap.set(smallLogo, { opacity: 0, pointerEvents: "none" });
    },
    onEnter: () => {
      // Scrolled into the trigger zone from above: ensure large logo is fully visible, small is hidden
      gsap.set(largeLogo, { opacity: 1, pointerEvents: "auto" });
      gsap.set(smallLogo, { opacity: 0, pointerEvents: "none" });
    },
  });
});

// Navbar color change on scroll

document.addEventListener("DOMContentLoaded", () => {
  let navigation = document.querySelector(".navbar_component");

  gsap.utils.toArray("section").forEach((section) => {
    if (section.getAttribute("nav-color") !== null) {
      var colorClass = section.getAttribute("nav-color");

      ScrollTrigger.create({
        trigger: section,
        start: "top top+=80",
        end: "bottom top+=20",
        toggleClass: {
          targets: [navigation],
          className: colorClass,
        },

        markers: false,
      });
    }
  });
});
