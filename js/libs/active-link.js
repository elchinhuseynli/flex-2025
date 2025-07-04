// Professional Active Link Detection with Lenis Integration
// Smooth scroll spy functionality with proper performance optimization

class ActiveLinkDetector {
  constructor() {
    this.links = document.querySelectorAll('a[href^="#"], a[href^="/#"]');
    this.sections = new Map();
    this.activeSection = null;
    this.observer = null;
    this.lenis = window.lenis;
    this.isScrolling = false;

    this.init();
  }

  init() {
    this.collectSections();
    this.setupIntersectionObserver();
    this.setupClickHandlers();
    this.handleInitialState();
  }

  collectSections() {
    this.links.forEach((link) => {
      const href = link.getAttribute("href");
      const targetId = href.replace(/^\/?#/, "");
      const target = document.getElementById(targetId);

      if (target) {
        this.sections.set(target, {
          link: link,
          id: targetId,
        });
      }
    });
  }

  setupIntersectionObserver() {
    const options = {
      root: null,
      rootMargin: "-50% 0px -50% 0px",
      threshold: 0,
    };

    this.observer = new IntersectionObserver((entries) => {
      // Don't update active state during programmatic scrolling
      if (this.isScrolling) return;

      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          this.setActiveSection(entry.target);
        }
      });
    }, options);

    this.sections.forEach((sectionData, target) => {
      this.observer.observe(target);
    });
  }

  setupClickHandlers() {
    this.links.forEach((link) => {
      link.addEventListener("click", (e) => {
        const href = link.getAttribute("href");
        const targetId = href.replace(/^\/?#/, "");
        const target = document.getElementById(targetId);

        if (target) {
          e.preventDefault();
          this.scrollToSection(target, href);
        }
      });
    });
  }

  scrollToSection(target, href) {
    // Set scrolling flag to prevent observer interference
    this.isScrolling = true;

    // Temporarily disconnect observer
    this.observer.disconnect();

    // Get the exact position of the target element
    const rect = target.getBoundingClientRect();
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    const targetTop = rect.top + scrollTop;
    const viewportHeight = window.innerHeight;

    // Calculate position so that target's top is at 50% of viewport height
    const targetPosition = targetTop - viewportHeight * 0.5;

    // Update URL hash
    window.location.hash = href;

    // Set the active section immediately
    this.setActiveSection(target);

    // Use Lenis for smooth scrolling
    if (this.lenis) {
      this.lenis.scrollTo(targetPosition, {
        duration: 1.2,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
      });
    } else {
      // Fallback to native smooth scrolling
      target.scrollIntoView({
        behavior: "smooth",
        block: "center",
      });
    }

    // Re-enable observer after scroll completes
    setTimeout(() => {
      this.isScrolling = false;
      this.sections.forEach((sectionData, sectionTarget) => {
        this.observer.observe(sectionTarget);
      });
    }, 1500); // Wait for scroll animation to complete
  }

  setActiveSection(target) {
    // Remove active class from all links
    this.links.forEach((link) => {
      link.classList.remove("w--current");
    });

    // Add active class to the corresponding link
    const sectionData = this.sections.get(target);
    if (sectionData) {
      sectionData.link.classList.add("w--current");
      this.activeSection = target;
    }
  }

  handleInitialState() {
    if (window.location.hash) {
      const targetId = window.location.hash.substring(1);
      const target = document.getElementById(targetId);
      if (target && this.sections.has(target)) {
        // Set initial active state
        this.setActiveSection(target);
      }
    }
  }

  destroy() {
    if (this.observer) {
      this.observer.disconnect();
    }
  }
}

// Initialize when DOM is ready
function initActiveLinks() {
  if (document.readyState === "loading") {
    document.addEventListener("DOMContentLoaded", () => {
      new ActiveLinkDetector();
    });
  } else {
    new ActiveLinkDetector();
  }
}

// Initialize
initActiveLinks();
